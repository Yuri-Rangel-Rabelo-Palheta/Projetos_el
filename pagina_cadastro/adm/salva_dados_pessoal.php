<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	include "../func_espirito.php";
	conec_inicio(); 
	//entre com os novos dados do aluno	
	$dp["Nome"]=$_POST["nome"];
	$dp["Fone"]=$_POST["telefone"];
	$dp["Email"]=$_POST["email"];
	
	//print $_SESSION["id"];
	
	
	$sql2 = "UPDATE pessoal SET Nome='".$dp["Nome"]."',Fone='".$dp["Fone"]."', Email='".$dp["Email"]."' WHERE idaluno = '".$_SESSION["id"]."'";
	
	$rs1 = mysql_query($sql2);
print "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";

?>
</body>
</html>