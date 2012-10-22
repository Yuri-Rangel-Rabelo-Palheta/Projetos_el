<?php 
//funcoes

//ligacao com o banco de dados
//inicia conexao
function conec_inicio(){
	$conexao = mysql_connect("localhost","root","");
	$db = mysql_select_db("espiritolivre", $conexao);
}
//termina conexao
function conec_fim(){
	mysql_free_result($rs); 
	mysql_close ($conexao);	 
}


//cadastro pessoal
function inserir_cadastro($nome, $telefone, $email, $endereco){
	//conec_inicio();
	$sql="INSERT INTO pessoal (ID_pessoal,Nome,Fone,Email) VALUES ('','".$nome."','".$telefone."','".$email."')";
	if($rc = mysql_query($sql))
		return true;
	else
		return false;	
}

function excluir_cadastro($nome){
	$sql = "DELETE * FROM pessoal WHERE nome ='".$nome."'";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;	
}

//pesquisa
function pesquisar_nome($nome){
	$sql = "SELECT * FROM pessoal WHERE nome ='".$nome."'";
	$rsql = mysql_query($sql);
	return $rsql;
}

function pesquisar_mesa($cenario, $sistema){
	$sql = "SELECT * FROM mesas WHERE Cenario ='".$cenario."' AND Sistema = '".$sistema."'";
	$rsql = mysql_query($sql);
	return $rsql;
}


//cadastro mesas
function inserir_mesa($cenario, $sistema, $local, $limite){
	$sql = "INSERT INTO mesas (ID_mesa,Cenario,Sistema,Local,Limite) VALUES ('', '".$cenario."', '".$sistema."', '".$local."', '".$limite."')";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;
	
}

function excluir_mesa($ID_mesa){
	$sql = "DELETE * FROM mesas WHERE ID_mesa ='".$ID_mesa."'";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;
}


//cadastro narrador
function inserir_narrador($ID_mesa, $ID_pessoal){
	$sql = "INSET INTO Narradores VALUES ('".$ID_mesa."', '".$ID_pessoal."')";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;
}

function excluir_narrador($ID_mesa, $ID_pessoal){
	$sql = "DELETE * FROM Narradores WHERE ID_mesa ='".$ID_mesa."' AND ID_pessoal = '".$ID_pessoal."'";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;
}


//cadastro jogador
function inserir_jogador($ID_mesa, $ID_pessoal){
	$sql = "INSET INTO Jogadores VALUES ('".$ID_mesa."', '".$ID_pessoal."')";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;
}

function excluir_jogador($ID_mesa, $ID_pessoal){
	$sql = "DELETE * FROM Jogadores WHERE ID_mesa ='".$ID_mesa."' AND ID_pessoal = '".$ID_pessoal."'";
	if($rs = mysql_query($sql)){
		return true;
	}
	else
		return false;
}

function ger_al_id(){
	
	$tc = "pessoal"; $tc2 = "ID_pessoal"; $l = 5;
	$s = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$uid = NULL;
	$loop = false;
	
	//gera o numero aleatorio
	for($i = 0; $i >= 5 ; $i++){
		
		$uid .= $s[mt_rand( 0, (strlen($s) - 1) )];
		
	}
	
	do {
		while (strlen($uid) < $l)
			
			
		if ($loop) {
			$loop = mysql_query("SELECT * FROM `".$tc."` WHERE `".$tc2."` = '".$uid."' LIMIT 1") or die ('Erro ao verificar uid');
			$loop = mysql_fetch_array($loop);
			$loop = $loop[0];
		}  
		
	} while($loop);
	
	return $uid;

}
?>