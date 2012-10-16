<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Criar Mesa</title>
</head>
<body>
<div id="corpo">

<div id="topo">
	<?php include "../baner_topo.php"?>
</div>

<div id="menusuperior">
	
</div>
<?php
include ("../func_espirito.php");

conec_inicio();
if(isset($_GET["acao"])):$acao= $_GET["acao"];
endif;
if (isset($acao) && $acao == "cadastro") {
	
	$cenario = $_POST["Cenario"];
	$sistema = $_POST["Sistema"];
	$local = $_POST["Local"];
	$limite = $_POST["Limite"];
	
	
	if(inserir_mesa($cenario, $sistema, $local, $limite)){
		echo "<script language='javascript'>alert('Cadastro efetuado com sucesso')</script>";
	}
	else{
		echo "<script language='javascript'>alert('Não foi possivel realizar o cadastro no momento')</script>";
	}
	
	}

?>
<table align="center"  width="500">
<tr><td align="center"><h1>Cadastro</h1></td></tr>
<tr><td align="center"><h2>Nova Mesa</h2></td></tr>
</table><br />
<table align="center" width="500" border="10">
<form name="form1" id="form1" method="post" action="../adm/cad_mesa.php?acao=cadastro">
<tr><td width="67"><p><em>Cenario:</em></td><td width="421"><em>
  <input type="text" name="Cenario"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><p><em>Sistema:</em></td><td width="421"><em>
  <input type="text" name="Sistema"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><p><em>Local:</em></td><td width="421"><em>
  <input type="text" name="Local"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><p><em>Limite:</em></td><td width="421"><em>
  <input type="text" name="Limite"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><em>
  <input type="submit" name="cad" id="cad" value="Cadastro"/>
</em></td></tr>

</form>
</table>

</div>
</body>
</html>