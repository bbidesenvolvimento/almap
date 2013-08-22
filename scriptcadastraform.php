<?php
//verifica se existe conexão com bd, caso não tenta criar uma nova
	$conexao = mysql_connect("localhost","bbi","root") //porta, usuário, senha
	or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	
	$mensagens="";
	
	//Abaixo atribuímos os valores provenientes do formulário pelo método POST
	$comentario = $_POST["comentario"]; 
	$cp = $_POST["cp"];
	$url = $_POST["url"];
	$cc = $_POST["cc"];
	$nc = $_POST["nc"];

	$phpdate = strtotime('NOW');
	$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
	
	$datacomentario = $mysqldate;
	$comentariot = mysql_real_escape_string($comentario, $conexao);
	
	$string_sql = "INSERT INTO comentarios (codPagina,texto,dataComentario,codCliente,nomeCliente) VALUES ('$cp','$comentariot','$datacomentario','$cc','$nc')";
	
	$select_db = mysql_select_db("almap"); //seleciona o banco de dados
	mysql_query($string_sql,$conexao) or die(mysql_error());
	
	//die(var_dump($string_sql));
	
	if(mysql_affected_rows() == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
		$loc = "viewCliente.php?url=$url&cp=$cp&cc=$cc";
		$locm = "viewClienteAlmap.php?url=$url&cp=$cp&cc=$cc";
		if($_POST["tp"] !== "master"){
			header("Location:  $loc");
		}else{
			var_dump($_POST);
			header("Location:  $locm");
		}

	} else {
		//header("Location: areaClienteerrocomentario.php?url=" . $url . "&cp=" . $cp . "&cc=" . $cc);
		die("Erro ao inserir o comentário. Por favor tente novamente mais tarde");
	}

	mysql_close($conexao); //fecha conexão com banco de dados 
?>