// JavaScript Document

$(document).ready(function(){
	$("#menu_top a").click(function(){
			var destino= $(this).attr("href");
			$(destino).slideto({highlight: false});		
			return false
			});
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
			$('#cidade').html('<option value="">Escolha um estado</option>');
		}
	});
	var ala;
	$("form input, form select").change(function(){
		$("form input, form select").each(function(){
			if($(this).val() != ""){
				ala=1			
				}
				else{
					ala=0;
					}
			});
		if(ala==1){
			$("form button").removeAttr("disabled");
			}
			else
			$("form button").attr('disabled','disabled');
	});
	$("#cpf").mask("999.999.999-99");
	$("form").validate({
		rules: {
			email: {
				required: true,
				email: true
				}
			},
			 messages:{
                email: {
                    required: "O campo email é obrigatorio.",
                    email: "O campo email deve conter um email válido."
                }
			}
		});
		
});