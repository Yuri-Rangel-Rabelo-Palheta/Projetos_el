<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procura cadastro</title>
</head>
<?php session_start();
	  include"../func_espirito.php"; 
	  conec_inicio(); 	?>
<body>
<table width="100%" height="67">  <tr>
		<td width="60%">Cadastro</td>
			
			<td width="40%"></td>
        </tr>
</table>

<table width="100%" height="67">
		<?php

		
			$sql1 = "SELECT * FROM pessoal";
			$rs1 = mysql_query($sql1);
			
			$t = 1;
			
			while($dp = mysql_fetch_array($rs1)){
				?>
				<tr>
					<td width="70%"><?php print $dp["Nome"];//nome cadastrado?></td>
					
					<td width="30%" align="left"><a href="altera_pessoal.php?id=<?php    
					print $dp["ID_pessoal"];?>"  > <img src="imagens/btn_alterar2.gif" alt="Alterar Registro" border="0" /></a></td>
				</tr><?php
			}?></table>
</body>
</html>