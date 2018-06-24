$(window).on('load', function () {
    $('#modal1').modal('show');
});

$(document).ready(function () {      
    $(document).on('click', function (e) {    
        if (!$(e.target).closest('#notifyMenu').length) $('.dropdown-menu2').removeClass("show");
    });
});

