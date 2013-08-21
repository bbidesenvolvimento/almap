<?php require_once('Connections/conexao.php'); ?>
<?php require_once('Connections/conexao.php'); ?>
<?php 
session_start();  // Inicia a session
if (!isset($_SESSION['codCLIENTE'])) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: login.php"); exit;
}

require_once('Connections/conexao.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
  {
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }

    $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

    switch ($theType) {
      case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
      case "long":
      case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
      case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
      case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
      case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
    }
    return $theValue;
  }
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['codCLIENTE'])) {
  $colname_Recordset1 = $_SESSION['codCLIENTE'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM paginas WHERE cod_cliente = %s ORDER BY cod_pagina ASC;", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = "-1";
if (isset($_SESSION['codCLIENTE'])) {
  $totalRows_Recordset1 = $_SESSION['codCLIENTE'];
}
$colname_Recordset1 = "-1";
if (isset($_SESSION['codCLIENTE'])) {
  $colname_Recordset1 = $_SESSION['codCLIENTE'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM paginas WHERE cod_cliente = %s ORDER BY cod_pagina ASC;", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2MST = "-1";
if (isset($_SESSION['codMaster'])) {
  $colname_Recordset2MST = $_SESSION['codMaster'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset2MST = sprintf("SELECT * FROM usuariomaster WHERE codMaster = %s", GetSQLValueString($colname_Recordset2MST, "int"));
$Recordset2MST = mysql_query($query_Recordset2MST, $conexao) or die(mysql_error());
$row_Recordset2MST = mysql_fetch_assoc($Recordset2MST);
$totalRows_Recordset2MST = mysql_num_rows($Recordset2MST);

mysql_select_db($database_conexao, $conexao);
$query_Recordset3MST = sprintf("SELECT * FROM clientes WHERE codCLIENTE = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset3MST = mysql_query($query_Recordset3MST, $conexao) or die(mysql_error());
$row_Recordset3MST = mysql_fetch_assoc($Recordset3MST);
$totalRows_Recordset3MST = mysql_num_rows($Recordset3MST);


$contador=0;
$contadorgeral=0;
?>




<!DOCTYPE html>
<html lang="en">
<head>
 <title>BBI || Painel de Comando</title>
 <meta charset="utf-8">
 <meta name="description" content="BBI. Information to empower people">
 <meta name="keywords" content="Business Intelligence; Infográficos; Gestão de E-commerce; Conversões de banco de dados; gestão; BI; inteligência para negócios; Behemoth; BBI; banco de dados; informações; negócios">
 <meta name="author" content="Behemoth Business Intelligence">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/demo.css">
 <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
 <script src="js/jquery-1.7.1.min.js"></script>
 <script src="js/script.js"></script>
 <!-- Begin DigiCert/ClickID site seal JavaScript code -->
 <script type="text/javascript">
 var __dcid = __dcid || [];__dcid.push(["DigiCertClickID_vBSOqKxV", "14", "s", "black", "vBSOqKxV"]);(function(){var cid=document.createElement("script");cid.async=true;cid.src="//seal.digicert.com/seals/cascade/seal.min.js";var s = document.getElementsByTagName("script");var ls = s[(s.length - 1)];ls.parentNode.insertBefore(cid, ls.nextSibling);}());
 </script>
 <!-- End DigiCert/ClickID site seal JavaScript code -->
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
  <link href="/images/icons/favicon.ico" rel="icon" type="image/x-icon" />

  <style type="text/css">
  #page4 .bg #content .bg2 .main .container_24.p42 .pro_wrapper #areaa {
   clear: both;
   padding-top: 10px;
 }
 #imgCli img{
  width:  100px;
  float: right;
  height: auto;
}
</style>
</head>


<body id="page4">
  <div class="bg">
    <!--==============================header=================================-->   
    <header>
    	<div class="main">
        <a class="logo" href="#">BBI</a>
        <nav>
          <ul class="sf-menu">

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
            <div class="grid_24">
             <ul id="pro_breadcrumbs-two">
               <li><span><?php echo $row_Recordset2MST['nomeMaster'];?></span></li>
               <li><a class="current"><?php echo $_SESSION['nomeCLIENTE']; ?></a></li>
             </ul>
             <div id="imgCli"/>&nbsp;  
           </div>
         </div>

         <div class="pro_wrapper-large"></div>
         <div class="grid_5 push_19" align="right"></div>
       </div>

       <!-- comeca aqui -->
       <div class="pro_tabs-horz-top">
         <ul class="pro_tabs-nav">
           <li><a href="#">Dashboards</a></li>
         </ul>



         <div class="pro_tab-content">
           <?php do { ?>
           <?php if($contador==0 ) { ?>
           <div class="pro_wrapper">
            <?php } ?>

                    <?php if(!$row_Recordset1): ?><br>
                    <center>Nenhum dashboard cadastrado até o momento.</center>
                  <?php else: ?>
            <div class="grid_7">
              <div class="pro_wrapper">
                <div class="aligncenter">
                  <div class="pro_wrapper-large">
                    <div class="clear"></div>
                  </div>
                  <span class="pro_image_style2">

                  <a href="viewCliente.php?url=<?php echo $row_Recordset1['url_Pagina']; ?>&cp=<?php echo $row_Recordset1['cod_pagina']; ?>&cc=<?php echo $row_Recordset1['cod_cliente']; ?>"><img src="<?php echo $row_Recordset1['imgPagina']; ?>" alt="" width="auto" height="100"></a>
                <?php endif;?>
              </span>
            </div>
            <div class="aligncenter">
             <strong><br><?php echo $row_Recordset1['legenda'];?></strong>				
           </div>
         </div>
       </div>
       <?php 
       $contador++;
       $contadorgeral++;
       if( $contador==3 || $contadorgeral==$totalRows_Recordset1) {
         $contador=0
         ?>
       </div>
       <?php }; ?>

       <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
     </div>

   </div>     
   <div class="wrapper p16">
    <article class="grid_24">
      <div id="textgq">
        <img src="images/icons/icon-question.png" alt="">
        <b>Precisa de ajuda?</b><br>
        Para assuntos sobre o seu projeto: <a href="mailto:projetos@bbi.net.br">projetos@bbi.net.br</a><br>
        Para assuntos técnicos: <a href="mailto:suporte@bbi.net.br">suporte@bbi.net.br</a><br></div>
      </article>
      <br>
      <a href="destroisessao.php" style="float:right; margin-top:20px; margin-right:30px;" class="pro_btn pro_sign-out"><span></span>Logoff</a>
    </div> 
  </div>
</section>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2MST);
?>
