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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<form action="scriptcadastrapagina.php" method="POST" enctype="multipart/form-data" name="cad" id="cad">
  <p>Cliente 
    <label for="cliente"></label>
    <select name="cliente" id="cliente" title="<?php echo $row_Recordset1['codCLIENTE']; ?>">
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
  </p>
  <p>Nome do Serviço 
    <label for="nome"></label>
    <input type="text" name="nome" id="nome" />
  </p>
  <p>URL gerada pelo Tableau 
    <label for="url"></label>
    <input type="text" name="url" id="url" /> 
    * no estilo: views/Dental_0/Servios
  </p>
  <p>Legenda da pagina 
    <label for="legenda"></label>
    <input type="text" name="legenda" id="legenda" />
  </p>
  <p>imgUsuario 
    <label for="imgUsuario"></label>
 <input name="arquivo" type="file"><BR>
  <p>
    <input type="submit" name="bb" id="bb" value="Enviar" />
  </p>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
