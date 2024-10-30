<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os parâmetros necessários estão presentes
    if (isset($_POST["id"], $_POST["username"], $_POST["email"], $_POST["age"])) {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $age = $_POST["age"];
    } else {
        // Caso algum parâmetro esteja faltando, exibe uma mensagem de erro
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    // Validação simples
    if (!is_numeric($id)) {
        echo "ID inválido!";
        exit;
    }
} else {
    // Caso não seja uma requisição POST, redirecione ou exiba erro
    // Isso é importante para garantir que a página só seja acessada via POST.
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Captura os dados da requisição GET para preencher o formulário
        $id = $_GET["id"] ?? '';
        $username = $_GET["username"] ?? '';
        $email = $_GET["email"] ?? '';
        $age = $_GET["age"] ?? '';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Editar um Usuário</title>
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/theme.css" />
    <link rel="stylesheet" href="../css/form.css" />
</head>

<body>
    <main>
        <h1>Editar um Usuário</h1>
        <form action="updateUser.php" method="post">
            <div class="input-container">
                <p class="label-container">
                    <label for="id">ID do Usuário:</label>
                    <input type="number" min="0" name="id" id="id" placeholder="id:"
                        value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" <?php if (!empty($id))
                                 echo "readonly" ?> />
                    </p>

                    <p class="label-container">
                        <label for="username">Novo nome do usuário:</label>
                        <input type="text" name="username" id="username" placeholder="novo nome:"
                            value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>" />
                </p>

                <p class="label-container">
                    <label for="email">Novo email do usuário:</label>
                    <input type="email" name="email" id="email" placeholder="novo email:"
                        value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" />
                </p>

                <p class="label-container">
                    <label for="age">Idade do usuário:</label>
                    <input type="number" name="age" id="age" placeholder="idade:"
                        value="<?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?>" />
                </p>
            </div>
            <div class="button-container">
                <button type="submit" class="confirm">Confirmar</button>
                <a href="../index.php">Voltar à página inicial</a>
            </div>
        </form>
    </main>
</body>

</html>