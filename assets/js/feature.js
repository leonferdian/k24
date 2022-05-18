$(document).ready(function(){
    $(".fancybox").fancybox({
          openEffect: "none",
          closeEffect: "none"
    });
      
    $(".zoom").hover(function(){
          
        $(this).addClass('transition');
    }, function(){  
        $(this).removeClass('transition');
    });
});

$(document).ready(function() {
    $('#datatable').DataTable();
} );

// MDB Lightbox Init
$(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});