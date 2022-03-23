<?php

declare(strict_types=1);

namespace Source\Data\Repositories;

use Source\Data\Connection;

$email = isset($_POST["email"]) ? $_POST["email"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;

$pdo = Connection::init();
$query = "SELECT name, password FROM user WHERE password = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([
    0 => $password 
]);
$rows = $stmt->fetchAll();

if(!$rows > 0) {
    echo 'Usuário não existe, <a href="/cadastro">fazer cadastro?</a>';
} else {
    $_SESSION["user_logged"] = $rows[0]["name"];
    header("Location: /");
}