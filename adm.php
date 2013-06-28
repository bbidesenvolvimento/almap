<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['cod_adm'])) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: loginadm.php"); exit;
}

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
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
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
        <h5 class="main_h5">Administração de Login</h5>
        </div>
              <div class="pro_wrapper">
                 <div class="grid_5">
                 <a href="cadastracliente.php" class="pro_btn pro_danger">Cadastro Clientes</a>
                 </div>
                 <div class="grid_5">
                 <a href="cadastraclientemaster.php" class="pro_btn pro_warning">Cadastro Clientes Master</a>
                 </div>
                 <div class="grid_5">
                 <a href="cadastrapagina.php" class="pro_btn pro_success">Cadastro Páginas</a>
                 </div>
                 <div class="grid_5">
                 <a href="busca.php" class="pro_btn pro_success">Buscar Páginas</a><br>
                 </div>
                 </div>
                 <div class="pro_wrapper">
                 <div class="grid_5">
                 <a href="editaclientes.php" class="pro_btn pro_danger">Edita Clientes</a>
                 </div>
                 <div class="grid_5">
                         <a href="editaclientesmaster.php" class="pro_btn pro_warning">Edita Clientes Master</a>
                 </div>
                 <div class="grid_5">
                 <a href="editapaginas.php" class="pro_btn pro_success">Edita Páginas</a><br>
                 </div>
                 </div>
                 <br>
                 <div class="pro_wrapper">
                 <div class="grid_5">
                 <a href="destroisessaoadm.php" class="pro_btn pro_sign-out"><span></span>Logoff</a>
                 </div>
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