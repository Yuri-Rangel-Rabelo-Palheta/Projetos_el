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
	
	// Validação, só falta a limitação de tamanho pra senha.
	$("form#cad").submit(function(){
		var nome = $("form#cad #nome").val();
		var cpf = $("form#cad #cpf").val();
		var estado = $("form#cad #estado").val();
		var cidade = $("form#cad #cidade").val();
		var email = $("form#cad #email").val();
		var senha = $("form#cad #senha").val();
		
		var dados ="acao=cadastro&nome="+nome+"&cpf="+cpf+"&estado="+estado+"&cidade="+cidade+"&email="+email+"&senha="+senha;
		
		$("form#cad input, form#cad select").each(function(){
			if($(this).val()==""){
				$(this).parents(".control-group").addClass("error");
				}
			else{
				$(this).parents(".control-group").removeClass("error");
				if($("#senha").val() != $("#confirma").val()){
					$("#senha").parents(".control-group").addClass("error");
					$("#confirma").parents(".control-group").addClass("error");
					}
					
					else{ // Depois de todas essas validações, finalmente o cadastro
						
						$.ajax({
							type: "POST",
							url: "cadastro.php",
							data: dados,
							cache: false,
							success: function(){
								$("#contato_enviando p").html('<center><img src="images/email-send-icon.png" alt=""></center>').find('center').hide().fadeIn("slow");
								$("#contato_enviando h3").html('Mensagem Enviada');
								$("input:text, textarea").val("");
								setTimeout(some,2000);
								}
							});

						}
					
				}
		});
		return false;
	});
	
	// Máscara do CPF
	$("#cpf").mask("999.999.999-99");
	
	// Dicas do Cadastro.
	$("#cad input").tooltip({trigger:"focus",animation:"true",placement:"right"});
	
	
		
});