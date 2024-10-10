<?php
//Conectando ao banco
include_once("conexao.php");

//envia via Get o código a ser removido ao Banco de Dados
$codigo = $_GET["codigo"];

//Script para deletar um registro específico na tabela no Banco de Dados
$sql = "delete from $tabela where codigo='$codigo'";

// executando instrução SQL
$resultado = @mysqli_query($conect,$sql);

//if para ver se foi removido com sucesso a query
if ($resultado)
{
	//exibe a mensagem de Remoção e volta a tela anterior
	echo "Registro Deletado com Sucesso!     <a href='index.php'>Voltar</a>";
	exit;
}else{
	//Se não, será exibido um erro
	echo mysqli_error();
	exit;
}
?>