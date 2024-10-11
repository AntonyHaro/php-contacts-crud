<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Início</title>
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/theme.css" />
    <link rel="stylesheet" href="css/home.css" />
</head>

<body>
    <main>
        <h1>Sistema de gerenciamento de usuários</h1>
        <p>Usuários cadastrados:</p>
        <a href="create/create.html" class="create-user">Criar um novo usuário</a>

        <section class="user-container">
            <?php
            require_once "database.php"; // Conexão com o banco de dados
            
            try {
                $sql = "SELECT * FROM users";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($users) > 0) {
                    foreach ($users as $user) {
                        echo "<div class='user'>";

                        // Exibindo informações do usuário
                        echo "<div class='info'>";
                        echo "<p class='name'>" . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>" . htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "</div>";

                        // Adicionando links dinâmicos para Alterar e Excluir
                        echo "<div class='options'>";
                        echo "<a href='update/updateForm.php?&id=" . urlencode($user['id']) . "&username=" . urlencode($user['username']) . "&email=" . urlencode($user['email']) . "&age=" . urlencode($user['age']) . "' class='option'>Alterar</a>";

                        echo "<a href='delete/deleteForm.php?id=" . urlencode($user['id']) . "' class='option'>Excluir</a>";
                        echo "</div>";

                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-results'>- Nenhum registro encontrado. Experimente criar um!</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='error'>Erro ao conectar ao banco de dados: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
            }

            // Fechando a conexão com o banco de dados
            $conn = null;
            ?>
        </section>
    </main>
</body>

</html>