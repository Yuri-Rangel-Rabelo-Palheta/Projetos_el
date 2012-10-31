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
	$senha = md5($senha);
	$sql = "INSERT INTO usuarios(nome,cpf,cidade,estado,email,senha,codigo,admin) VALUES  ('".$nome."','".$cpf."','".$cidade."','".$estado."','".$email."','".$senha."','".$codigo."','0')";
	if($res = mysql_query( $sql )){
		return TRUE;
		}
	else{
		return FALSE;
		}
	}
function emailUser($nome,$email){

      if(empty($email))
      {
        $alert = "<div id=\"alert\" class=\"erro\"><b>Preencha o campo com seu email <b></div>";
      }
      

      else
      {
        require('PHPMailer/class.phpmailer.php');

       $mail = new PHPMailer();
       $mail->IsSMTP();
	   $mail->Host = 'smtp.googlemail.com';
       $mail->SMTPAuth = true;
       $mail->Port = 587;
	   $mail->SMTPSecure = 'tls';
       $mail->Username = 'espiritolivrerpg@gmail.com';
       $mail->Password = 'mente.espirito1';
       $mail->SetFrom('espiritolivrerpg@gmail.com', 'Clube de RPG Espirito Livre');
       $mail->AddAddress($email, 'Contato');
       $mail->Subject = 'Cadastro no Clube Espirito Livre';

       $body = '<meta charset="UTF-8">
Olá <strong>'.$nome.',</strong><br>
<br>
Este email foi usado para o seu cadastro no <strong>Clube de RPG - Espírito Livre</strong>, não o perca pois ele é o nosso principal meio de comunicação. Acompanhe o andamento do nosso projeto:<br><br>
<div style="text-align:center">
<strong>Facebook:</strong> <a href="http://www.facebook.com/groups/espiritolivrerpg/">Grupo</a> / <a href="http://www.facebook.com/pages/Espirito-Livre-Grupo-de-RPG/232916940100586">Página</a> | 
<strong><a href="http://twitter.com/espiritolivrer">Twitter</a></strong> | 
<strong><a href="http://espiritolivrerpg.rpgonline.com.br/">Blog</a></strong><br>
</div>
<br>
Aguarde, entraremos em contato em breve.
<br><br>
<div style="text-align:right">
<em>"Abra sua mente, liberte seu espírito.<br>
<strong>-Espírito Livre RPG</strong></em>';


       $mail->MsgHTML($body);


       if($mail->Send())
		   echo "Email enviado";

        else
            echo "Falha no Envio";


      }
}

function emailContato($nome,$email,$mens){

      if(empty($email))
      {
        $alert = "<div id=\"alert\" class=\"erro\"><b>Preencha o campo com seu email <b></div>";
      }
      

      else
      {
        require('PHPMailer/class.phpmailer.php');

       $mail = new PHPMailer();
       $mail->IsSMTP();
	   $mail->Host = 'smtp.googlemail.com';
       $mail->SMTPAuth = true;
       $mail->Port = 587;
	   $mail->SMTPSecure = 'tls';
       $mail->Username = 'espiritolivrerpg@gmail.com';
       $mail->Password = 'mente.espirito1';
       $mail->SetFrom('espiritolivrerpg@gmail.com', 'Mensagem Via Site');
       $mail->AddAddress('espiritolivrerpg@gmail.com', 'Contato');
       $mail->Subject = 'Mensagem Nova ( Clube EL )';

       $body = '<meta charset="UTF-8">
	   			<strong>    Nome:</strong>'.$nome.'<br>
				<strong>  E-mail:</strong>'.$email.'<br>
				<strong>Mensagem:</strong>'.$mens;


       $mail->MsgHTML($body);


       if($mail->Send())
		   echo "Email enviado";

        else
            echo "Falha no Envio";


      }
}
function emailNvCadastrp($nome,$email){

      if(empty($email))
      {
        $alert = "<div id=\"alert\" class=\"erro\"><b>Preencha o campo com seu email <b></div>";
      }
      

      else
      {
        require('PHPMailer/class.phpmailer.php');

       $mail = new PHPMailer();
       $mail->IsSMTP();
	   $mail->Host = 'smtp.googlemail.com';
       $mail->SMTPAuth = true;
       $mail->Port = 587;
	   $mail->SMTPSecure = 'tls';
       $mail->Username = 'espiritolivrerpg@gmail.com';
       $mail->Password = 'mente.espirito1';
       $mail->SetFrom('espiritolivrerpg@gmail.com', 'Mensagem Via Site');
       $mail->AddAddress('espiritolivrerpg@gmail.com', 'Contato');
       $mail->Subject = 'Novo Cadastro! ( Clube EL )';

       $body = '<meta charset="UTF-8">
	   			<h1>Novo Usuário Cadastrado no Clube! o/</h1>
	   			<strong>    Nome:</strong>'.$nome.'<br>
				<strong>  E-mail:</strong>'.$email;


       $mail->MsgHTML($body);


       if($mail->Send())
		   echo "Email enviado";

        else
            echo "Falha no Envio";


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