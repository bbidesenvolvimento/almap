<?php
 
session_start();  // Inicia a session
 
include "1con.php";
 
$usuario = $_POST['usuarioLOG'];
$senha = $_POST['senhaLOG'];
 
if ((!$usuario) || (!$senha)){
$usuario = "nao";
$senha = "nao"; 
    //echo "Por favor, todos campos devem ser preenchidos! <br /><br />";
 
 
}else{
 
    
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
            
            
 
            header("Location: adm.php");
 
        }
 
    }else{
 
                 header("Location: loginadm.php");
 
    }
 
}
 
?>