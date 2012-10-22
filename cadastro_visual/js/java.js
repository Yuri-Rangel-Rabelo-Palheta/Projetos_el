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
			//$('#cidade').html('<option value="">Escolha um estado</option>');
		}
	});
	$("form#cad").submit(function(){
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
				}
		});
		return false;
	});
	$("#cpf").mask("999.999.999-99");
	
		$("#cad input").tooltip({trigger:"focus",animation:"true",placement:"right"});
		
});