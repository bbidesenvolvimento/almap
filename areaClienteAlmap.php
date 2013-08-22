<?php require_once('Connections/conexao.php'); ?>
<?php 
session_start();  // Inicia a session
if (!isset($_SESSION['cod_adm'])) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: login.php"); exit;
}
require_once('Connections/conexao.php'); 
?>
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
//$query_Recordset1 = sprintf("SELECT * FROM paginas WHERE cod_cliente = %s ORDER BY cod_pagina ASC;", GetSQLValueString($colname_Recordset1, "int"));
$query_Recordset1 = sprintf("SELECT * FROM paginas ORDER BY cod_pagina ASC;", GetSQLValueString($colname_Recordset1, "int"));
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
//$query_Recordset1 = sprintf("SELECT * FROM paginas  ORDER BY cod_pagina ASC;", GetSQLValueString($colname_Recordset1, "int"));
$query_Recordset1 = sprintf("select c.codCLIENTE,c.nomeCLIENTE from paginas p
  left join clientes c on c.codCLIENTE = p.cod_cliente
  where c.codCLIENTE is not null
  group by c.nomeCLIENTE order by c.nomeCLIENTE asc;", GetSQLValueString($colname_Recordset1, "int"));

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

$sql_cli = "select c.codCLIENTE,c.nomeCLIENTE from paginas p left join clientes c on c.codCLIENTE = p.cod_cliente where c.codCLIENTE is not null group by c.nomeCLIENTE order by c.nomeCLIENTE asc;";
$RecordsetCli = mysql_query($sql_cli, $conexao) or die(mysql_error());

$sql_Master = "select codMaster,nomeMaster from usuariomaster order by nomeMaster asc;";
$RecordsetMst = mysql_query($sql_Master, $conexao) or die(mysql_error());

function getCliByMaster($codMaster,$conexao){
  $sql_cli = "select c.codCLIENTE,c.nomeCLIENTE from clientes c where c.codMaster = $codMaster group by c.nomeCLIENTE order by c.nomeCLIENTE asc;"; 
  $RecordsetMst = mysql_query($sql_cli, $conexao) or die(mysql_error());
  while($rs_Cli = mysql_fetch_object($RecordsetMst)) {
    print "<div class=\"clear\"></div><div id=\"div_cli\"><p>$rs_Cli->nomeCLIENTE</p>";
    getPageByCli($rs_Cli->codCLIENTE,$conexao);
    print("</div>");
  } 
}

function getPageByCli($foo,$conexao){
  $sql_pag = "select * from paginas where cod_cliente = $foo order by cod_cliente asc;";
  $RecordsetPag = mysql_query($sql_pag, $conexao) or die(mysql_error());
  while($rs_Pg = mysql_fetch_object($RecordsetPag)) {
    print("<div class=\"grid_7\">
      <div class=\"pro_wrapper\">
      <div class=\"aligncenter\">
      <div class=\"pro_wrapper-large\">
      <div class=\"clear\"></div>
      </div>");
    echo "<span class='pro_image_style2'>";
    echo "<a href='viewClienteAlmap.php?url=$rs_Pg->url_Pagina&cp=$rs_Pg->cod_pagina&cc=$rs_Pg->cod_cliente'>";
    echo "<img src='$rs_Pg->imgPagina' width='auto' height='100'></a></span>";
    print("</div><div class=\"aligncenter\"><strong><b>$rs_Pg->legenda</b><br></strong></div></div><br></div>");
  }
}
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
 <script src="js/script.js"></script>
 <link rel="stylesheet" href="js/ui/jquery-ui.css" />
 <script src="js/ui/jquery-1.9.1.js"></script>
 <script src="js/ui/jquery-ui.js"></script> 


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

#div_cli {
  background-color: #F1F1F1;
  -moz-border-radius: 15px;
  border-radius: 8px;
  padding: 7px;
  border: 1px solid #D8D8D8;
}

#div_cli p {
  font: AlmapFonte;
color: #525151;
  font-size: 18px;
  text-align: left;
  padding: 5px;
}
</style>
</head>

<script>
$(function() {
  $( "#accordion" ).accordion({
    heightStyle: "content",
    event: "click hoverintent"
  });
});
</script>


<body id="page4">
  <div class="bg">
    <!--==============================header=================================-->   
    <header>
    	<div class="main">
        <a class="logo" href="index.html">BBI</a>
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
               <li><span>Almap</span></li>
               <li><a class="current">Todos os Clientes</a></li>
             </ul>
             <div id="imgCli"/><img src="<?php echo $row_Recordset3MST['imgUSUARIO'];?>">  
           </div>
         </div>
         <div class="pro_wrapper-large"></div>
         <div class="grid_5 push_19" align="right"></div>
       </div>

       <!-- comeca aqui -->
       <div class="pro_tabs-horz-top">
        <div class="pro_tab-content">
          <div class="pro_wrapper">
            <!-- Accrodion  -->
            <div id="accordion">
             <?php while ($rs_Mst = mysql_fetch_object($RecordsetMst)) { ?> 
             <h2><?php echo $rs_Mst->nomeMaster; ?></h2>
             <div>
              <?php getCliByMaster($rs_Mst->codMaster,$conexao);?>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- Fim Accrodion -->
        

      </div>     
      <div class="wrapper p16">
        <article class="grid_24">
 
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
