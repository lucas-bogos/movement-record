<?php

declare(strict_types=1);

use Source\Application\Messages\ResumeMovement;
use Source\Data\Connection;

session_start();

$account_type = isset($_POST["account_type"]) ? $_POST["account_type"] : null;
$action_movement = isset($_POST["action_movement"]) ? $_POST["action_movement"] : null;
$value = isset($_POST["value"]) ? $_POST["value"] : null;
$name = $_SESSION["user_logged"];


$message = new ResumeMovement();

// inicia banco de dados
$pdo = Connection::init();

// get id_user
$sqlCheckId = "SELECT user.id, user.name, movement.balance_savings, movement.balance_current FROM user INNER JOIN movement WHERE user.name=:name";
$stmtData = $pdo->prepare($sqlCheckId);
$stmtData->bindValue(":name", $name);
$stmtData->execute();
$res = $stmtData->fetchAll();
$idUser = $res[0]["id"];
$valueSavings = $res[0]["balance_savings"];
$valueCurrent = $res[0]["balance_current"];

switch ($account_type) {
    // caso for conta poupança
  case "S":
    if ($value < 0 && $action_movement == "withdraw")
      throw new Exception("Não permitido retirar dinheiro da poupança, quando está negativado!");

    if ($action_movement == "deposit") {
      try {
        // calcula o depósito
        $calcDepositValue = $value + $valueSavings;
        // query sql para depositar um valor
        $sqlDeposit = "UPDATE movement SET balance_savings = :value WHERE id_user = :id";
        $stmtDeposit = $pdo->prepare($sqlDeposit);
        $stmtDeposit->bindValue(":value", $calcDepositValue);
        $stmtDeposit->bindValue(":id", $idUser);
        $stmtDeposit->execute();
        $message->depositMessage($name, $account_type, $value, $calcDepositValue);
      } catch (Exception $e) {
        $e->getMessage();
        echo '<span style="color: red;">Falha na atualização de dados com banco</span>';
      }
    } else {
      // query sql para sacar valor
      try {
        $calcWithdrawValue = $valueSavings - $value;
        $sqlWithdraw = "UPDATE movement SET balance_savings = :value WHERE id_user = :id";
        $stmtWithdraw = $pdo->prepare($sqlWithdraw);
        $stmtWithdraw->bindValue(":value", $calcWithdrawValue);
        $stmtWithdraw->bindValue(":id", $idUser);
        $stmtWithdraw->execute();
        $message->withdrawMessage($name, $account_type, $value, $calcWithdrawValue);
      } catch (Exception $e) {
        $e->getMessage();
        echo '<span style="color: red;">Falha na atualização de dados com banco</span>';
      }
    }
    break;
    // caso for conta corrente
  case "C":
    if ($action_movement == "deposit") {
      try {
        // calcula o depósito
        $calcDepositValue = $value + $valueSavings;
        // query sql para depositar um valor
        $sqlDeposit = "UPDATE movement SET balance_current = :value WHERE id_user = :id";
        $stmtDeposit = $pdo->prepare($sqlDeposit);
        $stmtDeposit->bindValue(":value", $calcDepositValue);
        $stmtDeposit->bindValue(":id", $idUser);
        $stmtDeposit->execute();
        $message->depositMessage($name, $account_type, $value, $calcDepositValue);
      } catch (Exception $e) {
        $e->getMessage();
        echo '<span style="color: red;">Falha na atualização de dados com banco</span>';
      }
    } else {
      // query sql para sacar valor
      try {
        $calcWithdrawValue = $valueSavings - $value;
        $sqlWithdraw = "UPDATE movement SET balance_current = :value WHERE id_user = :id";
        $stmtWithdraw = $pdo->prepare($sqlWithdraw);
        $stmtWithdraw->bindValue(":value", $calcWithdrawValue);
        $stmtWithdraw->bindValue(":id", $idUser);
        $stmtWithdraw->execute();
        $message->withdrawMessage($name, $account_type, $value, $calcWithdrawValue);
      } catch (Exception $e) {
        $e->getMessage();
        echo '<span style="color: red;">Falha na atualização de dados com banco</span>';
      }
    }
    break;
}
