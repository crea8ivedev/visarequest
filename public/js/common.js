$( document ).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var fileType = input.files[0];
            fileType = fileType['type'];
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if (validImageTypes.includes(fileType)) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img width="250px" height="150px" id="dynamic">');
                    img.attr('src', e.target.result);
                    img.appendTo('.'+$(input).attr('id'));
                }
                reader.readAsDataURL(input.files[0]);
                }
        }
      }
      $(".images-load").change(function() {
        $('.'+$(this).attr('id')).html('');
        readURL(this);
      });
});