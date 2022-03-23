<?php

use Source\Data\Connection;
use Source\Router;

require __DIR__."/../vendor/autoload.php";

$urlParse = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

Connection::init();

Router::Routing($urlParse);