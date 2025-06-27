  jQuery(document).ready(function () {

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scroll-top').fadeIn();
        } else {
            jQuery('.scroll-top').fadeOut();
        }
    });

    jQuery('.scroll-top').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 100);
        return false;
    });
});


jQuery(document).ready(function($) 
{
  jQuery(".is-style-alt").prepend("<span>Te puede interesar:</span><br>");

  var scroll_pos = 0;
  jQuery(document).scroll(function() { 
    scroll_pos = $(this).scrollTop();
    if(scroll_pos > 210) {
      jQuery(".menuCategorias2020").slideDown('slow');
      jQuery(".sitiosGin2020").slideUp('slow');
      jQuery(".barraRevImpresa").slideUp('');
    } else {
      jQuery(".menuCategorias2020").slideUp('slow');
      jQuery(".barraRevImpresa").fadeIn('');
    }
  });

  var scroll_pos = 0;
  jQuery(document).scroll(function() { 
    scroll_pos = $(this).scrollTop();
    if(scroll_pos > 2000) {
      jQuery(".siguienteNota2020").slideDown('');

    } else {
      jQuery(".siguienteNota2020").slideUp('');
    }
  });



  $(".buscMobile2020").click(function(){
    $('.buscador2020').fadeIn('');
  });

  $(".cerrarBuscadorMobile2020").click(function(){
    $('.buscador2020').fadeOut('');
  });

  $(".btnCompMobile").click(function(){
    $('.redescomparte2020').fadeIn('');
  });

  $(".cerrarCompartirMobile").click(function(){
    $('.redescomparte2020').fadeOut('');
  });

  $(".nV2020").click(function(){
    $('.menuDesplegado').fadeIn('');
  });

  $(".closeNavBars").click(function(){
    $('.menuDesplegado').fadeOut('');
  });

  $(".closeSticky").click(function(){
    $('.stickyBanner').slideUp('');
  });



  const buttonRight = document.getElementById('slideRight');
  const buttonLeft = document.getElementById('slideLeft');
  buttonRight.onclick = function (){
    document.getElementById('container').scrollLeft += 100;
  };
  buttonLeft.onclick = function (){
    document.getElementById('container').scrollLeft -= 100;
  };

   
  
  $("#demo01").click(function(){
    $('.animatedModal').fadeIn('');
    $('.container.modal-content-cookie').fadeIn('slow');
  });

  $(".close-animatedModal").click(function(){
    $('.container.modal-content-cookie').fadeOut('');
    $('.animatedModal').fadeOut('');
  });
});

// Barra Scroll
window.onscroll = function() {myFunction()};
function myFunction() 
{
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}