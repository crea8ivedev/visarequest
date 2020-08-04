 $(document).ready(function() {

 $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  var table =  $('#statistics_table').DataTable({
        processing: true,
        serverSide: true,
        responsive : true,

        // DOM Layout settings
        dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
          ajax: {
          type:'post',
           url: "admin/statistic",
           headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },

           data: function (d) {
                d.search = $('.search').val();
            },
          },
          columns: [
           {
            data: 'date',
            name: 'date'
           },
           {
            data: 'ip',
            name: 'ip'
           },
           {
            data: 'name',
            name: 'name'
           },
           {
            data: 'region_name',
            name: 'region_name'
           },
           {
            data: 'city',
            name: 'city'
           },
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