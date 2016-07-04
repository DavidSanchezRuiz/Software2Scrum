var countCreated = 20;

//Publica nueva convocatoria
function add_convocatoria() {
	var area = $('#nueva_convocatoria').val();
	var cargo_enw = $('#cargo_new').val();
	var enlace_new = $('#enlace_new').val();
	var description_new = $('#description_new').val();
	var date_inicio_new = $('#date_inicio_new').val();
	var date_fin_new = $('#date_fin_new').val();

	if(cargo_enw.length>0){

		if(enlace_new.length>0){
			var route ="add-publication";
				var token = $('#token').val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data:{area: area, cargo:cargo_enw, enlace:enlace_new, desc:description_new,
					 inicio:date_inicio_new, fin:date_fin_new, tipo:'convocatoria'},
					success:function(info){
						countCreated--;
						$('#cargo_new').val("");
						$('#enlace_new').val("");
						$('#description_new').val("");
						$('#date_inicio_new').val("");
						$('#date_fin_new').val("");

						$('#id_title_new_hidden'+countCreated).html("Convocatoria de "+cargo_enw);
						$('#id_description_new_hidden'+countCreated).html(description_new);
						$('#id_enlace_new_hidden'+countCreated).attr({href: enlace_new});

						$("#publication_all_hidden"+countCreated).toggle(1000);
						$("#publication_all_hidden"+countCreated).css({display: 'block'});


						Materialize.toast('Convocatoria publicada con éxito', 7000);
						
						}
						
				});
		}else{
			Materialize.toast('El enlace es obligatorio', 4000);
		}



		
	}else{
		Materialize.toast('Ingresar cargo', 4000);
	}


	

}


//Publica nueva revista

function add_revista() {
	var area = $('#nueva_revista').val();
	var title_new = $('#title_revista_new').val();
	var enlace_new = $('#r_enlace_new').val();
	var description_new = $('#r_description_new').val();
	var date_inicio_new = $('#r_date_inicio_new').val();
	var date_fin_new = $('#r_date_fin_new').val();


	if(title_new.length>0){

		if(enlace_new.length>0){
			var route ="add-publication";
				var token = $('#token').val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data:{area: area, titulo:title_new, enlace:enlace_new, desc:description_new,
					 inicio:date_inicio_new, fin:date_fin_new, tipo:'revista'},
					success:function(info){
						countCreated--;
						$('#title_revista_new').val("");
						$('#r_enlace_new').val("");
						$('#r_description_new').val("");
						$('#r_date_inicio_new').val("");
						$('#r_date_fin_new').val("");

						$('#id_title_new_hidden'+countCreated).html("Convocatoria de "+title_new);
						$('#id_description_new_hidden'+countCreated).html(description_new);
						$('#id_enlace_new_hidden'+countCreated).attr({href: enlace_new});

						$("#publication_all_hidden"+countCreated).toggle(1000);
						$("#publication_all_hidden"+countCreated).css({display: 'block'});


						Materialize.toast('Revista publicada con éxito', 7000);
						
						
					}
						
				});
		}else{
			Materialize.toast('El enlace es obligatorio', 4000);
		}
	}else{
		Materialize.toast('El título es obligatorio', 4000);
	}

	
}





//Publica nuevo evento

function add_evento() {
	var area = $('#nueva_evento').val();
	var title_new = $('#title_evento_new').val();
	var enlace_new = $('#e_enlace_new').val();
	var description_new = $('#e_description_new').val();
	var date_inicio_new = $('#e_date_inicio_new').val();
	var date_fin_new = $('#e_date_fin_new').val();


	if(title_new.length>0){

		if(enlace_new.length>0){

			if(date_inicio_new.length>0){

				var route ="add-publication";
				var token = $('#token').val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data:{area: area, titulo:title_new, enlace:enlace_new, desc:description_new,
					 inicio:date_inicio_new, fin:date_fin_new, tipo:'evento'},
					success:function(info){
						countCreated--;
						$('#title_evento_new').val("");
						$('#e_enlace_new').val("");
						$('#e_description_new').val("");
						$('#e_date_inicio_new').val("");
						$('#e_date_fin_new').val("");

						$('#id_title_new_hidden'+countCreated).html("Convocatoria de "+title_new);
						$('#id_description_new_hidden'+countCreated).html(description_new);
						$('#id_enlace_new_hidden'+countCreated).attr({href: enlace_new});

						$("#publication_all_hidden"+countCreated).toggle(1000);
						$("#publication_all_hidden"+countCreated).css({display: 'block'});



						Materialize.toast('Evento publicado con éxito', 7000);
						
						}
						
				});
			}else{
				Materialize.toast('La fecha de inicio es obligatoria', 4000);
			}

			
		}else{
			Materialize.toast('El enlace es obligatorio', 4000);
		}
	}else{
		Materialize.toast('El título es obligatorio', 4000);
	}


	
}