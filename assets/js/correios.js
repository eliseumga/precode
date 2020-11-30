$(function(){

	$('#Form').bind('submit', function(e){
		e.preventDefault();

		var str = $("#subtotal").text();
		var subtotal = str.replace('R$', "");
		var subtotal = subtotal.replace(',', ".");

		var dados = $(this).serialize();

		$.ajax({
			type : 'POST',
			url : 'http://eliseu.online/correio/consulta',
			headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    	},
			data: dados,
			dataType: 'json',
			beforeSend: function(){
        loading_show();
      },
			success: function(resp){
				var strFrete = resp.valor[0];
				var vrlFrete = strFrete.replace(",", ".");
				
				var displayVlrFrete = strFrete.replace(".", ",");

				var vlrTotalCompra = (Number(subtotal) + Number(vrlFrete));
				$('#totalFrete').val('R$ '+displayVlrFrete);	

				var vlrTotalGeral = vlrTotalCompra.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"});
				$('#totalCompra').val(vlrTotalGeral);					

			},
			error: function(){
				alert('Ocorreu um erro!');
			},
			complete: function(){
        loading_hide();
      }
		});
	});
});

function loading_show(){
  $('#loading').html("<img src='../assets/images/loader.gif'/>").fadeIn('fast');
}

function loading_hide(){
  $('#loading').fadeOut('fast');
}
