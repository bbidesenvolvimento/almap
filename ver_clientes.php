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
$query_clientesLista = "SELECT * FROM clientes";
$clientesLista = mysql_query($query_clientesLista, $conexao) or die(mysql_error());
$row_clientesLista = mysql_fetch_assoc($clientesLista);
$totalRows_clientesLista = mysql_num_rows($clientesLista);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table width="71%" border="1">
  <tr>
    <td width="14%">Cod</td>
    <td width="20%">Usuario</td>
    <td width="18%">Login</td>
    <td width="13%">Senha</td>
    <td width="13%">Usuario Tableu</td>
    <td width="6%">IMG</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_clientesLista['codCLIENTE']; ?></td>
      <td><?php echo $row_clientesLista['nomeCLIENTE']; ?></td>
      <td><?php echo $row_clientesLista['loginCLIENTE']; ?></td>
      <td><?php echo $row_clientesLista['senhaCLIENTE']; ?></td>
      <td><?php echo $row_clientesLista['usuarioTABLEAU']; ?></td>
      <td><?php echo $row_clientesLista['imgUSUARIO']; ?></td>
    </tr>
    <?php } while ($row_clientesLista = mysql_fetch_assoc($clientesLista)); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($clientesLista);
?>
