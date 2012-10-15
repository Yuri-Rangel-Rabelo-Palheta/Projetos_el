<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exclui cadastro</title>
</head>
<?php
	session_start();
	include("../func_espirito.php");
	conec_inicio();
	
//recupera o id enviado
	$id = $_GET["id"];
	$_SESSION["id"]=$id;
//seleciona o aluno como o id	
	$sql1 = "DELETE FROM pessoal WHERE pessoal.ID_pessoal = '".$id."'";
	$rs1 = mysql_query($sql1);
//executa	
	print "<meta HTTP-EQUIV='Refresh'CONTENT='0;URL=index.php'>";
?>
<body>
</body>
</html>