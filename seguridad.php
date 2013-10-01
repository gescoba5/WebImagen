<?php
    
    @session_start();
	
    if ((isset($_SESSION["autentica"])?$_SESSION["autentica"]:NULL) != "SIP") {
	    echo "<script>alert('Usted no tiene permisos para ver esta p\u00e1gina, '
			+ 'por favor inicie sesi\u00f3n');window.location.href=\"index.html\"</script>";
	    exit();
    }

?>