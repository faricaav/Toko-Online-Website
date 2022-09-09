<?php
if($_GET['id_produk']){
    include "koneksi.php";
    $produk=mysqli_query($conn, "select foto_produk from produk where id_produk='".$_GET['id_produk']."'");
    $p=mysqli_fetch_object($produk);
    unlink('./produk/'.$p->foto_produk);  
    $qry_hapus=mysqli_query($conn,"delete from produk where id_produk='".$_GET['id_produk']."'");
    if($qry_hapus){
    echo "<script>alert('Sukses hapus produk');location.href='data_produk.php';</script>";
} else {
    echo "<script>alert('Gagal hapus produk');location.href='data_produk.php';</script>";
}
}
?>