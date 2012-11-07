<?php include("system/funcoes.php"); ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
  <head>
    <title>Clube de RPG Espirito Livre - Cadastro</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mod.css">
  </head>
  <body data-spy="scroll" data-target=".navbar">
    	<div class="navbar navbar-fixed-top">
        	<div class="navbar-inner">
            	<div class="container">
                	<div class="nav-collapse collapse">
                    	<ul class="nav" id="menu_top">
                        	<li><a href="#home">Home</a></li>
                        	<li><a href="#origem">A Origem</a></li>
                        	<li><a href="#cadastro">Cadastro</a></li>
                            <li><a href="#contato">Contato</a></li>
                            <li><a href="http://espiritolivrerpg.blogspot.com/" target="_blank">Blog</a></li>
                        </ul>
                    <a href="" id="titulo_topo" class="brand">Espirito Livre - Clube de RPG</a>                        
                    </div>
                </div>
            </div>
        </div>
	    <div id="home" class="container">
			<div class="row">
				<div class="span7"><img src="img/logo_g.jpg" alt=""></div>
				<div class="span5">
	                <div id="home2" class="row">
                    	<h2>Vamos jogar RPG?</h2>   
	                    <p> 
	                    O <strong>Clube de RPG Espírito Livre</strong> é uma iniciativa que visa reunir mestres/narradores/jogadores de RPG de todo o Brasil, organizados com um único objetivo: fazer a cultura RPGista crescer.
                        </p>
                        <p> Através da realização de eventos, parcerias com editoras e livrarias, sorteios, aquisição de novos espaços para a prática do RPG, e principalmente, a atração de cada vez mais novos praticantes de nosso adorado hobby, vamos fazer do Clube de RPG Espírito Livre uma referência não apenas nacional, mas talvez para além de nossas fronteiras...afinal, qual o limite para quem tem Espírito Livre? 
                       </p>
                       <p>Venha conosco em aventuras cada vez mais distantes, porque só a imaginação é nosso limite! <br>
	                    </p>
	                </div>
                    <br><br>
                    <div class="row">
						<blockquote class="pull-right">
							<p><em>
								"Sozinhos somos poderosos.
								Juntos, somos lendas."
							</em></p>
							<small>Slogan do jogo X-Men Legends 2*</small>
						</blockquote>
                    </div>
				</div>
			</div>
		</div>
        <div id="origem" class="container">
        	<div class="row">
                <div class="span6">
                <h2>A Origem</h2>
                	<p>
                    A alguns anos atrás, em 2007 salvo engano, 4 jovens iniciaram uma pequena missão; em uma breve jornada por mundos além da compreensão, encontraram algo pequeno e de pouco poder, mas com um enorme potencial por se desenvolver; não era uma pedra mágica, uma espada sagrada, tampouco uma armadura mágica. O que tinham em mãos era simplesmente uma ideia...mas não seriam as ideias origem do verdadeiro poder?
Nascia ali o Espírito Livre, um nome, um grupo, uma reunião de aventureiros, uma ideia. Esse nascimento era especial porque, os jovens mesmos não sabiam o nível do elemento que agora guardavam; não sabiam eles que dentro daquela coisa simples um poder imenso estava adormecido...
                    </p>
                    <p>
                    <em>Curioso? Em breve, mais detalhes da nossa história...</em>
                    </p>
                </div>
            	<div class="span6">
                	<center><img src="img/mesa-de-rpg.jpg" alt=""></center>
                </div>
            </div>
        </div>
        <div id="cadastro" class="container">
        	<div class="row">
            	<div class="span6">
	                <form id="cad" action="" class="form-horizontal">
	                    <div class="control-group">
	                    	<label class="control-label" for="nome">Nome</label>
	                        <div class="controls">
	                        	<input type="text" id="nome" placeholder="Nome Completo" data-original-title="Digite seu nome completo">
	                        </div>
	                    </div>
                        <div class="control-group">
	                    	<label class="control-label" for="endereco">Endereço</label>
	                        <div class="controls">
	                        	<input type="text" rel="tooltip" id="endereco" placeholder="Endereço com Bairro" data-original-title="Endereço completo, e não se esqueça do bairro!">
	                        </div>
	                    </div>

                        <div class="control-group">
	                    	<label class="control-label" for="cep">CEP</label>
	                        <div class="controls">
	                        	<input type="text" rel="tooltip" id="cep" placeholder="CEP" data-original-title="Necessário para o envio da carteira.">
	                        </div>
	                    </div>
                        <div class="control-group">
	                    	<label class="control-label" for="cidade">Cidade/Estado</label>
	                        <div class="controls">
                            	<select name="" id="cidade" class="input-medium" data-original-title="Primeiro selecione o Estado.">
                                	<option value="">Cidade</option>
                                    <?php 
										if($_SERVER['SERVER_NAME']=="localhost"){
											echo '<option value="29">Teste</option>';
											}
									 ?>
                                </select>
	                        	<select name="" id="estado" class="input-mini" data-original-title="Estado">
                                	<option value=""></option>
                                	<?php 
									get_estados(); 
									?>
	                        		
	                        	</select>
	                        </div>
	                    </div>
	                    <div class="control-group">
	                    	<label class="control-label" for="email">Email</label>
	                        <div class="controls">
	                        	<input type="email" id="email" placeholder="Email" data-original-title="Você receberá as futuras instruções através dele.">
	                        </div>
	                    </div>
                        <div class="control-group">
	                    	<label class="control-label" for="senha">Senha</label>
	                        <div class="controls">
	                        	<input type="password" id="senha" maxlength="12" placeholder="Senha" data-original-title="Deve ter entre 6 e 12 caracteres.">
	                        </div>
	                    </div>
                         <div class="control-group">
	                    	<label class="control-label" for="confirma">Confirme</label>
	                        <div class="controls">
	                        	<input type="password" id="confirma" maxlength="12" placeholder="Confirme a senha" data-original-title="Repita a senha acima.">
                                <span class="help-block" id="s_conf">Senha e Confirmação diferentes.</span>
	                        </div>
	                    </div>
                        <div class="control-group">
							<div class="controls">
								<button type="submit" class="btn" id="cad_bt"><i class="icon-ok"></i> Cadastrar</button>
							</div>
                        </div>
	                </form>
                </div>
            	<div class="span6">
                	<h2>Cadastre-se</h2>
                    <p>
                    Entrando no clube você tem muitas vantagens, que se dividem no seu nivel de compromentimento:
                    </p>
                    <p>
                    <h4>Associado Simples</h4>
                    Participará como playtester dos nossos aplicativos nacionais, associado ao <strong>Facebook</strong> com sistema de gerencia de mesas, avaliação, pontuação e muito mais...
                    </p>
                    <p>
                    <h4>Associado VIP</h4>
                    Pelo valor <strong>anual</strong> de 15 reais, desfrutará de desconto na compra de material nas editoras/lojas parceiras, sorteios de material e narradores terão brindes garantidos nos eventos do clube. No futuro, desconto em filmes e eventos do meio nerd/geek/otaku. <br>
                   <a href="docs/inscricao_el.pdf" target="_blank">Veja como se tornar VIP!</a> 
                    </p>
                </div>
            </div>
        </div>
        <div class="container" id="contato">
        	<div class="row">
	        	<div class="span6"><img src="img/bardo.jpg" alt=""></div>
	        	<div class="span6">
	            	<h2>Contato</h2>
	                <p>Envie sua dúvida, sugestão ou elogio (por que não?).</p>
	                <form action="" class="form" id="mens_form">
	                	<div class="control-group">
                            <div class="controls">
                            	<div class="input-prepend">
                            		<span class="add-on"><i class="icon-user"></i></span><input type="text" name="" id="nome" placeholder="Nome" class="input-xlarge">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                            	<div class="input-prepend">
                            		<span class="add-on">@</span><input type="text" name="" id="email" placeholder="E-mail" class="input-xlarge">                                
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                            	<textarea name="" id="" cols="30" rows="10" placeholder="Digite sua mensagem" class="input-xlarge"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn" id="cont_bt"><i class="icon-envelope"></i> Enviar</button>	
	                </form>
	            </div>
            </div>
        </div>
        <div class="container" id="footer">
        	<div class="row">
            	<div class="span8">
                <p>
                	<strong>ESPÍRITO LIVRE | Clube de RPG</strong> - <?php echo date("Y"); ?> <br>
                    <em>"Abra sua mente, liberte seu espírito."</em><br>
                	espiritolivrerpg@gmail.com
                </p>
                </div>
                <div class="span4">
                	<a target="_blank" href="http://espiritolivrerpg.blogspot.com/" title="Blog"><img src="img/blogger64.png" alt=""></a>
                    <a target="_blank" href="http://www.facebook.com/pages/Clube-de-RPG-Esp%C3%ADrito-Livre/232916940100586" title="Página"><img src="img/face64.png" alt=""></a>
                    <a target="_blank" href="http://www.facebook.com/groups/espiritolivrerpg/" title="Grupo"><img src="img/face64.png" alt=""></a>                    
                    <a target="_blank" href="https://twitter.com/espiritolivrer" title="Twitter"><img src="img/twitter64.png" alt=""></a>
                </div>
            </div>
        </div>
        <?php include("contato_msg.php"); ?>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.slideto.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js" ></script>
    <script type="text/javascript" src="js/java.js"></script>
  </body>
</html>