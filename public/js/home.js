$(document).ready(function () {
    $(".country").select2();
    $('body').on('change','.country',function() {
        var country = $(this).val();
        if(country != '') {
          window.location.href = serviceUrl.replace(':country', country);
        }
    });
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