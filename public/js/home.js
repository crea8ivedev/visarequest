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
