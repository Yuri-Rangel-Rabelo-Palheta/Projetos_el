<?php 
function conexao(){
if($_SERVER['SERVER_NAME']=="localhost"){
	$mysql_host = "localhost";
	$mysql_database = "espiritolivre1";
	$mysql_user = "el";
	$mysql_password = "menteespirito1";	
}
else{
	$mysql_host = "mysql7.000webhost.com";
	$mysql_database = "a2788468_el";
	$mysql_user = "a2788468_el";
	$mysql_password = "espiritolivre1";
}
$conexao = mysql_connect($mysql_host,$mysql_user,$mysql_password);
$db = mysql_select_db($mysql_database, $conexao);

}
function fim_conec(){
	mysql_free_result($res); 
	mysql_close ($conexao);	 
}
?>