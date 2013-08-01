<?php require_once('Connections/conexao.php'); ?>
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['c'])) {
  $colname_Recordset1 = $_GET['c'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM usuariosimples WHERE codCLIENTE = %s", GetSQLValueString($colname_Recordset1, "int"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$colname_Recordset2mast = "-1";
if (isset($_GET['cm'])) {
  $colname_Recordset2mast = $_GET['cm'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset2mast = sprintf("SELECT * FROM usuariomaster WHERE codMaster = %s", GetSQLValueString($colname_Recordset2mast, "int"));
$Recordset2mast = mysql_query($query_Recordset2mast, $conexao) or die(mysql_error());
$row_Recordset2mast = mysql_fetch_assoc($Recordset2mast);
$totalRows_Recordset2mast = mysql_num_rows($Recordset2mast);

$colname_Recordset2 = "-1";
if (isset($_GET['c'])) {
  $colname_Recordset2 = $_GET['c'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset2 = sprintf("SELECT * FROM clientes WHERE codCLIENTE = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $conexao) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
 
session_start();  // Inicia a session
if (!isset($_SESSION['codCLIENTE'])) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: login.php"); exit;
}

require_once('Connections/conexao.php'); ?>
<?php
$c = $_GET['c'];
$cm = $_GET['cm'];
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
     <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/demo.css">
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
                    <li><a href="login.php">LOGIN</a></li>
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
    <li><span>Painel de Comando</span></li>
    <li><a href="areaClienteMaster.php?cod=<?php echo $c; ?>"><?php echo $row_Recordset2mast['nomeMaster']; ?></a></li>
     <li><a href="areaClientesub.php?c=<?php echo $c; ?>&cm=<?php echo $cm; ?>"><?php echo $row_Recordset2['nomeCLIENTE']; ?></a></li>
     <li><a href="administrarUsuarios.php?c=<?php echo $c; ?>&cm=<?php echo $cm; ?>">Usuários</a></li>
    <li><a class="current">Remover</a></li>
    </ul>
					</div>
						</div>
                  <div class="pro_wrapper-large">
               <div class="clear"></div>
               </div>
                  <div class="pro_wrapper">
                    <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <table class="pro_table">
    <thead>
      <tr>
        <th width="35%"> Usuário </th>
        <th width="65%"> Remover </th>
        </tr>
    </thead>
    <tbody>
      <?php do { ?>
        <tr>
          <td> <?php echo $row_Recordset1['nomeUsuarioSP']; ?> </td>
          <td> <div class="excluir">
          <a href="scriptRemoveUsuarioSP.php?cod=<?php echo $row_Recordset1['codSimples']; ?>&c=<?php echo $c; ?>&cm=<?php echo $cm; ?>">&emsp;&emsp;&emsp;</a>
          </div>
          </td>
          
          
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </tbody>
  </table>
  <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
    Desculpe. Nenhum usuário cadastrado.
        <?php } // Show if recordset empty ?>
                </div>
                  <div class="pro_wrapper-large">
               <div class="clear"></div>
               </div>
     			<div class="wrapper p16">
                <article class="grid_24">
                  <div class="page1-box3 aligncenter">
                 <!-- Begin DigiCert/ClickID site seal HTML -->
<div id="DigiCertClickID_vBSOqKxV" data-language="en_US"></div>
	<a href="https://www.digicert.com/">site seguro</a>
<!-- End DigiCert/ClickID site seal HTML -->
                  </div>
                  </article>
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
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2mast);

mysql_free_result($Recordset2);

mysql_free_result($deftb);
?>
