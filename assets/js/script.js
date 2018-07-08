$(window).on('load', function () {
    $('#modal1').modal('show');
});

$(".open-form").click(function(){
    $(this).toggleClass('btn-search btn-search-close');
    $(this).find('span').toggleClass('fa-search fa-times');
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
    
    $('#checkAll').click(function(){        
        if ($(this).prop('checked')) { 
            $(':checkbox').prop('checked', true);
        } else {
            $(':checkbox').prop('checked', false);
        }
    });
    
});

