<?php
    if($_GET['id']){
    include "koneksi.php";
    $id_transaksi=$_GET['id'];
    mysqli_query($conn, "INSERT INTO bayar (id_transaksi, tgl_bayar) value ('".$id_transaksi."','".date('Y-m-d')."')");
    echo"<script>location='histori_pembelian.php'</script>";
    }
?>