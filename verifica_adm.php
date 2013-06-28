<?php  
    
 function verifica(){  
    
     if (!isset($_SESSION['cod_adm'])){  
    		header ("Location:index.php");  
         exit();   
    
    }  
    
}  
    
?>  