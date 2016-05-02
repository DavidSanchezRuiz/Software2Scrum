
function addSelectAr(option){
	
	var dato = option.value;
	var route = "http://localhost:8000/preferencias";
	var token = $("#token").val();

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN': token},
		type:'POST',
		dataType:'json',
		data:{preferencias:dato}
	});
}