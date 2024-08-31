<?php
$servername = 'localhost';
$dbname = 'users';
$dbuser = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}