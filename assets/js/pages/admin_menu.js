$(document).ready(function() {
    $('#tbl_data').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": BASE_URL + "admin/menu/listdata"
    });

    $('.icp-auto').iconpicker();

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
    });

    function getTree() {
        // Some logic to retrieve, or generate tree structure
        var data_tree = [];
        $.ajax({
            url: BASE_URL + '/admin/menu/list_tree',
        })
        .done(function( data ) {
            if ( console && console.log ) {
                //console.log( "Sample of data:", data.slice( 0, 100 ) );
            }
            console.log(data);
            return data;
        });

        
        return data_tree;
    }

    var menu = [{"text":"Parent 1","tag":["2"],"nodes":[{"text":"Child 1","tag":["3"],"nodes":[{"text":"deep 3","tags":[6]},{"text":"Sub menu deep 3","tags":[6]}]}]}];
      
    $('#treemenu').treeview({data: menu});
});
