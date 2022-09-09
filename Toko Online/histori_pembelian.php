<?php
    session_start(); 
    include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, intial-scale=1">
        <title>Toko Online</title>
        <link rel="stylesheet" type="text/css" href="css/style_all.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <div class="sidebar">
            <div class="logo_content">
                <div class="logo">
                <i class='bx bx-store-alt' ></i>
                    <div class="logo_name">Toko Online</div>
                </div>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="index.php">
                    <i class='bx bx-home-alt' ></i>
                    <span class="links_name">Home</span>
                    </a>
                </li>
                
                <li>
                    <a href="profil_pelanggan.php">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Profile</span>
                    </a>
                </li>

                <li>
                    <a href="keranjang.php">
                    <i class='bx bx-cart' ></i>
                    <span class="links_name">Cart</span>
                    </a>
                </li>

                <li>
                    <a href="histori_pembelian.php">
                    <i class='bx bx-transfer' ></i>
                    <span class="links_name">Purchase</span>
                    </a>
                </li>

                <li>
                    <a href="logout_pelanggan.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        </header>

<div class="section">
    <div class="container">
    <h2>History</h2>
        <div class="box">
        <table border="1" cellspacing="0" class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal Checkout</th>
                <th>Nama Produk</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $qry_histori=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_pelanggan=".$_SESSION['id_pelanggan']." ORDER BY id_transaksi DESC");
            $no=0;
            while($dt_histori=mysqli_fetch_array($qry_histori)){
                if($dt_histori['id_transaksi'!=null]){
            $no++;
            $produk_checkout="<ol>";
            $produk=mysqli_query($conn,"SELECT* FROM detail_transaksi JOIN produk ON produk.id_produk=detail_transaksi.id_produk WHERE id_transaksi =".$dt_histori['id_transaksi']);
            while($p=mysqli_fetch_array($produk)){
                if($p['id_produk']!=null){
                    $produk_checkout.=$p['nama_produk'];
                }
            }
            $produk_checkout.="</ol>";
            $qry_cek_bayar=mysqli_query($conn,"SELECT * FROM bayar WHERE id_transaksi ='".$dt_histori['id_transaksi']."'");
            if(mysqli_num_rows($qry_cek_bayar)>0){
                $dt_bayar=mysqli_fetch_array($qry_cek_bayar);
                $status_bayar="<label class='alert alert-success'>Sudah bayar</label>";
        
                $button_bayar="<a href='hapus_histori.php?id=".$dt_histori['id_transaksi']."' class='btn btn-clear'><strong>X</strong></a>";
                } else {
        
                $status_bayar="<label class='alert alert-danger'>Belum bayar</label>";
        
                $button_bayar="<a href='bayar.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning' onclick='return confirm(\"Apakah anda yakin untuk membayar?\")'>Bayar</a>";
                }
            }
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$dt_histori['tgl_transaksi']?></td>
                <td><?=$produk_checkout?></td>
                <td align="center"><?=$status_bayar?></td>
                <td align="center"><?=$button_bayar?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
        </br>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
</div>
</body>
</html> 