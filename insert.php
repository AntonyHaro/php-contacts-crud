<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Recebe o nome enviado pelo formulário
$nome = $_POST['nome'];

// Validação básica
if (empty($nome)) {
    echo "O campo 'nome' é obrigatório.";
    exit;
}

try {
    // Prepara a query SQL para inserir o nome
    $sql = "INSERT INTO usuarios (nome) VALUES (?)";
    $stmt = $conn->prepare($sql);

    // Bind do valor para evitar SQL injection
    $stmt->bindValue(1, $nome);

    // Executa a query
    $stmt->execute();

    echo "O usuário '$nome' foi cadastrado com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao cadastrar o usuário: " . $e->getMessage();
} finally {
    // Fecha a conexão
    $conn = null;
}
