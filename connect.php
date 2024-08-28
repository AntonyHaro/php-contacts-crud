<?php

// Inclui o arquivo de configuração que contém as credenciais
include 'config.php';

try {
    // Cria uma nova instância PDO com as credenciais do config.php
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

    // Define o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Retorna a conexão PDO (opcional, caso queira reutilizar a conexão em outro lugar)
return $conn;
