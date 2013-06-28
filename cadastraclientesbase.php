<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<form action="scriptcadastracliente.php" method="POST" enctype="multipart/form-data">
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
 <input name="arquivo" type="file"><BR>

<input type="submit" value="Enviar">
</form>
</body>
</html>