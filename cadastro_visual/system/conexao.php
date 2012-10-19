<?php 
function conexao(){
$mysql_host = "mysql7.000webhost.com";
$mysql_database = "a2788468_el";
$mysql_user = "a2788468_el";
$mysql_password = "espiritolivre1";

$conexao = mysql_connect("$mysql_host","a2788468_el","espiritolivre1");
$db = mysql_select_db("a2788468_el", $conexao);

}
function fim_conec(){
	mysql_free_result($res); 
	mysql_close ($conexao);	 
}
?>