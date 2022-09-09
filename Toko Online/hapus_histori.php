<?php
    include "koneksi.php"; 
    session_start();
    $qry_hapus=mysqli_query($conn,"delete from transaksi where id_transaksi='".$dt_histori['id_transaksi']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus histori transaksi');location.href='histori_pembelian.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus produk');location.href='histori_pembelian.php';</script>";
    }
?>