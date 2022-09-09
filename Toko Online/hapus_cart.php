<?php
    session_start();
    unset($_SESSION['cart'][$_GET['id']]);
    echo '<script>location="keranjang.php"</script>';
?>