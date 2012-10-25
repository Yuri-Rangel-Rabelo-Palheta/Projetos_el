<?php
include("conexao.php");

function get_estados(){
	conexao();
	$sql = "SELECT cod_estados, sigla
				FROM estados
				ORDER BY sigla";
		$res = mysql_query( $sql );
		while ( $row = mysql_fetch_assoc( $res ) ) {
			echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
		}
	fim_conec();
	
	}

function cadastro($nome,$cpf,$cidade,$estado,$email,$senha, $codigo){
	conexao();
	$sql = "INSERT INTO usuarios(nome,cpf,cidade,estado,email,senha,codigo,admin) VALUES  ('".$nome."','".$cpf."','".$cidade."','".$estado."','".$email."','".$senha."','".$codigo."','0'";
	if($res = mysql_query( $sql )){
		return TRUE;
		}
	else{
		return FALSE;
		}
	}



function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
// Caracteres de cada tipo
$lmin = 'abcdefghijklmnopqrstuvwxyz';
$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$num = '1234567890';
$simb = '!@#$%*-';

// Variáveis internas
$retorno = '';
$caracteres = '';

// Agrupamos todos os caracteres que poderão ser utilizados
$caracteres .= $lmin;
if ($maiusculas) $caracteres .= $lmai;
if ($numeros) $caracteres .= $num;
if ($simbolos) $caracteres .= $simb;

// Calculamos o total de caracteres possíveis
$len = strlen($caracteres);

for ($n = 1; $n <= $tamanho; $n++) {
// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
$rand = mt_rand(1, $len);
// Concatenamos um dos caracteres na variável $retorno
$retorno .= $caracteres[$rand-1];
}

return $retorno;
}

function geraCodigo(){
	$gerado= TRUE;
	$codigo=NULL;
	conexao();
	while($gerado){
		$codigo= geraSenha();
		$sql = "SELECT * FROM usuarios WHERE codigo ='".$codigo."' ";
		$res = mysql_query($sql);
		$num = mysql_num_rows($res);
		if($num == 0){
			$gerado=FALSE;
			}
		}
	return $codigo;
	}

?>