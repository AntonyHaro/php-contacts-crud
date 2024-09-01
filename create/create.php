<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    $hashed_password = md5($password);

    require_once "../database.php";

    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            header("location: ../index.php");
            exit();
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . htmlspecialchars($e->getMessage());
    }

    $conn = null;
}
