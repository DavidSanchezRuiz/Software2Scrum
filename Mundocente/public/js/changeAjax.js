
function addSelectAr(option){
	
	var dato = option.value;
	var route = "/preferencias";
	var token = $("#token").val();

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN': token},
		type:'POST',
		dataType:'json',
		data:{preferencias:dato}
	});
}

