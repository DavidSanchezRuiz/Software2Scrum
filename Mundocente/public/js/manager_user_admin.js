/**
 * Created by SOSA-PC on 21/07/2016.
 */
function admin_edit_user(id_user){

    $('#name_edit_admin').val("");
    $('#last_name_edit_admin').val("");
    $('#email_edit_admin').val("");
    
    $("#cargo_edit_admin").val("");
    

    var route ="getdatauser/"+id_user;
    var token = $('#token').val();

    $.get( route, function(res) {

        $(res).each(function(key, value){
        	$('#id_user_edit').val(value.id);
            $("#name_edit_admin").val( value.name_u );
            $("#last_name_edit_admin").val(value.last_name);
            $("#email_edit_admin").val(value.email);
            $("#universidad_new_admin").val(value.id_i);
            $("#cargo_edit_admin").val(value.cargo);
            $("#ciudad_actual_chanfe_admin").val(value.id_l);
            
            if(value.email_active=='si'){
            	$("#nofiti_admin_edit").attr({checked: "true"});
            	$("#new_nofiti_admin_save").val('si');
            }else
            if(value.email_active=='no'){
				$("#nofiti_admin_edit").attr({checked: null});
				$("#new_nofiti_admin_save").val('no');
            }
          	
            
            
        });



    });

}

function change_email_admin(){
	var value_active_email = $('#new_nofiti_admin_save').val();
	if(value_active_email=='si'){
		$('#new_nofiti_admin_save').val('no');
	}else if(value_active_email=='no'){
		$('#new_nofiti_admin_save').val('si');
	}
}



function save_data_user_admin(){

	var id_user = $('#id_user_edit').val();


 var name_new_admin_edit = $('#name_edit_admin').val();


   var last_name_new_admin_edit = $('#last_name_edit_admin').val();
  

   var email_new_amin_edit = $('#email_edit_admin').val();
  

    var univer_new_admin_edit = $('#universidad_new_admin').val();

    var cargo_new_admin_edit = $("#cargo_edit_admin").val();
   

    var ciudad_new_admin_edit = $('#ciudad_actual_chanfe_admin').val();
   

    var active_email_edit_admin =$('#new_nofiti_admin_save').val();

    var emailAntigu = $("#email_anitguo").val();
   


var route ="/edit_user_admin/"+id_user;
				var token = $("#token").val();

		    	$.ajax({
					url:route,
					headers:{'X-CSRF-TOKEN':token},
					type:'POST',
					dataType:'json',
					data:{name_new:name_new_admin_edit, last_name_new:last_name_new_admin_edit, email_new:email_new_amin_edit, 
						univer_new:univer_new_admin_edit, cargo_new:cargo_new_admin_edit, ciudad_new:ciudad_new_admin_edit, active_new:active_email_edit_admin,
						 email_anti:emailAntigu},
					success:function(info){
						
							$("#name_actual_tabla"+id_user).html(name_new_admin_edit);
						$("#email_user_tabla"+id_user).html(email_new_amin_edit);
						$("#cargo_user_tabla"+id_user).html(cargo_new_admin_edit);
						$("#name_unoiver_tabla"+id_user).html("Editada");

						Materialize.toast('Usuario actualizado correctamente', 5000);
						
						
						
						}
						
				});


}





