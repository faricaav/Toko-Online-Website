<?php
    session_start();
    include "koneksi.php";
    $produk=mysqli_query($conn,"SELECT* FROM produk WHERE id_produk = '".$_GET['id']."'");
    $p=mysqli_fetch_array($produk);
    $_SESSION['cart'][]=array('id_produk'=>$p['id_produk'],'nama_produk'=>$p['nama_produk'],'harga'=>$p['harga'],'qty'=>$_GET['qty']);
    echo"<script>location='keranjang.php'</script>";
?>