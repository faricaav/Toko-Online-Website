<?php
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        mysqli_query($conn,"INSERT INTO transaksi (id_pelanggan, tgl_transaksi) VALUE ('".$_SESSION['id_pelanggan']."','".date('Y-m-d')."')");

        $id=mysqli_insert_id($conn);
        foreach ($cart as $list_produk => $item_produk) {
            $total=$item_produk['harga'] * $item_produk['qty']; 
            mysqli_query($conn,"INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal) VALUE ('".$id."','".$item_produk['id_produk']."','".$item_produk['qty']."','".$total."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda telah berhasil checkout");location.href="histori_pembelian.php"</script>';
    }
?>