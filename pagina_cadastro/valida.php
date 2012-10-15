<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

$_SG['servidor'] = 'localhost';
$_SG['usuario'] = 'root';
$_SG['senha'] = '';
$_SG['banco'] = 'espiritolivre';

//verifica se houve post ou se alguns dos campos do login foi deixado vazio
if(!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))){
	echo "<script language='javascript'>alert('Preencha todos os campos.'); window.location.href = 'index.php'</script>";
	exit;
	}

	
//tentiva de conexão ao banco e a tabela de usuarios
$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");

mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

// Usa a função addslashes para escapar as aspas
$nusuario = addslashes($usuario);
$nsenha = addslashes($senha);
//print $usuario;
//Validando os dados e conferindo se está ativo
$sql = "SELECT * FROM `adm` WHERE (`login` = '".$nusuario."') AND (`senha` = '".$nsenha."')";// AND ( `ativo` = 1) LIMIT 1";
$query = mysql_query($sql);

if(mysql_num_rows($query) != 1){
	echo "<script language='javascript'>alert('Login Inválido.'); window.location.href = 'index.php'</script>";
	exit;
	
	}
	else{
			
		header("Location: ./adm/");
		exit;		
		
	}

?>
</body>
</html>