$(document).ready(function () {
    $(".select2").select2();
  });
/*------------------------------------------------------------------------------*/
/* Owl Crousel
/*------------------------------------------------------------------------------*/
$(document).ready(function() {
  $('#main-banner').owlCarousel({
    loop: true,
    dots: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 1,
        nav: true
      },
      1000: {
        items: 1,
        nav: true,
        loop: false,
        margin: 0
      }
    }
  });
});