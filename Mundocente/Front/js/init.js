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
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
});

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});

$(document).ready(function() {
    $('select').material_select();
});