$("#cep").mask("99999-999",{completed:function(){
		var cep = $(this).val().replace(/[^0-9]/, "");
		if(cep.length != 8){
			return false;
		}
		var url = "https://viacep.com.br/ws/"+cep+"/json/";
		
		$.getJSON(url, function(dadosRetorno){
			try{
				$("#rua").val(dadosRetorno.logradouro);
				$("#bairro").val(dadosRetorno.bairro);
				$("#cidade").val(dadosRetorno.localidade);
				$("#uf").val(dadosRetorno.uf);
				$("#numero").focus();
			}catch(ex){}
		});
	}});

