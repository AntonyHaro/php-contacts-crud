<?php
//Conectando ao banco
include_once("conexao.php");

//traz as variáveis do formulário
$codigo = $_POST["codigo"];
$Nome = $_POST["Nome"];
$Email = $_POST["Email"];
$data_nascimento = $_POST["data_nascimento"];

//Script para deletar um registro específico na tabela no Banco de Dados
$sql = "update clientes set Nome='$Nome',Email='$Email',data_nascimento='$data_nascimento' where codigo='$codigo'";

// executando instrução SQL
$resultado = @mysqli_query($conect, $sql);


//if para ver se foi executado com sucesso a query
if ($resultado) {
	//exibe a mensagem de Cadastrado e a de voltar a tela anterior
	echo "Registro Alterado com Sucesso!     <a href='index.php'>Voltar</a>";
	exit;
} else {
	//Se não é exibido um erro
	echo mysql_error();
	exit;
}
?>