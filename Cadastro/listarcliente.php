<?php
//Conectando ao banco
include_once("conexao.php");

//Script de uma busca em uma tabela no Banco de Dados
$sql = "select codigo,nome,email,data_nascimento from $tabela";

// executando instrução SQL
$resultado = @mysqli_query($conect, $sql);

echo "----->Codigo | Nome | E-mail | Data do Nascimento <br><br>";

//Retorna uma matriz associativa dos dados
while ($exibe = mysqli_fetch_assoc($resultado)) {

	//Passa por parâmetro a linha a ser alterada
	echo "<a href='editarclienteform.php?&codigo=" . $exibe['codigo'] . "'>Editar</a>";

	//exibe em tela a linha da matriz associada aos dados
	echo " | ";
	echo $exibe["codigo"] . " | ";
	echo $exibe["nome"] . " | ";
	echo $exibe["email"] . " | ";
	echo $exibe["data_nascimento"] . " | ";

	//Passa por parâmetro a linha a ser removida
	echo "<a href='removercliente.php?&codigo=" . $exibe['codigo'] . "'>Remover</a> <br>";
}
echo "<br><a href='index.php'>Voltar</a>"
	?>