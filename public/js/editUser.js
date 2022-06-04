//al hacer click en el checkbox de la contraseña se muestra la contraseña
$(document).ready(function(){
    $('#form_showpassword').click(function(){
        if($(this).is(':checked')){
            $('#form_password').attr('type','text');
        }else{
            $('#form_password').attr('type','password');
        }
    });
}
);