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

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM clientes";
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
        <h5 class="main_h5"><a href="adm.php">Administração:</a>&emsp;Cadastro de páginas Tableau: </h5>
        </div>
              <div class="pro_wrapper">
                 <div id="areaa">
                 <form action="scriptcadastrapagina.php" method="POST" enctype="multipart/form-data" name="cad" id="cad">
                 <table width="827">
                 <tr>
                 <td>Nome do Cliente:</td>
                 <td><select name="cliente" id="cliente" title="<?php echo $row_Recordset1['codCLIENTE']; ?>">
      <?php
do {  
?>
      <option value="<?php echo $row_Recordset1['codCLIENTE']?>"><?php echo $row_Recordset1['nomeCLIENTE']?></option>
      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
    </select></td>
                 </tr>
                 <tr>
                 <td>Nome do Serviço:</td>
                 <td> <input name="nome" type="text" id="nome" size="50" /></td>
                 </tr>
                 <tr>
                 <td>URL gerada pelo Tableau:</td>
                 <td><input name="url" type="text" id="url" size="50" /> 
                   <br>
                   * no estilo: views/Dental_0/Servios </td>
                 </tr>
                 <tr>
                 <td>Legenda da página:</td>
                 <td><input name="legenda" type="text" id="legenda" size="50" /></td>
                 </tr>
                 <tr>
                 <td>Imagem do Serviço:</td>
                 <td> <input name="arquivo" type="file" size="50"><BR></td>
                 </tr>
                 <td>&nbsp;</td>
                 <td> <input type="submit" value="Enviar" name="bb" id="bb"> </td>
                 </tr>
                 </table>
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
       	  BBI &copy; 2012 &nbsp;|&nbsp; <a class="link2" href="politica_privacidade.html">Política de Privacidade</a>
          <div class="clear"></div>
            <div class="foot"><!-- {%FOOTER_LINK} --></div>
        </div>        
        </div>
    </footer>   

</body>
</html>