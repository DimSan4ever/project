$(document).ready(function() {
    var $host_pach = $('a:contains(Главная)').attr('href');
    $('#loginForm').on('click', 'input[name=register]', function(e){
        e.preventDefault(1,2);
        $.post(
            $host_pach+'authorize/register',
            { 
                email:      $('input[name=email]').val(), 
                password:   $('input[name=password]').val(),
                save:       $('#save_checkbox').is(':checked')
            },
            function(data){
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else {
                    $('#userEmail').html('Вы зашли как: ' + '<a href="'+$host_pach+'user/profile/id/'+ data.id + '">' + data.email + '</a>');
                    $('#userId').html('<a id="logout" href="#">Exit</a>');
                    $('#loginFormDiv').hide();
                    $('#error').empty();
                }
            },
            'json'
        );
    });
    
    $('#loginForm').on('click', 'input[name=login]', function(e){
        e.preventDefault();
        $.post(
            $host_pach+'authorize/login', 
            { 
                email:      $('input[name=email]').val(), 
                password:   $('input[name=password]').val(),
                save:       $('#save_checkbox').is(':checked')
            },
            function(data){ 
                if(data.error !== undefined) {
                    $('#error').html(data.error);
                }
                else {
                    $('#userEmail').html('Вы зашли как: ' + '<a href="'+$host_pach+'/user/profile/id/'+ data.id + '">' + data.email + '</a>');
                    $('#userId').html('<a id="logout" href="#">Exit</a>');
                    $('#loginFormDiv').hide();
                    $('#error').empty();
                   
                    if(data.role_id == 1) {
                         //$('#admin_href').show();
                         window.location = "http://javascript.ru";
                    }
                }
            },
            'json'
        );
    });
    
    $('body').on('click', '#logout', function(e) {
        e.preventDefault();
        $.post(
            $host_pach+'/authorize/exit/', 
            {
                
            },
            function(){ 
                $('#logout').empty();
                $('#userId').show();
                $('#loginFormDiv').show();
                $('#userEmail').empty();
                $('#admin_href').hide();
            }
        ); 
    });
});

