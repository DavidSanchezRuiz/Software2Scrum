/**
 * Created by SOSA-PC on 27/03/2016.
 */
(function($){
    $(function(){
        $('.button-collapse').sideNav();
    });
})(jQuery);

// Paralax
$(document).ready(function(){
    Materialize.updateTextFields();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $('.collapsible').collapsible({
        accordion : false
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
});

$(document).ready(function(){
    $('.slider').slider({full_width: true});
    $(".js-example-basic-multiple").select2({
        placeholder: "Selecciona los temas de preferencia"
    });
    $(".js-example-diacritics").select2();
});



function nobackbutton(){
	
   window.location.hash="no-back-button";
	
   window.location.hash="Again-No-back-button" //chrome
	
   window.onhashchange=function(){window.location.hash="";}
	
}


