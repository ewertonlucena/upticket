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
});

$('#checkAll').click(function(){        
    if ($(this).prop('checked')) { 
        $(':checkbox').prop('checked', true);
    } else {
        $(':checkbox').prop('checked', false);
    }
});

$('#agentAll').click(function(){        
    if ($(this).prop('checked')) { 
        $('[id|=agent]').prop('checked', true);
    } else {
        $('[id|=agent]').prop('checked', false);
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

 $('#teamAll').click(function(){        
    if ($(this).prop('checked')) { 
        $('[id|=team]').prop('checked', true);
    } else {
        $('[id|=team]').prop('checked', false);
    }
});

$('[name=name]').focus(function(){
    $('#valid-name').removeClass('fa-ban valid-ban fa-check-circle valid-ok').addClass('fa-spinner fa-spin d-none');        
    $('[type=submit]').prop('disabled', true);
});

$('[name=name]').blur(function(){

    var action = $(this).attr('data-action');
    var model = $(this).attr('data-model');
    var id = $(this).attr('data-id');
    var name = $(this).val();


    if(!(name == '') && !(action == undefined) && !(model == undefined)) {
        $('#valid-name').removeClass('d-none'); 
        setTimeout(function() {
            $.ajax({
                url:BASE_URL+'ajax/'+action,
                type:'POST',
                data:{name: name, model: model},
                dataType:'json',
                success:function(json) {
                   if((json != 0) &&(json != id)) {

                       $('#valid-name').removeClass('fa-spinner fa-spin').addClass('fa-ban valid-ban');
                       $('[type=submit]').prop('disabled', true);                           

                   } else { 
                       $('#valid-name').removeClass('fa-spinner fa-spin').addClass('fa-check-circle valid-ok');
                       if ($('[name=login]').length > 0) {                               
                          if($('#valid-login.valid-ok').length > 0) {
                               $('[type=submit]').prop('disabled', false);
                           }    
                       } else {                                     
                           $('[type=submit]').prop('disabled', false);
                       }

                   }
                }
            });
        }, 1000);
    }        
});

$('[name=login]').focus(function(){
    var action = $(this).attr('data-action');
    if (action != undefined) {
        $('#valid-login').removeClass('fa-ban valid-ban fa-check-circle valid-ok').addClass('fa-spinner fa-spin d-none');        
        $('[type=submit]').prop('disabled', true);
    }
});

$('[name=login]').blur(function(){

    var action = $(this).attr('data-action');
    var model = $(this).attr('data-model');
    var id = $(this).attr('data-id');
    var login = $(this).val();


    if(!(login == '') && !(action == undefined) && !(model == undefined)) {
        $('#valid-login').removeClass('d-none'); 
        setTimeout(function() {
            $.ajax({
                url:BASE_URL+'ajax/'+action,
                type:'POST',
                data:{login: login, model: model},
                dataType:'json',
                success:function(json) {
                   if((json != 0) &&(json != id)) {                           

                       $('#valid-login').removeClass('fa-spinner fa-spin').addClass('fa-ban valid-ban');
                       $('[type=submit]').prop('disabled', true);

                   } else {
                       $('#valid-login').removeClass('fa-spinner fa-spin').addClass('fa-check-circle valid-ok');
                       if($('[name=name]').length > 0) {
                           if($('#valid-name.valid-ok').length > 0) {
                               $('[type=submit]').prop('disabled', false);
                           }                               
                       } else {
                           $('[type=submit]').prop('disabled', false);
                       }

                   }
                }
            });
        }, 1000);
    }        
});

$(function() {
    $('.tabitem').click(function(e){
        $('.tabitem').removeClass('active');
        $(this).addClass('active');

        var item = $('.tabitem.active').index();
        window.console.log(item);
        $('.tabbody').hide();
        $('.tabbody').eq(item).show();
    });
    $('.tabbody').eq(0).show();
});


