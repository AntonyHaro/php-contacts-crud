<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Excluir um Usuário</title>
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/theme.css" />
    <link rel="stylesheet" href="../css/form.css" />
</head>

<body>
    <main>
        <h1>Excluir um Usuário</h1>

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

        <form action="delete.php" method="post">
            <div class="input-container">
                <p class="label-container">
                    <label for="username">ID do Usuário: </label><input type="number" min="0" name="id" id="id"
                        placeholder="id:" required />
                </p>
            </div>
            <div class="button-container">
                <button type="submit" class="cancel">Excluir</button>
                <a href="../index.php">Voltar a página inicial</a>
            </div>
        </form>
    </main>
</body>

</html>