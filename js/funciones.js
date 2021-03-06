$(document).ready(function () {
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    $(".boton").click(function () {
        $(".error").remove();
        if( $(".nombre").val() == "" ) {
            $(".nombre").focus().after("<span class='error'>Ingrese su nombre</span>");
            return false;
        }else if( $(".apellido").val() == "") {
            $(".apellido").focus().after("<span class='error'>Ingrese su apellido</span>");
            return false;
		}else if( $(".email").val() == "" || !emailreg.test($(".email").val()) ){
			$(".email").focus().after("<span class='error'>Ingrese un email correcto</span>");
			return false;
        }else if( $(".nickname").val() == "" ) {
            $(".nickname").focus().after("<span class='error'>Ingrese su usuario</span>");
            return false;
		}else if( $(".password").val() == "" ) {
            $(".password").focus().after("<span class='error'>Ingrese su password</span>");
            return false;
        }
    });
    $(".nombre, .apellido, .nickname, .password").keyup(function() {
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	$(".email").keyup(function(){
        if( $(this).val() != "" && emailreg.test($(this).val())){
            $(".error").fadeOut();
            return false;
        }
    });
});