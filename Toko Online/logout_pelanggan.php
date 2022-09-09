<?php
    session_start();
    session_destroy();
    echo '<script>window.location="login_pelanggan.php"</script>'; 

?>