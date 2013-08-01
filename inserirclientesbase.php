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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formularioInserir")) {
  $insertSQL = sprintf("INSERT INTO clientes (nomeCLIENTE, loginCLIENTE, senhaCLIENTE, usuarioTABLEAU, imgUSUARIO) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cliente'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['usuarioTB'], "text"),
                       GetSQLValueString($_POST['imgUsuario'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "ver_clientes.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<form id="formularioInserir" name="formularioInserir" method="POST" action="<?php echo $editFormAction; ?>">
  <p>Nome do Cliente
    <label for="cliente"></label>
    <input type="text" name="cliente" id="cliente" />
  </p>
  <p>Login BBI:
    <label for="login"></label>
    <input type="text" name="login" id="login" />
  </p>
  <p>Senha BBI:
    <label for="senha"></label>
    <input type="text" name="senha" id="senha" />
  </p>
  <p>usuario Tableau:
    <label for="usuarioTB"></label>
    <input type="text" name="usuarioTB" id="usuarioTB" />
  </p>
  <p>imgUsuario 
    <label for="imgUsuario"></label>
    <input type="text" name="imgUsuario" id="imgUsuario" />
  </p>
  <p>
    <input type="submit" name="enviar" id="enviar" value="Enviar" />
  </p>
  <input type="hidden" name="MM_insert" value="formularioInserir" />
</form>
</body>
</html>