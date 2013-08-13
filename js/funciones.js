$(document).ready(function () {
    $(".boton").click(function () {
        $(".error").remove();
        if( $(".nombre").val() == "" ) {
            $(".nombre").focus().after("<span class='error'>Ingrese su nombre</span>");
            return false;
        }else if( $(".apellido").val() == "") {
            $(".apellido").focus().after("<span class='error'>Ingrese su apellido</span>");
            return false;
        }else if( $(".usuario").val() == "" ) {
            $(".usuario").focus().after("<span class='error'>Ingrese su usuario</span>");
            return false;
		}else if( $(".password").val() == "" ) {
            $(".password").focus().after("<span class='error'>Ingrese su password</span>");
            return false;
        }
    });
    $(".nombre, .apellido, .usuario, .password").keyup(function() {
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
});