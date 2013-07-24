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
$query_Recordset1 = "SELECT * FROM usuariomaster";
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

 #Wrapper {
  width: 70%;
  margin-right: auto;
  margin-left: auto;
  margin-top: 50px;
  background: #EEEEEE;
  padding: 20px;
  border: 1px solid #E6E6E6;
}

#progressbox {
  border: 1px solid #0099CC;
  padding: 1px;
  position:relative;
  width:400px;
  border-radius: 3px;
  margin: 10px;
  display:none;
  text-align:left;
}
#progressbar {
  height:20px;
  border-radius: 3px;
  background-color: #003333;
  width:1%;
}
#statustxt {
  top:3px;
  left:50%;
  position:absolute;
  display:inline-block;
  color: #000000;
}
 </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.form.js"></script>
    

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

  <script>/*
 $(document).ready(function() { 
    //elements
    var progressbox   = $('#progressbox');
    var progressbar   = $('#progressbar');
    var statustxt     = $('#statustxt');
    var submitbutton  = $("#SubmitButton");
    var myform      = $("#novoCliente");
    var output      = $("#output");
    var completed     = '0%';
    
        $(myform).ajaxForm({
          beforeSend: function() { //brfore sending form
            submitbutton.attr('disabled', ''); // disable upload button
            statustxt.empty();
            progressbox.show(); //show progressbar
            progressbar.width(completed); //initial value 0% of progressbar
            statustxt.html(completed); //set status text
            statustxt.css('color','#000'); //initial color of status text
          },
          uploadProgress: function(event, position, total, percentComplete) { //on progress
            progressbar.width(percentComplete + '%') //update progressbar percent complete
            statustxt.html(percentComplete + '%'); //update status text
            if(percentComplete>50)
              {
                statustxt.css('color','#fff'); //change status text to white after 50%
              }
            },
          complete: function(response) { // on complete
            $( this ).dialog( "Sucesso" );
            output.html(response.responseText); //update element with received data
            myform.resetForm();  // reset form
            submitbutton.removeAttr('disabled'); //enable submit button
            progressbox.hide(); // hide progressbar
          }
      });
        }); */
  </script>

</head>
<body id="page4">
	<!--==============================content================================-->    
  <section id="content"> 

      <h5 class="main_h5">Cadastro de clientes comum </h5>

      <div id="areaa">
       <form id="novoCliente" action="scriptcadastracliente.php" method="POST" enctype="multipart/form-data">
         <table width="827">
           <tr>
             <td>Nome do Cliente:</td>
             <td><input name="cliente" type="text" id="cliente" size="50" /></td>
           </tr>
           <tr>
             <td>Login BBI:</td>
             <td><input name="login" type="text" id="login" size="50" /></td>
           </tr>
           <tr>
             <td>Senha BBI:</td>
             <td> <input name="senha" type="text" id="senha" size="50" /></td>
           </tr>
           <tr>
             <td>Usuário Tableau:</td>
             <td><input name="usuarioTB" type="text" id="usuarioTB" size="50" /></td>
           </tr>
           <tr>
             <td>Usuário Master:</td>
             <td><select name="usuarioMaster" id="usuarioMaster">
                <option value="0">Nenhum</option>
               <?php
               do {  
                ?>
                <option value="<?php echo $row_Recordset1['codMaster']?>"><?php echo $row_Recordset1['nomeMaster']?></option>
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
           <td>Imagem Usuario</td>
           <td> <input name="arquivo" type="file" size="50"><BR>
         </tr>
         <td>&nbsp;</td>
         <td> <input type="submit" id="SubmitButton" class="pro_btn pro_submit" value="Salvar"></td>
   </form>
       </tr>
     </table>


</div>
</div>
<div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
<div id="output"></div>
</section>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
