$(function(){

	$('#AddUser').bind('submit', function(e){
		e.preventDefault();
		// remove as mensagens de erro
   	//$(".erromsg").remove();
		var strName = $("#inputName").val();
		var strEmail = $("#inputEmail").val();
		var strPassword = $("#inputPassword").val();
		// Mensagem de erro padrão a ser inserida após o campo
   	var erromsg = '<div class="erromsg">Preencha o campo <span></span></div>';
		
		if(strName == '' || strName.length < 5){
			strName.after(erromsg);
			$(".erromsg span").text("nome corretamente!");
			return;
		}
		if(strEmail == ''){
			strEmail.after(erromsg);
			$(".erromsg span").text("e-mail");
			return;
		}
		if(strPassword == ''){
			strPassword.after(erromsg);
			$(".erromsg span").text("password");
			return;
		}

		var dados = $(this).serialize();

		$.ajax({
			type : 'POST',
			url : 'http://eliseu.online/users/addUser',
			headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    	},
			data: dados,
			dataType: 'json',
			beforeSend: function(){
        loading_show();
      },
			success: function(resp){
				if(resp[0].tipo === 'warning'){
					msgWarning(resp[0].msg);
				} else if (resp[0].tipo === 'success') {
					msgSuccess(resp[0].msg);	
				} else if (resp[0].tipo === 'error') {
					msgErro(resp[0].msg);
				}
			},
			error: function(resp){
				msgErro(resp.msg);
			},
			complete: function(){
        loading_hide();
        refresh();
      }
		});
	});


	$('#EdtUser').bind('submit', function(e){
		e.preventDefault();
		var iduser   = $("#iduser").val();
		var strName  = $("#inputNameE").val();
		var strEmail = $("#inputEmailE").val();
		// Mensagem de erro padrão a ser inserida após o campo
   	var erromsg = '<div class="erromsg">Preencha o campo <span></span></div>';
		
		if(strName == '' || strName.length < 5){
			strName.after(erromsg);
			$(".erromsg span").text("nome corretamente!");
			return;
		}
		if(strEmail == ''){
			strEmail.after(erromsg);
			$(".erromsg span").text("e-mail");
			return;
		}
		if(iduser == ''){
			iduser.after(erromsg);
			$(".erromsg span").text("iduser");
			return;
		}
		var dados = $(this).serialize();

		$.ajax({
			type : 'POST',
			url : 'http://eliseu.online/users/edtuser',
			headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    	},
			data: dados,
			dataType: 'json',
			beforeSend: function(){
        loading_show();
      },
			success: function(resp){
				if(resp[0].tipo === 'warning'){
					msgWarning(resp[0].msg);
					alert('Warning');
				} else if (resp[0].tipo === 'success') {
					msgSuccess(resp[0].msg);
      		$('#'+iduser).children('td[data-target=name]').text(strName);
      		$('#'+iduser).children('td[data-target=email]').text(strEmail);
      		$('#UserUpdate').modal('toggle');
				} else if (resp[0].tipo === 'error') {
					msgErro(resp[0].msg);
					alert('Error');
				}
			},
			error: function(resp){
				msgErro(resp.msg);
				alert('Error');
			},
			complete: function(){
        loading_hide();
        refresh();
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
function msgSuccess($text){
	$.toast({
    heading: 'Sucesso',
    text: $text,
    position: 'bottom-right',
    icon: 'success',
    loader: true,        
    loaderBg: '#9EC600'  
	});	
}
function msgErro($text){
	$.toast({
    heading: 'Erro',
    text: $text,
    position: 'bottom-right',
    icon: 'error',
    loader: true,        
    loaderBg: '#9EC600'  
	});	
}
function msgWarning($text){
	$.toast({
    heading: 'Atenção',
    text: $text,
    position: 'bottom-right',
    icon: 'warning',
    loader: true,        
    loaderBg: '#9EC600'  
	});	
}
function refresh(){
	location.reload();
}