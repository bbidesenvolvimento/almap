<?php
 
define('BD_USER', 'fabricio');
define('BD_PASS', 'fabricio');
define('BD_NAME', 'bb');
 
mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);
 
?>