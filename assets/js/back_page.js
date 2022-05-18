$(document).ready(function(){
    
    if ($('#date_akad').length) {
        
        $('input[name="date_akad"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
              format: 'YYYY-MM-DD HH:mm:ss'
            }
        });
    }

    if ($('#date_reception').length) {
        
        $('input[name="date_reception"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
              format: 'YYYY-MM-DD HH:mm:ss'
            }
        });
    }

    
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

    $('.edit').on('click', function(){
        var btn = $(this),
        url = btn.data('url');

        $.ajax({
            method: "GET",
            url: url,
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
            $("#result").html(response); 
            //alert(response);
            }
        })
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
                    $.ajax({
                        method: "POST",
                        url: url
                      })
                    .done(function(){
                        new PNotify({
                            title: 'Success',
                            text: 'Data Has Been Deleted.',
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
                    $.ajax({
                        method: "POST",
                        url: url
                      })
                    .done(function(){
                        new PNotify({
                            title: 'Succeess',
                            text: 'Data Has Been Deleted.',
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