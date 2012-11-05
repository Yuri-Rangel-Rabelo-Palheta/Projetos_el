<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cadastro</title>
</head>

<body>
<?php include ("system/funcoes.php");

$acao= $_POST["acao"];

if ($acao == "cadastro") {
	
	$nome = $_POST["nome"];
	$endereco = $_POST["endereco"];
	$cep = $_POST["cep"];
	$cidade = $_POST["cidade"];
	$email = $_POST["email"];
	$estado = $_POST["estado"];
	$senha = $_POST["senha"];
	$codigo = geraCodigo();
	
	if(cadastro($nome,$endereco,$cep,$cidade,$estado,$email,$senha,$codigo)){
		echo "Cadastro enviado. Aguarde mais informações via email.";
		}
	else{
		echo "Falha no cadastro. Tente mais tarde.";
		}
	emailUser($nome,$email);
}
if ($acao == "mensagem"){
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mens = $_POST["mens"];
	
	emailContato($nome,$email,$mens);
	}
?>
</body>
</html>