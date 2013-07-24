<?php
//verifica se existe conexão com bd, caso não tenta criar uma nova
	$conexao = mysql_connect("localhost","bbi","root") //porta, usuário, senha
	or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	
	$select_db = mysql_select_db("almap"); //seleciona o banco de dados
    $mensagens="";
// Repassa a variável do upload
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;



// Caso a variável $arquivo contenha o valor FALSE, esse script foi acessado
// diretamente, então mostra um alerta para o usuário
    if (!$arquivo) {
        $mensagens=$mensagens."Não acesse esse arquivo diretamente!";
    }
// Imagem foi enviada, então a move para o diretório desejado
    else {
    // Diretório para onde o arquivo será movido
        $diretorio = "pagsclientes/";

    // Move o arquivo
    // Lembrando que se $arquivo não fosse declarado no começo do script,
    // você estaria usando $_FILES['arquivo']['tmp_name'] e $_FILES['arquivo']['name']
        if (move_uploaded_file($arquivo['tmp_name'], $diretorio . $arquivo['name'])) {
            $mensagens=$mensagens."Arquivo Enviado com sucesso!";
        } 
        else {
            $mensagens=$mensagens."Erro ao enviar seu arquivo!";
        }
    }
    
    //Abaixo atribuímos os valores provenientes do formulário pelo método POST
    $cliente = $_POST["cliente"]; 
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $usuarioTB = $_POST["usuarioTB"];
    $usuarioMaster = $_POST["usuarioMaster"];
    $caminhoimg = $diretorio . $arquivo['name'];
    
    $string_sql = "INSERT INTO clientes (nomeCLIENTE, loginCLIENTE, senhaCLIENTE, usuarioTABLEAU, imgUSUARIO, codMaster) VALUES ('$cliente','$login','$senha','$usuarioTB','$caminhoimg','$usuarioMaster')"; //String com consulta SQL da inserção

    mysql_query($string_sql,$conexao); //Realiza a consulta
 
 
    
    if(mysql_affected_rows() == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
    $mensagens=$mensagens."<p>Cadastro feito com sucesso</p>";
		$mensagens=$mensagens.'<a href="adm.php">Voltar para área de administração</a>'; //Apenas um link para retornar para o formulário de cadastro
		
		$sqlDir = mysql_query(
           "SELECT * FROM clientes
           WHERE loginCLIENTE='{$login}'
           AND senhaCLIENTE='{$senha}'
           AND nomeCLIENTE='{$cliente}'"
					); // sql para busca na tabela master

 		$login_checkDir = mysql_num_rows($sqlDir); // variavel para checar o sql da tabela master
      
		if ($login_checkDir > 0){// tem dados na consulta
          while ($row = mysql_fetch_array($sqlDir)){
             foreach ($row AS $key => $val){
				$$key = stripslashes( $val );// retira os valores
			}
			$dir= "pagsclientes/" . $codCLIENTE;

          if (!is_file($dir) && !is_dir($dir)) {
    	mkdir($dir); //create the directory
    }else{
    	//echo "{$dir} exists and is a valid dir";
    }
}
}

header("Location: adm.php?tab=0");

} else {
  $mensagens=$mensagens."Erro, não possível inserir no banco de dados";
}



mysql_close($conexao); //fecha conexão com banco de dados 
    ?>
