<?php
    session_start();
    if($_GET['id']){
    include "koneksi.php";
    $id_transaksi=$_GET['id'];
    mysqli_query($conn, "INSERT INTO kirim (id_petugas, id_transaksi, tgl_kirim) value ('".$_SESSION['id']."','".$id_transaksi."','".date('Y-m-d')."')");
    echo"<script>location='transaksi_petugas.php'</script>";
    }
?>