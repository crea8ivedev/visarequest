$(document).ready(function () {
    $(".select2").select2();
    $('body').on('click','.country-submit',function() {
          var country = $('#select_country').val();
          if(country != '') {
            var url = '{{ route("visa.selected_country", ":id") }}';
            url     = url.replace(':id', country);
            window.location.href = url;
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