<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    if (empty($username) || empty($email) || empty($age)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    require_once "../database.php";

    try {
        $sql = "INSERT INTO contacts (username, email, age) VALUES (:username, :email, :age)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':age', $age);

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
