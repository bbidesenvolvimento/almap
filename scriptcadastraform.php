<?php
//verifica se existe conexão com bd, caso não tenta criar uma nova
	$conexao = mysql_connect("localhost","fabricio","fabricio") //porta, usuário, senha
	or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	
	$select_db = mysql_select_db("bb"); //seleciona o banco de dados
	$mensagens="";
	
	//Abaixo atribuímos os valores provenientes do formulário pelo método POST
	$comentario = $_POST["comentario"]; 
	$cp = $_POST["cp"];
	$url = $_POST["url"];
	$cc = $_POST["cc"];
	$nc = $_POST["nc"];
	
	$phpdate = strtotime( $mysqldate );
	$mysqldate = date( 'Y-m-d H:i:s', $phpdate );

	
	$datacomentario = $mysqldate;

	
	$string_sql = "INSERT INTO comentarios (codPagina, texto,  codCliente, nomeCliente) VALUES ('$cp','$comentario','$cc','$nc')"; //String com consulta SQL da inserção
	//echo $string_sql;
	
	
	mysql_query($string_sql,$conexao); //Realiza a consulta
	
	if(mysql_affected_rows() == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
		header("Location: viewCliente.php?url=" . $url . "&cp=" . $cp . "&cc=" . $cc);
		
		
	} else {
		header("Location: areaClienteerrocomentario.php?url=" . $url . "&cp=" . $cp . "&cc=" . $cc);
	}
	


	mysql_close($conexao); //fecha conexão com banco de dados 



?>