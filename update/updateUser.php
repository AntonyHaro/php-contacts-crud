<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    if (empty($id) || empty($username) || empty($email)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    if (!is_numeric($id)) {
        echo "ID inválido!";
        exit;
    }

    require_once "../database.php";

    try {
        $sql = "UPDATE users SET username = :username, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("location: ../index.php");
            exit();
        } else {
            echo "Erro ao atualizar usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }

    $conn = null;
}