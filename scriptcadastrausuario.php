﻿<?php
//verifica se existe conexão com bd, caso não tenta criar uma nova
	$conexao = mysql_connect("localhost","fabricio","fabricio") //porta, usuário, senha
	or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
$select_db = mysql_select_db("bb"); //seleciona o banco de dados
$mensagens="";

	//Abaixo atribuímos os valores provenientes do formulário pelo método POST
	$nomeUsuarioSP = $_POST["nomeUsuarioSP"]; 
	$senhaUsuarioSP = $_POST["senhaUsuarioSP"];
	$codCLIENTE = $_POST["codCLIENTE"];
	$loginUsuarioSP = $_POST["loginUsuarioSP"];
	$nomeCLIENTE = $_POST["nomeCLIENTE"];
	$usuarioTABLEAU = $_POST["usuarioTABLEAU"];
	$imgUSUARIO = $_POST["imgUSUARIO"];
	$codMaster = $_POST["codMaster"];
	$c = $_POST["c"];
	
	
/*
nomeUsuarioSP,senhaUsuarioSP,codCLIENTE,loginUsuarioSP,nomeCLIENTE,usuarioTABLEAU,imgUSUARIO,codMaster
c
*/	
	$string_sql = "INSERT INTO usuariosimples (nomeUsuarioSP,senhaUsuarioSP,codCLIENTE,loginUsuarioSP,nomeCLIENTE,usuarioTABLEAU,imgUSUARIO,codMaster) VALUES ('$nomeUsuarioSP','$senhaUsuarioSP','$codCLIENTE','$loginUsuarioSP','$nomeCLIENTE','$usuarioTABLEAU','$imgUSUARIO','$codMaster')"; //String com consulta SQL da inserção
	
	mysql_query($string_sql,$conexao); //Realiza a consulta
	
	if(mysql_affected_rows() == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
		$mensagens=$mensagens."<p>Cadastro feito com sucesso</p>";
		$mensagens=$mensagens."<p>Seu usuário poder refefinir a senha no endereço: httpss://bbi.net.br/redefine_senha_usuario.php</p>";
		$mensagens=$mensagens.'<a href="administrarUsuarios.php?c=' . $c . '&cm=' . $codMaster . '">Voltar para a área de Administração de Usuários</a>'; //Apenas um link para retornar para o formulário de cadastro
	} else {
		$mensagens=$mensagens."Erro, não foi possível inserir no banco de dados";
		$mensagens=$mensagens.'<a href="administrarUsuarios.php?c=' . $c . '&cm=' . $codMaster . '">Voltar para a área de Administração de Usuários</a>'; //Apenas um link para retornar para o formulário de cadastro
	}
	
	mysql_close($conexao); //fecha conexão com banco de dados 



?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>BBI || Admin</title>
  	<meta charset="utf-8">
    <meta name="description" content="BBI. Information to empower people">
    <meta name="keywords" content="Business Intelligence; Infográficos; Gestão de E-commerce; Conversões de banco de dados; gestão; BI; inteligência para negócios; Behemoth; BBI; banco de dados; informações; negócios">
    <meta name="author" content="Behemoth Business Intelligence">
    <link rel="stylesheet" href="css/style.css">
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <style type="text/css">
    #page4 .bg #content .bg2 .main .container_24.p42 .pro_wrapper #areaa {
	clear: both;
	padding-top: 10px;
}
    </style>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="https://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="https://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body id="page4">
<div class="bg">
<!--==============================header=================================-->   
   <header>
    	<div class="main">
		<a class="logo" href="index.html">BBI</a>
            <nav>
                <ul class="sf-menu">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="empresa.html">EMPRESA</a></li>
                    <li><a>SERVIÇOS</a>
                    <ul>
                    <li class="first"><a href="bi.html">Business Intelligence</a></li>
                    <li class="last1"><a href="comercializacao.html">Comercialização</a></li>
                    </ul>
                    </li>
                    <li class="menu-bot"><a href="galeria.html">GALERIA</a></li>
                    <li><a href="contato.html">CONTATO</a></li>
                    <li class="active"><a href="login.php">LOGIN</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
	<!--==============================content================================-->    
    <section id="content">
    <div class="bg2"> 
        <div class="main">
        <div class="content-line"></div>
            <div class="container_24 p42">  
		       <div class="pro_wrapper">
        <h5 class="main_h5"><?php echo $mensagens ?></h5>
        </div>
          </div>
	</div>
  </div>
 </section>
</div>
	<!--==============================footer=================================-->
   <footer>
        <div class="main">
        <div class="foot-page">
       	  BBI &copy; 2012 &nbsp;|&nbsp; <a class="link2" href="politica_privacidade.html">Política de Privacidade</a>
          <div class="clear"></div>
            <div class="foot"><!-- {%FOOTER_LINK} --></div>
        </div>        
        </div>
    </footer>  

</body>
</html>