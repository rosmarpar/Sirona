//al hacer click en el checkbox de la contraseña se muestra la contraseña
$(document).ready(function(){
    $('#user_showpassword').click(function(){
        if($(this).is(':checked')){
            $('#user_password').attr('type','text');
        }else{
            $('#user_password').attr('type','password');
        }
    });
}
);