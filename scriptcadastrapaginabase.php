<?php
//verifica se existe conexão com bd, caso não tenta criar uma nova
	$conexao = mysql_connect("localhost","fabricio","fabricio") //porta, usuário, senha
	or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	
	$select_db = mysql_select_db("bb"); //seleciona o banco de dados

// Repassa a variável do upload
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

// Caso a variável $arquivo contenha o valor FALSE, esse script foi acessado
// diretamente, então mostra um alerta para o usuário
if (!$arquivo) {
    echo "Não acesse esse arquivo diretamente!";
}
// Imagem foi enviada, então a move para o diretório desejado
else {
    // Diretório para onde o arquivo será movido
    $diretorio = "pagsclientes/";

    // Move o arquivo
    // Lembrando que se $arquivo não fosse declarado no começo do script,
    // você estaria usando $_FILES['arquivo']['tmp_name'] e $_FILES['arquivo']['name']
    if (move_uploaded_file($arquivo['tmp_name'], $diretorio . $arquivo['name'])) {
        echo "Arquivo Enviado com sucesso!";
    } 
    else {
        echo "Erro ao enviar seu arquivo!";
    }
}
		
	//Abaixo atribuímos os valores provenientes do formulário pelo método POST
	$cliente = $_POST["cliente"]; 
	$nome = $_POST["nome"];
	$url = $_POST["url"];
	$legenda = $_POST["legenda"];
	$caminhoimg = $diretorio . $arquivo['name'];

	
	$string_sql = "INSERT INTO paginas (cod_cliente, nome_Pagina, url_Pagina, legenda, imgPagina) VALUES ('$cliente','$nome','$url','$legenda','$caminhoimg')"; //String com consulta SQL da inserção
	
	mysql_query($string_sql,$conexao); //Realiza a consulta
	
	if(mysql_affected_rows() == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
		echo "<p>Cadastro feito com sucesso</p>";
		echo '<a href="cadastrapaginas.php">Voltar para formulário de cadastro de paginas</a>'; //Apenas um link para retornar para o formulário de cadastro
		echo '<p><a href="verpaginas.php">Ver Paginas cadastrados</a></p>'; //Apenas um link para retornar para o formulário de cadastro
	} else {
		echo "Erro, não possível inserir no banco de dados";
	}
	
	mysql_close($conexao); //fecha conexão com banco de dados 



?>