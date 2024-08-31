<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validação dos dados
    if (empty($username) || empty($email) || empty($password)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    // Hash da senha
    $hashed_password = md5($password);

    // Conectar ao banco de dados
    require_once "database.php";

    try {
        // Preparar a consulta SQL
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);

        // Vincular os parâmetros
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        // Executar a consulta
        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
            header("Location: index.php"); // Corrigir redirecionamento
            exit(); // Garantir que o script PHP não continue a execução
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }

    // Fechar a conexão
    $conn = null;
}
