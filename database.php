<?php
$servername = 'localhost';
$dbname = 'contacts_management_db';
$dbuser = 'root';
$dbpassword = '';

try {
    // Cria uma nova conexão PDO e atribui à variável $conn
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // Configura o modo de erro do PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
