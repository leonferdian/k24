$(document).ready(function() {
    $('#tbl_data').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": BASE_URL + "admin/users/listdata",
        "columns": [
            { "data": "id" },
            { "data": "firstname" },
            { "data": "lastname" },
            { "data": "email" },
            { 
                "data": "groups",
                "orderable": false
            },
            { 
                "data": "status" ,
                "orderable": false
            },
            { 
                "data": "action", 
                "orderable": false
            }
        ]
    });

    $('#tbl_group').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": BASE_URL + "admin/users/listgroup",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "description" },
            { 
                "data": "action", 
                "orderable": false
            }
        ]
    });

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
    });

});
