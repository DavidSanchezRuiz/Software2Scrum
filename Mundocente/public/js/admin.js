//Activar usuario para quesea publicador
function activarUs(id_user) {
	var user_id = id_user;
	var email = $("#email_hidden"+id_user).val();
	
	console.log(email);
			var route ="activar-user";
				var token = $("#token"+id_user).val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data:{id_u:user_id, email_u:email},
					success:function(info){

						$("#activar"+user_id).css({display: 'none'});

						$("#desactivar"+user_id).css({display: 'block'});
						
						
						Materialize.toast('Usuario activado', 4000);
						
						}
						
				});
	
}




//Activar usuario para quesea publicador
function desactivarUs(id_user) {
	var user_id = id_user;
	var email = $("#email_hidden"+id_user).val();

			var route ="desactivar-user";
				var token = $("#token"+id_user).val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data:{id_u:user_id, email_u:email},
					success:function(info){

						$("#desactivar"+user_id).css({display: 'none'});
						$("#sin_sol"+user_id).css({display: 'block'});
												

						Materialize.toast('El usuario fue desactivado', 4000);
						
						}
						
				});
	
}