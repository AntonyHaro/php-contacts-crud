<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once 'database.php';

    try {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo "Login realizado com sucesso! <a href='home.php'>Ir para a página inicial</a>";
        } else {
            echo "Nome de usuário ou senha incorretos.";
        }
    } catch (PDOException $e) {
        echo "Erro ao realizar o login.";
    }

    $conn = null;
} else {
    echo "Método de requisição inválido.";
}
