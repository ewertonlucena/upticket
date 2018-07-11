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
    
    $('#clntAll').click(function(){        
        if ($(this).prop('checked')) { 
            $('[id^=clnt]').prop('checked', true);
        } else {
            $('[id^=clnt]').prop('checked', false);
        }
    });
    
    $('#orgAll').click(function(){        
        if ($(this).prop('checked')) { 
            $('[id^=org]').prop('checked', true);
        } else {
            $('[id^=org]').prop('checked', false);
        }
    });
    
    $('#tcktAll').click(function(){        
        if ($(this).prop('checked')) { 
            $('[id^=tckt]').prop('checked', true);
        } else {
            $('[id^=tckt]').prop('checked', false);
        }
    });
    
    $('#taskAll').click(function(){        
        if ($(this).prop('checked')) { 
            $('[id^=task]').prop('checked', true);
        } else {
            $('[id^=task]').prop('checked', false);
        }
    });
    
    $('#groupAll').click(function(){        
        if ($(this).prop('checked')) { 
            $('[id|=group]').prop('checked', true);
        } else {
            $('[id|=group]').prop('checked', false);
        }
    });
    
    $('#departmentAll').click(function(){        
        if ($(this).prop('checked')) { 
            $('[id|=department]').prop('checked', true);
        } else {
            $('[id|=department]').prop('checked', false);
        }
    });
});

