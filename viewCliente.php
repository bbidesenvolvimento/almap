<?php require_once('Connections/conexao.php'); ?>
<?php

session_start();  // Inicia a session

if (!isset($_SESSION['codCLIENTE'])) {

	// Destrói a sessão por segurança

	session_destroy();

	// Redireciona o visitante de volta pro login

	header("Location: login.php"); exit;

}

include 'tableau_trusted.php';

$url = $_GET['url'];
$codPagina=$_GET['cp'];
$cc=$_GET['cc'];

if($cc!= $_SESSION['codCLIENTE'] && $_SESSION['tipo'] == "cliente"){
	header("Location: login.php");
}

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
if (isset($_GET['cp'])) {
	$colname_Recordset1 = $_GET['cp'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM comentarios WHERE codPagina = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);$colname_Recordset1 = "-1";
if (isset($_GET['cp'])) {
	$colname_Recordset1 = $_GET['cp'];
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM comentarios WHERE codPagina = %s ORDER BY dataComentario DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);



function formata_data_extenso($strDate)
{
// Array com os dia da semana em português;
	$arrDaysOfWeek = array('Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado');
// Array com os meses do ano em português;
	$arrMonthsOfYear = array(1 => 'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
// Descobre o dia da semana
	$intDayOfWeek = date('w',strtotime($strDate));
// Descobre o dia do mês
	$intDayOfMonth = date('d',strtotime($strDate));
// Descobre o mês
	$intMonthOfYear = date('n',strtotime($strDate));
// Descobre o ano
	$intYear = date('Y',strtotime($strDate));
//Retorna também a hora (Adicionado por Rafael (ebalaio.com)
	$intHour = substr($strDate,10,20);
// Formato a ser retornado
	return $intDayOfMonth . ' de ' . $arrMonthsOfYear[$intMonthOfYear] . ' de ' . $intYear . ' às '.$intHour;
}





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<style>
	#total
	{
		width: 1050px;
		margin:0 auto;
		text-align:left;
		font-family: "Century Gothic";
		color: #3c2725;
	}

	#total #topo {
		clear: both;
		height: 60px;
		position: absolute;
	}

	#total #rodape {
		clear: both;
		height: 30px;
		text-align: center;
	}

	#total #conteudo {
		clear: both;
		height: 850px; 
	}

	#total #topo #img {
		float: right;
		height: 100px;
		width: 930px;
	}

	#img img{
		float: right;
		width: 150px;
height: auto;
	}

	#total #topo #log {
		float: right;
		height: 100px;
		width: 60px;
	}

	#total #topo #volt {
		float: right;
		height: 120px;
		width: 60px;

	}

	a.logoffbtn {
		display: block;
		text-align: center;
		text-decoration: none;
		width: 50px;
		background-image: url(../images/icons/Logoff.png);
		margin: auto;
		height: 100px;
		background-repeat: no-repeat;
		background-position: center center;
	}

	a.logoffbtn:hover {
		background-image: url(../images/icons/Logoffh.png);
		background-repeat: no-repeat;
		background-position: center center;
	}

	a.voltarbtn {
		display: none;
		text-align: center;
		text-decoration: none;
/*		background-image: url(images/tambor.png);*/
		background-size: 94px 144px;
		margin: auto;
		background-repeat: no-repeat;
		background-position: center center;
		position: absolute;
		top: 45px;
		width: 94px;
		height: 144px;
		float: right;
		background-color: #fff;
		left: 430px;
	}



	a.voltarbtn:hover {

	/*background-image: url(images/icons/painelh.png);
	background-repeat: no-repeat;
	background-position: center center;*/

}

/* SlideDown */
.pro_slide-down-box{ position:relative; z-index:101;}
.pro_slide-down-box dt{
	display:block;
	border: 1px solid #DDD;
	border-radius: 3px;
	text-shadow: 0 1px 1px white;
	box-shadow:0 1px 1px #fff;
	padding: 6px 10px;
	white-space: nowrap;
	vertical-align: middle;
	background: transparent;
	cursor: pointer;
	border-color: #ddd;
	background:#E0E0E0;
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlMGUwZTAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	filter:none;
	background: -webkit-linear-gradient(top, white, #E0E0E0);
	background:    -moz-linear-gradient(top, white, #E0E0E0);
	background:     -ms-linear-gradient(top, white, #E0E0E0);
	background:      -o-linear-gradient(top, white, #E0E0E0);
	background:      linear-gradient(top, white, #E0E0E0);
	-pie-background:      linear-gradient(top, white, #E0E0E0);
	box-shadow:         0 1px 2px rgba(0,0,0,0.25), inset 0 0 3px #fff;
}
.pro_slide-down-box dt:hover{box-shadow:inset 0 0 3px #fff;border-color: #999; text-decoration:none;}
.pro_slide-down-box dt.active{
	border: 1px solid #AAA;
	border-bottom-color: #CCC;
	border-top-color: #999;
	box-shadow:inset 0 1px 2px #aaa;
	background:#E6E6E6;
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2U2ZTZlNiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNkY2RjZGMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	filter:none;
	background: -webkit-linear-gradient(top, #E6E6E6, gainsboro);
	background:    -moz-linear-gradient(top, #E6E6E6, gainsboro);
	background:     -ms-linear-gradient(top, #E6E6E6, gainsboro);
	background:      -o-linear-gradient(top, #E6E6E6, gainsboro);
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2U2ZTZlNiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNkY2RjZGMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	filter:none;}
	.pro_slide-down-box dt span{
		display:inline-block;
		width:11px;
		height:11px;
		background: url(../images/pro_images/misc-plus.png) 0 0 no-repeat;
		margin:2px 6px 0 0;
	}
	.pro_slide-down-box dt.active span{background: url(../images/pro_images/misc-minus.png) 0 0 no-repeat;}
	.pro_slide-down-box dd{display:none;padding:15px 15px; margin:3px 0 0 0; background:#fff; border-radius:5px; position:relative;box-shadow:inset 0 1px 1px rgba(170,170,170,.8);
		border: 1px solid #AAA;
		border-bottom-color: #CCC;
		border-top-color: #999;}
		.pro_slide-down-box.absol dd{ position:absolute; top:27px; left:0; z-index:99;width:auto;}
		.pro_slide-down-pad{ padding:5px 0;}

		.button1 {
			color:#FFFFFF;
			font-family:Arial, Helvetica, sans-serif;
			text-transform:uppercase;
			font-size:12px;
			font-weight:bold;
			display:inline-block;
			padding: 9px 15px 8px;
			line-height:15px;
			box-shadow: 0 2px 3px #B9B8B7;
			-webkit-box-shadow:0 2px 3px #B9B8B7;
			border-radius:3px;
			-webkit-border-radius:3px;
			background-color: #3c2725;
			background-repeat: repeat-x;
			background-position: 0 0;
		}

		.button1:hover {
			text-decoration:none;
			background:#e7654a;
			color: #FFF;
		}


		#total #conteudo iframe {
			font-family: "Myriad Web Pro", "Century Gothic";
			border-radius:5px;
			background:#fff;
			box-shadow:0 1px 4px rgba(0, 0, 0, 0.3);
			height: 850px;
			width: 1050px;
			padding: 25px;
		}
		#total #comentarios mm_hiddenregion .pro_slide-down-box dt h5 {
			font-weight: normal;
		}
		#destak {
			font-size: 115%;
			font-weight: bolder;
			color: #e7654a;
			display: inline;
		}
		#total #comentarios h3 {
			font-size: 120%;
			font-weight: bolder;
		}
		#total #comentarios #areaa {
			margin-top: 50px;
		}

		a.seguro {
			font-family: "Century Gothic";
			font-size: 11px;
			line-height: 20px;
			font-weight: bold;
			text-transform: uppercase;
			color: #e7654a;
			margin-bottom: 15px;
			text-align: center;
			text-decoration: none;
		}


		#comenta {
			text-align: right;
			margin-right: 5px;
			display: inline;
			margin-left: 400px;
			cursor: url(images/icons/close1.png), auto;
		}



		#total .seal {
		}

		textarea {

			font-size: 100%;
			font: inherit;
			vertical-align: baseline;
			resize:none;
		}

		</style>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Information to Empower People</title>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href="/images/icons/favicon.ico" rel="icon" type="image/x-icon" />
		
<link rel="stylesheet" href="js/ui/jquery-ui.css" />
   <script src="js/ui/jquery-1.9.1.js"></script>
   <script src="js/ui/jquery-ui.js"></script> 
   <link rel="stylesheet" href="css/style.css">

		<script type="text/javascript">


/*
		var _gaq = _gaq || [];

		_gaq.push(['_setAccount', 'UA-32185514-1']);

		_gaq.push(['_trackPageview']);



		(function() {

			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

		})();
*/


		</script>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/script.js"></script>

	</head>



	<body>



		<div id="topo">
			<a class="voltarbtn" href="areaClienteMaster.php?cod=<?php echo $UserTableau ?>">&nbsp;</a>
			<a class="logo" href="areaCliente.php" style="position:static !important">BBI</a>
			<a style="float: right;margin-top: -45px;clear: both;margin-right: 6px;" href="areaCliente.php" class="pro_btn">Voltar</a>
		</div>
		<div id="total">

			<div id="conteudo">
				<iframe align="middle" src="<?php echo get_trusted_url($_SESSION['usuarioTABLEAU'],'srv.bbi.net.br',$url)?>"></iframe>
			</br>
			<a style="float:right" href="destroisessao.php" class="pro_btn"><span></span>Logoff</a>
			</div>

			<div id="comentarios">
				<h3><br />
					<br /><br />

					Área de Comentários 

					<br />
					<br />
				</h3>
				<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
				<?php do { ?>
				<dl class="pro_slide-down-box">
					<dt><h5><span></span> Comentário postado por <div id="destak"><?php echo $row_Recordset1['nomeCliente']; ?></div> em <div id="destak"><?php echo formata_data_extenso($row_Recordset1['dataComentario']); ?></div>
						<?php 
						if($row_Recordset1['codCliente'] == $_SESSION['codCLIENTE']){


							?>
							<!-- Esta parte e dedicada a remover o comentario do proprio cliente -->
							<a href="removecomentario.php?codComentario=<?php echo $row_Recordset1['codComentario']; ?>&cp=<?php echo $codPagina; ?>&url=<?php echo $url ?>&cc=<?php echo $row_Recordset1['codCliente']; ?>" >

								<div id="comenta">Excluir</div></a>

								<?php } ?>
							</h5></dt> 
							<dd><p><?php echo $row_Recordset1['texto']; ?></p></dd>
						</dl>

						<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
						<?php } // Show if recordset not empty ?>

						<div id="areaa">
							<table width="100%">
								<form action="scriptcadastraform.php" method="POST" enctype="multipart/form-data">
									<tr>
										<td width="17%" valign="top"><strong>Postar Comentário:</strong></td>
										<td width="83%">
											<textarea name="comentario" cols="100%" rows="5" id="comentario" style="font-family:'Century Gothic'" dir="ltr" lang="pt" onfocus="if (this.value == 'Digite aqui seu comentário') {this.value=''}" onblur="if(this.value == '') { this.value='Digite aqui seu comentário'}" spellcheck="true" value="Digite aqui seu comentário">Digite aqui seu comentário</textarea>
											<input type="hidden" id="url" name="url" value="<?php echo $url ?>">
											<input type="hidden" id="cp" name="cp" value="<?php 
											echo $codPagina;
											?>">
											<input type="hidden" id="cc" name="cc" value="<?php echo $_SESSION['codCLIENTE']; ?>">
											<input type="hidden" id="nc" name="nc" value="<?php echo $_SESSION['nomeCLIENTE']; ?>">


										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="submit" class="button1" value="Enviar"></td>
									</tr>
								</form>
							</table>
						</div>






					</div>

					<div id="rodape">&nbsp;<br />
						<br />
					</div>


				</div>
			</body>

			</html>
			<?php
			mysql_free_result($Recordset1);
			?>
