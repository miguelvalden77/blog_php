<?php

$server = "monorail.proxy.rlwy.net:38119";
$username = "root";
$password = "HjBPkzlITifclLrZzpwLrUFFNZgNbSNj";
$database = "railway";

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

if (!isset($_SESSION)) {
    session_start();
}
