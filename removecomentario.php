<?php
$url = $_GET['url'];
$cp = $_GET['cp'];
$cc = $_GET['cc'];
$codComentario = $_GET['codComentario'];


//verifica se existe conexão com bd, caso não tenta criar uma nova
	$conexao = mysql_connect("localhost","fabricio","fabricio") //porta, usuário, senha
	or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	


mysql_select_db("bb", $conexao);

mysql_query("DELETE FROM comentarios WHERE codComentario='" . $codComentario . "'");


header("Location: viewCliente.php?url=" . $url ."&cp=" . $cp."&cc=" . $cc );

mysql_close($con);
?>