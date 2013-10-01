<?php

    session_start();
    session_destroy();
    echo "<script>alert('Est\u00e1 saliendo del sitio');
		window.location.href=\"index.html\"</script>";

?>