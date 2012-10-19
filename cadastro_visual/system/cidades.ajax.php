<?
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/xml; charset="utf-8"', true );

include("conexao.php");
conexao();
$cod_estados = mysql_real_escape_string( $_GET['cod_estados'] );

$cidades = array();

$sql = "SELECT cod_cidades, nome
		FROM cidades
		WHERE estados_cod_estados=$cod_estados
		ORDER BY nome";
$res = mysql_query( $sql );
while ( $row = mysql_fetch_assoc( $res ) ) {
	$cidades[] = array(
		'cod_cidades'	=> $row['cod_cidades'],
		'nome'			=> mb_convert_encoding($row['nome'], "UTF-8", "ISO-8859-1"),
	);
}

echo( json_encode( $cidades ) );
?>