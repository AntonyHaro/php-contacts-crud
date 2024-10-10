<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<a href="listarcliente.php">Listar Clientes</a>
		<a href="index.php">Voltar</a><br/><br/>
		<form action="incluircliente.php" method="post">
			Nome: <input type="text" name="Nome" maxlength="30"/><br/>
			Email: <input type="email" name="Email" maxlength="50"/><br/>
			Data do Nascimento: <input type="date" name="data_nascimento" maxlength="20"/><br/>
			<input type="submit" name="salvar" value="Salvar" />
		</form>
	</body>
</html>