<?php
//Conectando ao banco
include_once("conexao.php");

//traz as variáveis do formulário
$Nome = $_POST["Nome"];
$Email = $_POST["Email"];
$data_nascimento = $_POST["data_nascimento"];

//Script para inserir um registro na tabela no Banco de Dados
$sql = "insert into $tabela (nome,email,data_nascimento) values ('$Nome','$Email','$data_nascimento')";

// executando instrução SQL
$resultado = @mysqli_query($conect,$sql);

if (!$resultado) {
	die('Query Inválida: ' . @mysqli_error($conect));  
} else {
	mysqli_close($conect);
	echo "Registro Cadastrado com Sucesso!     <a href='index.php'>Voltar</a>";
	exit;
} 
?>