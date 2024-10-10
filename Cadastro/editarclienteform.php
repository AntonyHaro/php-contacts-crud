<html>

<head>
	<meta charset="utf-8">
</head>

<body>
	<?php
	include_once("conexao.php");
	$codigo = $_GET["codigo"];
	$sql = "select * from clientes where codigo='$codigo'";
	$resultado = mysqli_query($conect, $sql);
	$exibe = mysqli_fetch_assoc($resultado);
	?>
	<a href="listarcliente.php">Listar Clientes</a>
	<a href="index.php">Voltar</a><br /><br />
	<form action="editarcliente.php" method="post">
		<input name="codigo" type="hidden" value="<?php echo $exibe["codigo"]; ?>" /> 
		Nome: <input type="text" name="Nome" maxlength="50" value="<?php echo $exibe["nome"]; ?>" />
		Email: <input type="email" name="Email" maxlength="30" value="<?php echo $exibe["email"]; ?>" />
		Data do Nascimento: <input type="date" name="data_nascimento" maxlength="20"
			value="<?php echo $exibe["data_nascimento"]; ?>" />
		<input type="submit" name="Salvar" value="Salvar" />
	</form>
</body>

</html>