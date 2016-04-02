/**
 * Created by SOSA-PC on 27/03/2016.
 */
(function($){
    $(function(){

        $('.button-collapse').sideNav();

    }); // end of document ready
})(jQuery); // end of jQuery name space

// Paralax
$(document).ready(function(){
    $('.parallax').parallax();
});

$(document).ready(function(){
    $('.scrollspy').scrollSpy();
});

var options = [
    {selector: '#Services', offset: 200, callback: 'Materialize.fadeInImage("#Services")' },
    {selector: '#News', offset: 200, callback: 'Materialize.fadeInImage("#News")' },
    {selector: '#Contact', offset: 200, callback: 'Materialize.fadeInImage("#Contact")' },
];
Materialize.scrollFire(options);