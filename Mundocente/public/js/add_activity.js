var countCreated = 20;

//Publica nueva convocatoria
function add_convocatoria() {
	var area = $('#nueva_convocatoria').val();
	var cargo_enw = $('#cargo_new').val();
	var enlace_new = $('#enlace_new').val();
	var description_new = $('#description_new').val();
	var date_inicio_new = $('#date_inicio_new').val();
	var date_fin_new = $('#date_fin_new').val();
	var lugar_id = $('#id_lugar_convo_hidden').val();

	if(area!=null){

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
					 inicio:date_inicio_new, fin:date_fin_new, tipo:'convocatoria', lugar_id:lugar_id},
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

}else{
	Materialize.toast('Agregar mínimo un tema', 4000);
}
	

}


//Publica nueva revista


function changeIndexada(){
	var change_index = $('#indexada_revista_dato').val();
	if(change_index=='si'){
		$('#indexada_revista_dato').val("no");
		$('#select_categori_label').css({display: 'none'});
		$('#categori_select_opcion').css({display: 'none'});
	}else{
		$('#indexada_revista_dato').val("si");
		$('#select_categori_label').css({display: 'block'});
		$('#categori_select_opcion').css({display: 'block'});
	}
	
}

function add_revista() {
	var area = $('#nueva_revista').val();
	var title_new = $('#title_revista_new').val();
	var enlace_new = $('#r_enlace_new').val();
	var description_new = $('#r_description_new').val();
	var date_inicio_new = $('#r_date_inicio_new').val();
	var date_fin_new = $('#r_date_fin_new').val();
	var dato_indexada = $('#indexada_revista_dato').val();
	var categori = $('#categori_select_opcion').val();
	var lugar_id = $('#id_lugar_convo_hidden_revista').val();

	
if(area!=null){
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
					 inicio:date_inicio_new, fin:date_fin_new, tipo:'revista', indexa:dato_indexada,cate:categori, lugar_id:lugar_id},
					success:function(info){
						countCreated--;
						$('#title_revista_new').val("");
						$('#r_enlace_new').val("");
						$('#r_description_new').val("");
						$('#r_date_inicio_new').val("");
						$('#r_date_fin_new').val("");

						$('#id_title_new_hidden'+countCreated).html(title_new);
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
}else{
	Materialize.toast('Agregar mínimo un tema', 4000);
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
	var lugar_id = $('#lugar_evento_id').val();

if(area!=null){
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
					 inicio:date_inicio_new, fin:date_fin_new, tipo:'evento', lugar_id:lugar_id},
					success:function(info){
						countCreated--;
						$('#title_evento_new').val("");
						$('#e_enlace_new').val("");
						$('#e_description_new').val("");
						$('#e_date_inicio_new').val("");
						$('#e_date_fin_new').val("");

						$('#id_title_new_hidden'+countCreated).html(title_new);
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
}else{
	Materialize.toast('Agregar mínimo un tema', 4000);
}

	
}




function nobackbutton(){
	
   window.location.hash="no-back-button";
	
   window.location.hash="Again-No-back-button" //chrome
	
   window.onhashchange=function(){window.location.hash="";}
	
}