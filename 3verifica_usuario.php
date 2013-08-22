<?php
session_start();  // Inicia a session
include "1con.php"; // INCLUI A CONEXAO

$usuario = $_POST['usuarioLOG'];// RECEBE O LOGIN DO FORM ANTERIOR
$senha = $_POST['senhaLOG'];// RECEBE A SENHA DO FORM ANTERIOR


if ((!$usuario) || (!$senha)){
	$usuario = "nao";
	$senha = "nao"; 
	//CASO O USUARIO NAO TENHA PREENCHIDO COLOCA O VALOR NAO PARA OS CAMPOS
	// ISTO IRA FAZER NAO LOGAR;

}else{

	switch ($usuario) {
		case 'admin':
		// Admin cliente backend
		$sql = mysql_query(
			"SELECT * FROM adm
			WHERE login_adm='{$usuario}'
			AND senha_adm='{$senha}'"
			);

		$login_check = mysql_num_rows($sql);
		if ($login_check > 0){
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );
				}
				$_SESSION['cod_adm'] = $cod_adm;
				$_SESSION['login_adm'] = $login_adm;
				header("Location: adm.php");
			}
		}else{
			header("Location: loginerro.php");
		}
		break;

		case 'almap':
		// Admin cliente front end
		$sql = mysql_query("SELECT * FROM adm WHERE login_adm='{$usuario}' AND senha_adm='{$senha}'");

		$login_check = mysql_num_rows($sql);

		if ($login_check > 0){
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );
				}
				$_SESSION['cod_adm'] = $cod_adm;
				$_SESSION['login_adm'] = $login_adm;
			}
			header("Location: areaClienteAlmap.php");
		}else{
			//erro 
			header("Location: loginerro.php");
		}
		break;

		case 'bbi':
		$sql = mysql_query(
			"SELECT * FROM adm
			WHERE login_adm='{$usuario}'
			AND senha_adm='{$senha}'"
			);

		$login_check = mysql_num_rows($sql);

		if ($login_check > 0){
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );
				}
				$_SESSION['cod_adm'] = $cod_adm;
				$_SESSION['login_adm'] = $login_adm;
				header("Location: adm.php");
			}
		}else{
			header("Location: loginerro.php");
		}
		break;

		default:
		// Usuarios padrao
		/*$sql = mysql_query("SELECT * FROM clientes WHERE loginCLIENTE='{$usuario}' AND senhaCliente='{$senha}'"); // sql para busca na tabela clientes

		$login_checkCliente = mysql_num_rows($sql); // variavel para checar o sql da tabela cliente

		if ($login_checkCliente > 0){// tem dados na consulta
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );// retira os valores
				}
				// DEFINE AS VARIAVEIS DE SESSAO
				$_SESSION['codCLIENTE'] = $codCLIENTE;
				$_SESSION['nomeCLIENTE'] = $nomeCLIENTE;
				$_SESSION['loginCLIENTE'] = $loginCLIENTE;
				$_SESSION['usuarioTABLEAU'] = $usuarioTABLEAU;
				$_SESSION['imgUSUARIO'] = $imgUSUARIO;
				$_SESSION['codMaster'] = $codMaster;
				$_SESSION['tipo'] = "cliente";
				
				// redireciona para a area do cliente
				header("Location: areaCliente.php");
			}
		}else{
			header("Location: loginerro.php");
		}*/
		$sqlMaster = mysql_query(
			"SELECT * FROM usuariomaster
			WHERE loginMaster='{$usuario}'
			AND senhaMaster='{$senha}'"
					); // sql para busca na tabela master

 	$login_checkMaster = mysql_num_rows($sqlMaster); // variavel para checar o sql da tabela master

	if ($login_checkMaster > 0){// tem dados na consulta
		while ($row = mysql_fetch_array($sqlMaster)){
			foreach ($row AS $key => $val){
				$$key = stripslashes( $val );// retira os valores
			}
			// DEFINE AS VARIAVEIS DE SESSAO
			$_SESSION['codCLIENTE'] = $codMaster;
			$_SESSION['nomeCLIENTE'] = $nomeMaster;
			$_SESSION['loginCLIENTE'] = $loginMaster;
			$_SESSION['usuarioTABLEAU'] = "varios";
			$_SESSION['imgUSUARIO'] = $imgMaster;
			$_SESSION['tipo'] = "master";
			$_SESSION['codMaster'] = $codMaster;
			// redireciona para a area do cliente master
			header("Location: areaClienteMaster.php?cod=".$codMaster);
			//echo ("Location: areaClienteMaster.php?cod=".$codMaster);
		}
	}else{ // nao tem o cliente na tabela master
		$sql = mysql_query(
			"SELECT * FROM clientes
			WHERE loginCLIENTE='{$usuario}'
			AND senhaCliente='{$senha}'"
					); // sql para busca na tabela clientes

		$login_checkCliente = mysql_num_rows($sql); // variavel para checar o sql da tabela cliente
		
		if ($login_checkCliente > 0){// tem dados na consulta
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );// retira os valores
				}
				// DEFINE AS VARIAVEIS DE SESSAO
				$_SESSION['codCLIENTE'] = $codCLIENTE;
				$_SESSION['nomeCLIENTE'] = $nomeCLIENTE;
				$_SESSION['loginCLIENTE'] = $loginCLIENTE;
				$_SESSION['usuarioTABLEAU'] = $usuarioTABLEAU;
				$_SESSION['imgUSUARIO'] = $imgUSUARIO;
				$_SESSION['codMaster'] = $codMaster;
				$_SESSION['tipo'] = "cliente";
				
				// redireciona para a area do cliente
				header("Location: areaCliente.php");
			}
		}else{
			header("Location: loginerro.php");
		}
	}
		break;
	}
}

	/*if($usuario == "admin"){
		// Admin cliente
		$sql = mysql_query(
			"SELECT * FROM adm
			WHERE login_adm='{$usuario}'
			AND senha_adm='{$senha}'"
			);

		$login_check = mysql_num_rows($sql);
		if ($login_check > 0){
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );
				}
				$_SESSION['cod_adm'] = $cod_adm;
				$_SESSION['login_adm'] = $login_adm;
			header("Location: adm.php");
			}
		}else{
			header("Location: login.php");
		}
	}*/
/*
	if($usuario == "almap"){
		$sql = mysql_query("SELECT * FROM adm WHERE login_adm='{$usuario}' AND senha_adm='{$senha}'");

		$login_check = mysql_num_rows($sql);

		if ($login_check > 0){
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );
				}
				$_SESSION['cod_adm'] = $cod_adm;
				$_SESSION['login_adm'] = $login_adm;
			}
			header("Location: areaClienteAlmap.php");
		}else{
			//erro 
			header("Location: loginerro.php");
		}
	}*/

/*

	else{

		$sqlMaster = mysql_query(
			"SELECT * FROM usuariomaster
			WHERE loginMaster='{$usuario}'
			AND senhaMaster='{$senha}'"
					); // sql para busca na tabela master

 	$login_checkMaster = mysql_num_rows($sqlMaster); // variavel para checar o sql da tabela master

	if ($login_checkMaster > 0){// tem dados na consulta
		while ($row = mysql_fetch_array($sqlMaster)){
			foreach ($row AS $key => $val){
				$$key = stripslashes( $val );// retira os valores
			}
			// DEFINE AS VARIAVEIS DE SESSAO
			$_SESSION['codCLIENTE'] = $codMaster;
			$_SESSION['nomeCLIENTE'] = $nomeMaster;
			$_SESSION['loginCLIENTE'] = $loginMaster;
			$_SESSION['usuarioTABLEAU'] = "varios";
			$_SESSION['imgUSUARIO'] = $imgMaster;
			$_SESSION['tipo'] = "master";
			$_SESSION['codMaster'] = $codMaster;
			// redireciona para a area do cliente master
			header("Location: areaClienteMaster.php?cod=".$codMaster);
			//echo ("Location: areaClienteMaster.php?cod=".$codMaster);
		}
	}else{ // nao tem o cliente na tabela master
		$sql = mysql_query(
			"SELECT * FROM clientes
			WHERE loginCLIENTE='{$usuario}'
			AND senhaCliente='{$senha}'"
					); // sql para busca na tabela clientes

		$login_checkCliente = mysql_num_rows($sql); // variavel para checar o sql da tabela cliente
		
		if ($login_checkCliente > 0){// tem dados na consulta
			while ($row = mysql_fetch_array($sql)){
				foreach ($row AS $key => $val){
					$$key = stripslashes( $val );// retira os valores
				}
				// DEFINE AS VARIAVEIS DE SESSAO
				$_SESSION['codCLIENTE'] = $codCLIENTE;
				$_SESSION['nomeCLIENTE'] = $nomeCLIENTE;
				$_SESSION['loginCLIENTE'] = $loginCLIENTE;
				$_SESSION['usuarioTABLEAU'] = $usuarioTABLEAU;
				$_SESSION['imgUSUARIO'] = $imgUSUARIO;
				$_SESSION['codMaster'] = $codMaster;
				$_SESSION['tipo'] = "cliente";
				
				// redireciona para a area do cliente
				header("Location: areaCliente.php");
				//echo("Location: areaCliente.php");
			}
		}else{
			
			
			// nao tem o cliente na tabela cliente
			$sqlSimples = mysql_query(
				"SELECT * FROM usuariosimples
				WHERE loginUsuarioSP='{$usuario}'
				AND senhaUsuarioSP='{$senha}'"
					); // sql para busca na tabela clientes
			
			$login_checkSimples = mysql_num_rows($sqlSimples); // variavel para checar o sql da tabela cliente
			if ($login_checkSimples > 0){// tem dados na consulta
				while ($row = mysql_fetch_array($sqlSimples)){
					foreach ($row AS $key => $val){
						$$key = stripslashes( $val );// retira os valores
					}
					// DEFINE AS VARIAVEIS DE SESSAO
					$_SESSION['codCLIENTE'] = $codCLIENTE;
					$_SESSION['nomeCLIENTE'] = $nomeCLIENTE;
					$_SESSION['loginCLIENTE'] = $loginUsuarioSP;
					$_SESSION['usuarioTABLEAU'] = $usuarioTABLEAU;
					$_SESSION['imgUSUARIO'] = $imgUSUARIO;
					$_SESSION['tipo'] = "cliente";
					$_SESSION['codSimples'] = $codSimples;
					$_SESSION['codMaster'] = $codMaster;
					header("Location: areaCliente.php");
					//echo ("Location: areaCliente.php");
				}
			}
		}
	}
}
}
*/ 	