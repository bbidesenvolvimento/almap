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

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM clientes";
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


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
  <section id="content"> 
    <div class="container_24 p42">  
     <div class="pro_wrapper">
      <h5 class="main_h5">Busca Páginas</h5>
    </div>
    <div class="pro_wrapper">
     <div id="areaa">
      
       <form name="form1" method="get" action="editapaginas2.php">
         <label for="cod_cliente">Cliente:</label>
         <select name="cod_cliente" id="cod_cliente">
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
        </select>
        <input type="submit" name="button" id="button" class="pro_btn" value="Buscar">
      </form>
    </div>
  </div>
</div>
</section>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
