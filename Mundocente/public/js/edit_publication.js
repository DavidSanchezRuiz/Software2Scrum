//editar publicación
function edit_publication(id_publication) {
	var id_actividad = id_publication;
	

	var title_new = $("#select_title_edit"+id_actividad).val();
	
	var area_new = $("#select_area_edit"+id_actividad).val();
	
	var cargo_new = $("#select_cargo_edit"+id_actividad).val();
	
	var desc_new = $("#select_desc_edit"+id_actividad).val();
	
	var enlace_new = $("#select_enlace_edit"+id_actividad).val();
	
	var tipo_new = $("#select_tipo_edit"+id_actividad).val();
	
	var inicio_new = $("#select_inicio_edit"+id_actividad).val();
	
	var fin_new = $("#select_fin_edit"+id_actividad).val();


	if(title_new.length>0){
		if(enlace_new.length>0){
			var route ="/add-publication/"+id_actividad;
				var token = $("#token"+id_actividad).val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'PUT',
					dataType:'json',
					data:{area: area_new, titulo:title_new, cargo:cargo_new, enlace:enlace_new, desc:desc_new,
					 inicio:inicio_new, fin:fin_new, tipo:tipo_new},
					success:function(info){
						$("#div_all_edit"+id_actividad).toggle(1000);
						$("#div_all_edit"+id_actividad).css({display: 'none'});
						$("#div_all_edit"+id_actividad).toggle(1000);
						$("#div_all_edit"+id_actividad).css({display: 'block'});
						

						Materialize.toast('Cambios guardados exitosamente', 7000);
						
						}
						
				});
		}else{
			Materialize.toast('El enlace es obligatorio', 4000);
		}
	}else{
		Materialize.toast('El título es obligatorio', 4000);
	}
	
	
}



//eliminar publicación
function delete_publication(id_publication) {
	var id_actividad = id_publication;
	

	

	var route ="/add-publication/"+id_actividad;
				var token = $("#token"+id_actividad).val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'DELETE',
					dataType:'json',
					success:function(info){
						$("#div_all_edit"+id_actividad).toggle(2000);
						
						
						

						Materialize.toast('Publicación eliminada', 7000);
						
						}
						
				});
	

}



