/**
 * Created by SOSA-PC on 21/07/2016.
 */
function admin_edit_user(id_user){

    var name_user = $('#name_edit_admin');


    var route ="getdatauser/"+id_user;
    var token = $('#token').val();

    $.get( route, function(res) {

        $(res).each(function(key, value){
            $( "#name_edit_admin" ).val( value.name );
        });



    });

}