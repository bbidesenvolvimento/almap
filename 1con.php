<?php
 
define('BD_USER', 'root');
define('BD_PASS', 'root');
define('BD_NAME', 'almap');
 
mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);
 
?>