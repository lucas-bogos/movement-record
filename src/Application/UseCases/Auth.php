<?php

declare(strict_types=1);

namespace Source\Application\UseCases;

session_start();

class Auth 
{
    public static function verifySession(): void
    {
        if(isset($_GET["logged"]) && $_GET["logged"] == false) {
            unset($_SESSION["user_logged"]);
        }

        if(!isset($_SESSION["user_logged"])) header("Location: /login");
    }
}