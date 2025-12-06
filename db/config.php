<?php

$host = 'localhost';
$port = 5433;
$user = 'postgres';
$dbname = 'FinalsDatabase';
$pass = 'zhaina10';

try {
    $conn = new PDO('pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $user, $pass);
} catch (PDOException $e) {
    echo ''. $e->getMessage();
    exit();
}