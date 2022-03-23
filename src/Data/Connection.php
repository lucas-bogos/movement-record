<?php

declare(strict_types=1);

namespace Source\Data;

require __DIR__."/../../vendor/autoload.php";

use PDO;
use PDOException;
use Exception;

class Connection
{
    public static function init(): PDO
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=movement_register", getenv("DBUSR"), getenv("DBPASS"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $error) {
            die("Erro de conexão do PDO: ".$error->getMessage());
        } catch (Exception $error) {
            die("Ocorreu um erro: ".$error->getMessage());
        }
    }
}