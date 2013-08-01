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

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM paginas INNER JOIN clientes ON paginas.cod_cliente = clientes.codCLIENTE";
//$query_Recordset1 = "SELECT * FROM paginas order by cod_cliente asc";
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
   font-size: 60%;
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
  <section id="content">
   <div class="pro_wrapper">
    <h5 class="main_h5">Exibe, edita ou remove páginas</h5>
  </div>
  <div class="pro_wrapper">
   <div id="areaa">
     <table width="916" border="1">
       <tr bgcolor="#666666">
         <td width="153"><strong>Cliente</strong></td>
         <td width="145"><strong>Nome</strong></td>
         <td width="400"><strong>URL</strong></td>
         <td width="92"><strong>Editar</strong></td>
         <td width="92"><strong>Remover</strong></td>
       </tr>
       <?php do { ?>
       <tr>
        <td><?php echo $row_Recordset1['nomeCLIENTE']; ?></td>
        <td><?php echo $row_Recordset1['nome_Pagina']; ?></td>
        <td><?php echo $row_Recordset1['url_Pagina']; ?></td>
        <td><a href="scripteditapaginas.php?cod=<?php echo $row_Recordset1['cod_pagina']; ?>">Editar</a></td>
        <td><a href="scriptremovepaginas.php?cod=<?php echo $row_Recordset1['cod_pagina']; ?>">Remover</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
  </div>
</div>
</section>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
