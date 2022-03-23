<?php

declare(strict_types=1);

use Source\Data\Connection;

$name = isset($_POST["name"]) ?  $_POST["name"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;
$check_password = isset($_POST["check_password"]) ? $_POST["check_password"] : null;
$bank_name = isset($_POST["bank_name"]) ? $_POST["bank_name"] : null;
$account_number = isset($_POST["account_number"]) ? $_POST["account_number"] : null;

if($password !== $check_password)
    echo '<span style="color: red;">Senhas digitadas estão diferentes!</span>';

$dataUser = Array(
    0 => $name,
    1 => $email,
    2 => $password
);

$sqlUser = "INSERT INTO user VALUES (null, ?, ?, ?)";
$sqlCheckId = "SELECT id FROM user WHERE EMAIL=:email";
$sqlAccount = "INSERT INTO movement VALUES (null, ?, ?, ?, ?, ?)";

try {
    // inicia a conexão com database
    $pdo = Connection::init();
    // insere um novo usuário 
    $stmtUser = $pdo->prepare($sqlUser);
    $stmtUser->execute($dataUser);
    // obtem o id do usuário
    $stmt = $pdo->prepare($sqlCheckId);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $idUser = $stmt->fetchAll()[0]["id"];
    // seta dados da conta
    $dataAccount = Array(
        0 => $idUser,
        1 => $account_number,
        2 => $bank_name,
        3 => 0,
        4 => 0
    );
    // insere dados da conta no database
    $stmtMovement = $pdo->prepare($sqlAccount);
    $stmtMovement->execute($dataAccount);
    echo '<span style="color: green;">Cadastro realizado com sucesso!</span>';
} catch(Exception $e) {
    echo "Falha na comunicação, confira os dados e tente outra vez!";
    $e->getMessage();
    $e->getTrace();
}
