function pedirSerPublicador() {

	


var route ="permissions";
				var token = $('#token').val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					success:function(info){
						
						Materialize.toast('Has enviado la solicitud a mundocente', 4000);
						$('#boton-add-permissions').html("Reenviar solicitud");
						$('#delete-temp-premissions').css({display: 'block'});
						$('#cancel-temp-premissions').css({display: 'none'});
						$('#message-premission-temp').html("Solicitu enviada");
						
						
						
					}
						
				});



	
}



function cancelarSerPublicador() {

	


var route ="cancelar-permissions";
				var token = $('#token').val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					success:function(info){
						
						Materialize.toast('Solicitud cancelada', 4000);
						$('#rren-boton-add-permissions').html("Enviar Solicitud para publicador");
						$('#delete-temp-premissions').css({display: 'none'});
						$('#cancel-temp-premissions').css({display: 'block'});
						$('#reenviar-message').html("No tienes permiso para publicaciones");
						
						
						
					}
						
				});



	
}


function change_email_active(){

	var state_email_actual = $("#hidden_email_active_edit").val();
	if(state_email_actual=='si'){
		$("#hidden_email_active_edit").val("no");
	}else if(state_email_actual=='no'){
		$("#hidden_email_active_edit").val("si");
	}

}