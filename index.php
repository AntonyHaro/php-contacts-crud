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
        <h1>Usuários:</h1>
        <section class="user-container">
            <?php
            require_once "database.php";
            try {
                $sql = "SELECT * FROM users";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($users) > 0) {
                    foreach ($users as $user) {
                        echo "<div class='user'>";

                        echo "<div class='info-wrapper'>";
                        echo "<p>" . htmlspecialchars($user['username']) . "</p>";
                        echo "<p>" . "ID: " . htmlspecialchars($user['id']) . "</p>";
                        echo "</div>";

                        echo "<p>" . htmlspecialchars($user['email']) . "</p>";

                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-results'>- Nenhum registro encontrado. Experimente criar um!</p>";
                }
            } catch (PDOException $e) {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            }
            $conn = null;
            ?>
        </section>
        <section class="options">
            <a href="create/create.html" class="create-user">Criar um novo usuário</a>
            <a href="delete/delete.html" class="del-user">Excluir um usuário</a>
            <a href="update/update.html" class="edit-user">Editar um usuário</a>
        </section>
    </main>
</body>

</html>