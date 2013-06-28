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

$colname_Recordset1 = "-1";
if (isset($_GET['c'])) {
  $colname_Recordset1 = $_GET['c'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM clientes WHERE codCLIENTE = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2master = "-1";
if (isset($_GET['cm'])) {
  $colname_Recordset2master = $_GET['cm'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset2master = sprintf("SELECT * FROM usuariomaster WHERE codMaster = %s", GetSQLValueString($colname_Recordset2master, "int"));
$Recordset2master = mysql_query($query_Recordset2master, $conexao) or die(mysql_error());
$row_Recordset2master = mysql_fetch_assoc($Recordset2master);
$totalRows_Recordset2master = mysql_num_rows($Recordset2master);

$c = $_GET['c'];
$cm = $_GET['cm'];
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
     <link rel="stylesheet" href="css/demo.css">
    <style type="text/css">
    #page4 .bg #content .bg2 .main .container_24.p42 .pro_wrapper #areaa {
	clear: both;
	padding-top: 10px;
}
    </style>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <!-- Begin DigiCert/ClickID site seal JavaScript code -->
<script type="text/javascript">
var __dcid = __dcid || [];__dcid.push(["DigiCertClickID_vBSOqKxV", "14", "s", "black", "vBSOqKxV"]);(function(){var cid=document.createElement("script");cid.async=true;cid.src="//seal.digicert.com/seals/cascade/seal.min.js";var s = document.getElementsByTagName("script");var ls = s[(s.length - 1)];ls.parentNode.insertBefore(cid, ls.nextSibling);}());
</script>
<!-- End DigiCert/ClickID site seal JavaScript code -->
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
                <div class="grid_24">
        <ul id="pro_breadcrumbs-two">
    <li><span>Painel de Comando</span></li>
    <li><a href="areaClienteMaster.php?cod=<?php echo $c; ?>"><?php echo $row_Recordset2master['nomeMaster']; ?></a></li>
    
    <li><a href="areaClientesub.php?c=<?php echo $c; ?>&cm=<?php echo $cm; ?>"><?php echo $row_Recordset1['nomeCLIENTE']; ?></a></li>
    <li><a href="administrarUsuarios.php?c=<?php echo $c; ?>&cm=<?php echo $cm; ?>">Usuários</a></li>
    <li><a class="current">Adicionar</a></li>
    </ul>
					</div>
						</div>
                        <div class="pro_wrapper-large">
               <div class="clear"></div>
               </div>
              <div class="pro_wrapper">
                 <div id="areaa">
                 <form action="scriptcadastrausuario.php" method="POST" enctype="multipart/form-data">
                 <table width="827">
                 <tr>
                 <td>Nome do Usuario:</td>
                 <td><input name="nomeUsuarioSP" type="text" id="nomeUsuarioSP" size="50" />
                 <input name="nomeCLIENTE" type="hidden" id="nomeCLIENTE" value="<?php echo $row_Recordset1['nomeCLIENTE']; ?>"  /></td>
                 </tr>
                 <tr>
                 <td>Login:</td>
                 <td><input name="loginUsuarioSP" type="text" id="loginUsuarioSP" size="50" /></td>
                 </tr>
                 <tr>
                 <td>Senha:</td>
                 <td> <input name="senhaUsuarioSP" type="text" id="senhaUsuarioSP" size="50" />
                 <input name="usuarioTABLEAU" type="hidden" id="usuarioTABLEAU" value="<?php echo $row_Recordset1['usuarioTABLEAU']; ?>" />
                 <input name="codMaster" type="hidden" id="codMaster" value="<?php echo $row_Recordset1['codMaster']; ?>" />
                 <input name="imgUSUARIO" type="hidden" id="imgUSUARIO" value="<?php echo $row_Recordset1['imgUSUARIO']; ?>" />
                 <input name="codCLIENTE" type="hidden" id="codCLIENTE" value="<?php echo $row_Recordset1['codCLIENTE']; ?>" />
                  <input name="c" type="hidden" id="c" value="<?php echo $c; ?>" />
                 </td>
                 </tr>
                 <td>&nbsp;</td>
                 <td> <input type="submit" value="Enviar"></td>
                 </tr>
                 </table>
</form>
</div>
               </div>
               <div class="pro_wrapper-large">
               <div class="clear"></div>
               </div>
               <div class="wrapper p16">
                <article class="grid_24">
                  <div class="page1-box3 aligncenter">
                 <!-- Begin DigiCert/ClickID site seal HTML -->
<div id="DigiCertClickID_vBSOqKxV" data-language="en_US"></div>
	<a href="http://www.digicert.com/">site seguro</a>
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

mysql_free_result($Recordset2master);
?>
