<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
</head>

<body>
    <a href="create/create.html">Criar um novo usuário</a>
    <a href="delete/delete.html">Excluir um usuário</a>
    <a href="update/update.html">Editar um usuário</a>

    <?php
    require_once "database.php";

    try {
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($users) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>";
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                echo "<td>" . htmlspecialchars($user["password"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            ;
            echo "Nenhum registro encontrado.";
        }

    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }

    $conn = null;
    ?>
</body>

</html>