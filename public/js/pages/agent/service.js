 $(document).ready(function() {

     $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
     var table = $('#service_table').DataTable({
         processing: true,
         serverSide: true,
         responsive: true,

         // DOM Layout settings
         dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
         ajax: {
             type: 'post',
             url: "service",
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },

             data: function(d) {
                 d.search = $('.search').val();
             },
         },
         columns: [{
                 data: 'name',
                 name: 'name'
             },
             {
                 data: 'normal_price',
                 name: 'normal_price'
             },
             {
                 data: 'discount_price',
                 name: 'discount_price'
             },
             {
                 data: 'commission',
                 name: 'commission'
             },
             {
                 data: 'action',
                 name: 'action',
                 orderable: false
             }
         ]
     });

     table.on('preXhr', function(evt, settings) {
         if (settings.jqXHR) {
             settings.jqXHR.abort();
         }
     })

     $('.search').on('keyup', function() {
         table.draw();
     });

 });