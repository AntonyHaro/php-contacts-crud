<?php
$host="localhost"; //nome do servidor
$username="root"; //Login Usuário Mysql
$password="usbw"; //Senha do usuario Mysql
$db_name="cadastro"; //Nome do Banco de Dados
$tabela="clientes"; //Tabela Clientes

//conexão com o servidor
//$conect = mysql_connect("$host", "$username", "$password", "$db_name");
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro

$conect = @mysqli_connect($host, $username, $password, $db_name) 
	or die ("Problemas com a conexão do Banco de Dados");

?>