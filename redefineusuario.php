<?php

 

session_start();  // Inicia a session

 

include "1con.php";

 

$username = $_POST['username'];

$senhaantiga = $_POST['senhaantiga'];

$senhanova = $_POST['senhanova'];

 

if ((!$username) || (!$senhaantiga)){

$username = "nao";

$senhaantiga = "nao"; 



    //echo "Por favor, todos campos devem ser preenchidos! <br /><br />";

 

 

}else{

 

    

    $sql = mysql_query(

 

                 "SELECT * FROM usuariosimples

                 WHERE loginUsuarioSP='{$username}'

                 AND senhaUsuarioSP='{$senhaantiga}'"

 

                 );

 

    $login_check = mysql_num_rows($sql);

 

    if ($login_check > 0){

 

        while ($row = mysql_fetch_array($sql)){

 

            foreach ($row AS $key => $val){

 

                $$key = stripslashes( $val );

 

            }

 

           //logou ok

		   

		   mysql_query("UPDATE usuariosimples SET senhaUsuarioSP='{$senhanova}'

WHERE loginUsuarioSP='{$username}'");

 

            

 

            header("Location: sucesso.php");

 

        }

 

    }else{

 

                 header("Location: errocadastro.php");

 

    }

 

}

 

?>