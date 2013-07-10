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
    
    <!--script src="js/jquery-1.7.1.min.js"></script-->
    <!--script src="js/script.js"></script-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styletab.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <style type="text/css">
    #page4 .bg #content .bg2 .main .container_24.p42 .pro_wrapper #areaa {
    clear: both;
    padding-top: 10px;
    font-size: 60%;
    }
    ul {
        font-size: 62.5%
    }
    </style>
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
      <script>
      var jq = $.noConflict();
          jq(function() {
            jq( "#tabs" ).tabs({
              beforeLoad: function( event, ui ) {
                ui.jqXHR.error(function() {
                  ui.panel.html(
                    "Erro ao carregar categoria. Tente novamente em instantes" );
                });
              }
            });
          });
      </script>
</head>

<body id="page4">
<div class="bg">
<!--==============================header=================================-->   
   <header>
    	<div class="main">
		<a class="logo" href="index.html">BBI</a>
            <nav>
                <ul class="sf-menu">
                    <!--li><a href="index.html">HOME</a></li>
                    <li><a href="empresa.html">EMPRESA</a></li>
                    <li><a>SERVIÇOS</a>
                    <ul>
                    <li class="first"><a href="bi.html">Business Intelligence</a></li>
                    <li class="last1"><a href="comercializacao.html">Comercialização</a></li>
                    </ul>
                    </li>
                    <li class="menu-bot"><a href="galeria.html">GALERIA</a></li>
                    <li><a href="contato.html">CONTATO</a></li>
                    <li class="active"><a href="destroisessaoadm.php">LOGOUT</a></li-->
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
        <h5 class="main_h5">Painel Administrativo</h5>
        </div>
              <div class="pro_wrapper"> 
                <div id="tabs">
                      <ul>
                        <li><a href="cadastracliente.php">Cadastro Cliente</a></li>
                        <li><a href="editaclientes.php">Editar clientes</a></li>
                        <li><a href="cadastraclientemaster.php">Cadastro Clientes Master</a></li>
                        <li><a href="editaclientesmaster.php">Edita Clientes Master</a></li>
                        <?php if($_SESSION['login_adm'] == 'bbi'):?>
                        <li><a href="editapaginas.php">Edita Páginas</a></li>
                        <li><a href="cadastrapagina.php">Criar Página</a></li>
                        <li><a href="busca.php">Buscar</a></li>
                        <?php endif; ?>
                      </ul>
                </div>
<br>


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