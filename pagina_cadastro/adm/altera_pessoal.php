<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar cadastro</title>
</head>
<?php 
//conecta-se
	session_start();
	include("../func_espirito.php");
	conec_inicio();
	//$conaxao = mysql_connect("localhost","375149","acad01");
	//$bd = mysql_select_db("375149",$conaxao);
//recupera o id enviado
	$id = $_GET["id"];
	$_SESSION["id"]=$id;
//seleciona o aluno como o id	
	$sql1 = "SELECT * FROM pessoal WHERE pessoal.ID_pessoal = '".$id."'";
	$rs1 = mysql_query($sql1);
//executa	
	$dp = mysql_fetch_array($rs1);
	$nome=$dp["Nome"];
	
	
		
?>
<body>
<form name="form1" method="post" action="salva_dados_pessoal.php">
<div id="caixa_cad">
<h1>Dados Pessoal</h1>

<p><label>Nome:</label><input name="nome" type="text" class="caixa_texto" size="40" maxlength="200"  value="<?php print $nome; ?>" /></p>
<p><label>Telefone:</label><input name="telefone" type="text" class="caixa_texto" size="40" maxlength="200"  value="<?php print $dp["Fone"]; ?>" /></p>
<p><label>Email:</label><input name="email" type="text" class="caixa_texto" size="40" maxlength="200"  value="<?php print $dp["Email"]; ?>" /></p>
<p><input type="image" name="imageField" src="imagens/btn_inserir.gif" /></p>
	
</div>
</form>
</body>
</html>