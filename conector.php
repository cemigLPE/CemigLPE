<?php

define("SERVER", "10.20.2.191:3306");
define("USER", "phpPresenca");
define("PASS", "presenc@");
define("DB_NAME", "LISTA_PRESENCA");

$link = mysql_connect(SERVER, USER, PASS);


if($link) {
	if(mysql_select_db(DB_NAME, $link) === false){
		trigger_error("ERRO AO TENTAR ACESSAR BANCO DE DADOS", E_USER_ERROR);
	}
} else {
	trigger_error("ERRO AO TENTAR ACESSAR BANCO DE DADOS", E_USER_ERROR);
}
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER_SET utf8");

//IDENTIFICANDO SE O NAVEGADOR É INTERNET EXPLORER OU NÃO
$user_agent = $_SERVER['HTTP_USER_AGENT'];
 
if (preg_match('/MSIE/i', $user_agent)) {
$IE = 1;
} else {
$IE = 0;
}
		
?>