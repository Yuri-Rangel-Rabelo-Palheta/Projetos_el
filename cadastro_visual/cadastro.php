<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cadastro</title>
</head>

<body>
<?php include ("../func_espirito.php");
conec_inicio();

$acao= $_GET["acao"];

if ($acao == "cadastro") {
	
	$nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	
	//print $nome;
	$sql_verif = mysql_query("SELECT * FROM pessoal WHERE Nome = '".$nome."' "); 
        if (mysql_num_rows($sql_verif) == 1) { 
            echo "<script language='javascript'>alert('Não foi possivel realizar o cadastro no momento pois o usuario ja existe')</script>"; //se sim mostra mensagem 
			exit;
        }
	if(inserir_cadastro($nome, $telefone, $email, $endereco)){
		echo "<script language='javascript'>alert('Cadastro efetuado com sucesso')</script>";
	}
	else{
		echo "<script language='javascript'>alert('Não foi possivel realizar o cadastro no momento')</script>";
	}
}

?>
</body>
</html>