<?PHP
include "../func_espirito.php";
conec_inicio();

// Seleciona registros
$sql = "SELECT * FROM mesas";
$rs = mysql_query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administração</title>
<link href="estilo_adm.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="corpo">
<div id="topo">
  	<?php include "../baner_topo.php"?>
  	<h1>Administração do registro</h1>
</div>

<div id="caixa_menu">
	<?PHP include "menu_adm.php" ?>

</div>
<!-- falta ajeitar a tabela de mesas que sera gerada, assim como o stilo da pagia e as paginas de linkagem do menu lateral deste -->
<div id="caixa_conteudo" >
	<p>Mesas</p>
	<?php  
		while($reg = mysql_fetch_array($rs)){
		//pesquisa da mesa
		$ID_mesa = $reg["ID_mesa"];
		$Cenario = $reg["Cenario"];
		$Sistema = $reg["Sistema"];
		$Local = $reg["Local"];
		$Narrador = $reg["ID_pessoal"];
		
		$sql1 = "SELECT * FROM pessoal WHERE pessoal.ID_pessoal = '".$Narrador."'";
		$rs1 = mysql_query($sql1);
		$dp_narrador = mysql_fetch_array($rs1);
		$nome_narrador = $dp_narrador["Nome"];
		
	?>
    	
		<table width="100%" cellspacing="0">
		<tr>
		<td width="28%" class="tabela_titulo">Marrador</td>
		<td width="25%" class="tabela_titulo">Cenario</td>
		<td width="25%" align="right" class="tabela_titulo">Sistema</td>
		<td width="28%" align="right" class="tabela_titulo">Local</td>
		</tr>
        	
		<tr>
		<td class="registro"><?PHP print $nome_narrador?></td>
		<td class="registro"><?PHP print $Cenario; ?></td>
		<td class="registro" align="right"><?PHP print $Sistema; ?></td>		
		<td class="registro" align="right"><?PHP print $Local; ?></td>		
		</tr>
        </table>
        
        <table width="100%" cellspacing="0">
    	<tr>
        <td width="100" class="tabela_titulo">Jogadores</td>
        </tr>
        <?PHP
			$sql2 = "SELECT * FROM jogadores WHERE jogadores.ID_mesa ='".$ID_mesa."'";
			$rs2 = mysql_query($sql2);
			
			while ($ID_jogadores = mysql_fetch_array($rs2)) {
				//insersao dos dados dos jogadores
				$sql3 = "SELECT * FROM pessoal WHERE pessoal.ID_pessoal ='".$ID_jogadores["ID_pessoal"]."'";
				$rs3 = mysql_query($sql3);
				$dp_jogador = mysql_fetch_array($rs3);
				$nome_jogador = $dp_jogador["Nome"];
				
		?>
		<tr>
        <td class="registro"><?PHP print $nome_jogador; ?></td>
        </tr>
        
		</table>
        <?PHP } ?>
    <?php }?>

</div>
</div>
</body>
</html>