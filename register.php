<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    require_once 'database.php'; // Inclua o arquivo de conexão

    try {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Conta criada com sucesso! <a href='index.html'>Faça login e comece a usar sua conta</a>";
            // header("location: ./index.html");
            // exit();
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    } catch (PDOException $e) {
        echo "Algo deu errado... Tente novamente mais tarde.";
    }

    $conn = null;

} else {
    echo "Método de requisição inválido.";
}
