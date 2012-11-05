$(document).ready(function(){
	// Menu Deslizante
	$("#menu_top a").click(function(){
			var destino= $(this).attr("href");
			$(destino).slideto({highlight: false});		
			return false
			});
			
	// Plugin Estado => Cidades
	$('#estado').change(function(){
		if( $(this).val() ) {
			$.getJSON('system/cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value=""></option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
				}	
				$('#cidade').html(options).show();
			});
		} else {
			//$('#cidade').html('<option value="">Escolha um estado</option>');
		}
	});
	
	
	$("#contato_enviando").on('hidden',function(){
			$("#contato_enviando p").html('<center><img src="img/loading2.gif" alt=""></center>');
			$("#contato_enviando h3").html('Enviando sua mensagem...');
		});
	var some=function(){$('#contato_enviando').modal('hide')};
	
	// Validação, só falta a limitação de tamanho pra senha.
	$("form#cad").submit(function(){
		var nome = $("form#cad #nome").val();
		var endereco = $("form#cad #endereco").val();
		var cep = $("form#cad #cep").val();
		var estado = $("form#cad #estado").val();
		var cidade = $("form#cad #cidade").val();
		var email = $("form#cad #email").val();
		var senha = $("form#cad #senha").val();
		
		var dados ="acao=cadastro&nome="+nome+"&endereco="+endereco+"&cep="+cep+"&estado="+estado+"&cidade="+cidade+"&email="+email+"&senha="+senha;
		var valido = true;
		
		$("form#cad input, form#cad select").each(function(){
			if($(this).val()==""){
				$(this).parents(".control-group").addClass("error");
				$("#s_conf").css("opacity","0");
				valido = false;
				
				}
			else{
				$(this).parents(".control-group").removeClass("error");
				if($("#senha").val() != $("#confirma").val()){
					$("#senha").parents(".control-group").addClass("error");
					$("#confirma").parents(".control-group").addClass("error");
					$("#s_conf").css("opacity","1");
					valido = false;					
					}
				}
		});
		
		if(valido){
						$("#contato_enviando h3").html('Enviando cadastro...');
						$('#contato_enviando').modal({backdrop:"static"});
						$('#contato_enviando').modal("show");
						$("#s_conf").css("opacity","0");
						$.ajax({
							type: "POST",
							url: "cadastro.php",
							data: dados,
							cache: false,
							success: function(){
								$("#contato_enviando p").html('<center>Você receberá mais informações no seu email. <br><img src="img/email-send-icon.png" alt=""></center>').find('center').hide().fadeIn("slow");
								$("#contato_enviando h3").html('Cadastro enviado');
								$("form#cad input, form#cad textarea").val("");
								setTimeout(some,2000);
								}
							});
			
			}
		return false;
	});
	// Contato Via Ajax
	$("#contato_enviando").on('hidden',function(){
			$("#contato_enviando p").html('<center><img src="img/loading2.gif" alt=""></center>');
			$("#contato_enviando h3").html('Enviando sua mensagem...');
		});
	var some=function(){$('#contato_enviando').modal('hide')};
	
	$("#mens_form #cont_bt").click(function(){
		valido2 = true;
	  	var nome=$("#mens_form #nome").val();
	  	var email=$("#mens_form #email").val();
	  	var mens=$("#mens_form #mens").val();
	  	var dados="acao=mensagem&nome="+nome+"&email="+email+"&mens="+mens;
		
		$("form#mens_form input, form#mens_form select").each(function(){
			if($(this).val()==""){
				$(this).parents(".control-group").addClass("error");
				$("#s_conf").css("opacity","0");
				valido2 = false;
				
				}
			
			});
		
  		if(valido2){			
			$("#contato_enviando h3").html('Enviando mensagem...');
			$('#contato_enviando').modal({backdrop:"static"});
			$('#contato_enviando').modal("show");
			$.ajax({
				type: "POST",
				url: "cadastro.php",
				data: dados,
				cache: false,
				success: function(){
					$("#contato_enviando p").html('<center><img src="img/email-send-icon.png" alt=""></center>').find('center').hide().fadeIn("slow");
					$("#contato_enviando h3").html('Mensagem Enviada');
					$("#mens_form input, #mens_form textarea").val("");
					setTimeout(some,2000);
				}
				
				});
		}
		return false;
		});
	
	// Máscara do CPF
	$("#cep").mask("99999-999");
	
	// Dicas do Cadastro.
	$("#cad input").tooltip({trigger:"focus",animation:"true",placement:"right"});
	
	
		
});