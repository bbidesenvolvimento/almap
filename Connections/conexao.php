<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# https="true"
$hostname_conexao = "localhost";
$database_conexao = "almap";
$username_conexao = "bbi";
$password_conexao = "root";
$conexao = mysql_pconnect($hostname_conexao, $username_conexao, $password_conexao) or trigger_error(mysql_error(),E_USER_ERROR); 
?>