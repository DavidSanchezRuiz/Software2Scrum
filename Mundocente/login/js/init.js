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
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $('.collapsible').collapsible({
        accordion : false
    });
});
