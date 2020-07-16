jQuery(document).ready(function () {

    jQuery('#vmap').vectorMap({
        map: 'world_en',
        backgroundColor: 'none',
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#666666',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: ['#C8EEFF', '#0071A4'],
        normalizeFunction: 'polynomial',
        onRegionClick: function (element, code, region) {
           var country = convertToSlug(region);
           if(country != '') {
            var url = 'country';
              $.ajax({
                type: "post",
                url: url,
                data: {country:country},
                success: function (res) {
                    if (res.success) {
                        window.location.assign('visa/'+country);
                    } else {
                        alert('Visa Application information not available for ' + region);
                        return false;
                    }
                },
                error: function (e) {
                    alert(e);
                }
            });
          }
        }
    });
});

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

function ChangeMap(mapname)
{
    if (mapname == 'word') {
        $('#europe').hide();
        $('#usa').hide();
        $('#vmap').show();
    }
    else if (mapname == 'usa')
    {
        $('#vmap').hide();
        $('#europe').hide();
        $('#usa').show();
    }
    else if (mapname == 'europe')
    {
        $('#europe').show();
        $('#vmap').hide();
        $('#usa').hide();
    }
    else
    {
        $('#vmap').show();
        $('#vmap').hide();
        $('#usa').hide();
    }
}

