<?php require_once('Connections/conexao.php'); ?>
<?php require_once('Connections/conexao.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE clientes SET nomeCLIENTE=%s, loginCLIENTE=%s, senhaCLIENTE=%s, usuarioTABLEAU=%s, imgUSUARIO=%s WHERE codCLIENTE=%s",
                       GetSQLValueString($_POST['cliente'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['usuarioTB'], "text"),
                       GetSQLValueString($_POST['img'], "text"),
                       GetSQLValueString($_POST['cod'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "editaclientes.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['cod'])) {
  $colname_Recordset1 = $_GET['cod'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM clientes WHERE codCLIENTE = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conexao, $conexao);
$query_master = "SELECT * FROM usuariomaster";
$master = mysql_query($query_master, $conexao) or die(mysql_error());
$row_master = mysql_fetch_assoc($master);
$totalRows_master = mysql_num_rows($master);
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
        <h5 class="main_h5"><a href="adm.php">Administração:</a> Edição de Clientes</h5>
        </div>
              <div class="pro_wrapper">
                 <div id="areaa">
                 <form action="scriptatualizacliente.php" method="POST" enctype="multipart/form-data">
                 <table width="827">
                 <tr>
                 <td>Nome do Cliente:</td>
                 
                 <td><input name="cliente" type="text" id="cliente" value="<?php echo $row_Recordset1['nomeCLIENTE']; ?>" size="50" /></td>
                 </tr>
                 <tr>
                 <td>Login BBI:</td>
                 <td><input name="login" type="text" id="login" value="<?php echo $row_Recordset1['loginCLIENTE']; ?>" size="50" /></td>
                 </tr>
                 <tr>
                 <td>Senha BBI:</td>
                 <td> <input name="senha" type="text" id="senha" value="<?php echo $row_Recordset1['senhaCLIENTE']; ?>" size="50" /></td>
                 </tr>
                 <tr>
                 <td>usuario Tableau:</td>
                 <td><input name="usuarioTB" type="text" id="usuarioTB" value="<?php echo $row_Recordset1['usuarioTABLEAU']; ?>" size="50" /></td>
                 </tr>
                 <tr>
                 <td>Master:</td>
                 <td><label for="codMaster"></label>
                   <select name="codMaster" id="codMaster">
                     <option value="0" <?php if (!(strcmp(0, $row_Recordset1['codMaster']))) {echo "selected=\"selected\"";} ?>>Nenhum</option>
                     <?php
do {  
?>
                     <option value="<?php echo $row_master['codMaster']?>"<?php if (!(strcmp($row_master['codMaster'], $row_Recordset1['codMaster']))) {echo "selected=\"selected\"";} ?>><?php echo $row_master['nomeMaster']?></option>
                     <?php
} while ($row_master = mysql_fetch_assoc($master));
  $rows = mysql_num_rows($master);
  if($rows > 0) {
      mysql_data_seek($master, 0);
	  $row_master = mysql_fetch_assoc($master);
  }
?>
                   </select></td>
                 </tr>
                 <tr>
                 <td>imgUsuario</td>
                 <td><input name="arquivo" type="file" size="50"><BR>          <input name="cod" type="hidden" id="cod" value="<?php echo $row_Recordset1['codCLIENTE']; ?>"> Atual: <?php echo $row_Recordset1['imgUSUARIO']; ?>                  <BR></td>
                 </tr>
                 <td>&nbsp;</td>
                 <td> <input type="submit" value="Enviar"></td>
                 </tr>
                 </table>
                 <input type="hidden" name="MM_update" value="form">
                 </form>
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
       	  <a href="index.html" class="foot-logo">BBI</a>&copy; 2012 &nbsp;|&nbsp; <a class="link2" href="index-6.html">Política de Privacidade</a>
          <div class="clear"></div>
            <div class="foot"><!-- {%FOOTER_LINK} --></div>
        </div>        
        </div>
    </footer>     

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($master);
?>
