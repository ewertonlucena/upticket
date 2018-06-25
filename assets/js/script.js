$(window).on('load', function () {
    $('#modal1').modal('show');
});

$(document).ready(function () {      
    $(document).on('click', function (e) {    
        if (!$(e.target).parent('#notifyMenu').length) $('.dropdown-menu2').removeClass("show");
    });
    
    $(document).on('click', function (e) {    
        if (!$(e.target).parent('#staffMenu').length) $('.staff-menu').removeClass("show");
    });
    
    $(document).on('mouseover', function (e) {    
        if ($(e.target).closest('.welcome-staff').length) $('#BtnStaff').addClass("btn-staff-hover");
    });
    
    $(document).on('mouseout', function (e) {    
        if ($(e.target).closest('.welcome-staff').length) $('#BtnStaff').removeClass("btn-staff-hover");
    });    
    
});

