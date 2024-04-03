<?php

require __DIR__ . '/vendor/autoload.php'; // Carga Composer autoloader

use Dotenv\Dotenv;

// Carga el archivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$server = $_ENV["monorail.proxy.rlwy.net"];
$username = $_ENV["DB_HOST"];
$password = $_ENV["DB_PASSWORD"];
$database = $_ENV["DB_DATABASE"];

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

if (!isset($_SESSION)) {
    session_start();
}
