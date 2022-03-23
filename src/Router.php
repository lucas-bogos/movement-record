<?php

declare(strict_types=1);

namespace Source;

use Source\Application\UseCases\Auth;

session_start();

class Router {
    public static function Routing($url) {
        switch($url) {
            case "/":
                Auth::verifySession();
                include __DIR__."/Visualization/main.php";
                break;
            case "/produto":
                echo "Página de produto";
                break;
            case "/404":
                include __DIR__."/../public/404.php";
                break;
            case "/cadastro":
                include __DIR__."/Visualization/cadastro.php";
                break;
            case "/login":
                include __DIR__."/Visualization/login.php";
                break;
            case "/register":
                include __DIR__."/Data/Repositories/register.php";
                break;
            case "/access":
                include __DIR__."/Data/Repositories/access.php";
                break;
            case "/resumo":
                include __DIR__."/Data/Repositories/movement.php";
                break;
            default:
                header("Location: /404");
        }
    }
}