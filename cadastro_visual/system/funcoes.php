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

?>