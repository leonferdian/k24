$(document).ready(function(){

    
    $("#submit_form").submit(function(event) {
        /* stop form from submitting normally */
        event.preventDefault();
        /* get the action attribute from the <form action=""> element */
        var form = $( this ),
        action_url = form.attr( 'action' );
        $.ajax({
                method: "POST",
                url: action_url,
                data: $("#submit_form").serialize()
              })
            .done(function(){
                new PNotify({
                    title: 'Data Saved',
                    text: 'All Changes Has Been Saved.',
                    addclass: 'notification-success',
			        icon: 'fa fa-check',
                    cornerclass: 'ui-pnotify-sharp'
                });
                document.getElementById("submit_form").reset();
                $('.table').DataTable().ajax.reload();
            })
            .fail(function() {
                new PNotify({
                    title: 'Error Processing Data!',
                    text: 'There is something wrong.',
                    addclass: 'notification-danger',
                    icon: 'fa fa-times',
                    cornerclass: 'ui-pnotify-sharp'
                });
            })
            .always(function() {
                $('#form_modal').modal('hide');
            });
    });

    $('.delete').on('click', function(){
        var btn = $(this),
        url = btn.data('url');

        bootbox.confirm({
            title: "Delete data",
            message: "Do you want to delete this data? This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function (result) {
                if (result == true)
                {
                    location.replace(url);
                }
                else
                {
                    new PNotify({
                        title: 'Action Canceled',
                        text: 'There is no modification in data.',
                        addclass: 'notification-danger',
                        icon: 'fa fa-times',
                        cornerclass: 'ui-pnotify-sharp'
                    });

                    $('.table').DataTable().ajax.reload(); 
                }
            }
        });
    });

    $('tbody').on('click', '.btn-delete', function(d){
        var btn = $(this),
        url = btn.data('url');

        bootbox.confirm({
            title: "Delete data",
            message: "Do you want to delete this data? This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function (result) {
                if (result == true)
                {
                    location.replace(url);
                }
                else
                {
                    new PNotify({
                        title: 'Action Canceled',
                        text: 'There is no modification in data.',
                        addclass: 'notification-danger',
                        icon: 'fa fa-times',
                        cornerclass: 'ui-pnotify-sharp'
                    });

                    $('.table').DataTable().ajax.reload();
                }
            }
        });
    });

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
    function validateName(name) {
        var re = /([A-z])\w+/;
        return re.test(name);
    }
});

function dropdown_director() {
    var url = $('.search-categories').val();
    location.replace(url);
}