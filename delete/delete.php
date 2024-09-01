<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    if (empty($id)) {
        echo "O ID é obrigatório!";
        exit;
    }

    if (!is_numeric($id)) {
        echo "ID inválido!";
        exit;
    }

    require_once "../database.php";

    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("location: ../index.php");
            exit();
        } else {
            echo "Erro ao excluir usuário";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
