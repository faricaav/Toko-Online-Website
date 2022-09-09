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
                    <a href="dashboard_petugas.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="links_name">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="profil.php">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Profile</span>
                    </a>
                </li>

                <li>
                    <a href="data_pelanggan.php">
                    <i class='bx bx-data' ></i>
                    <span class="links_name">Customer Data</span>
                    </a>
                </li>

                <li>
                    <a href="data_produk.php">
                    <i class='bx bx-folder' ></i>
                    <span class="links_name">Product Data</span>
                    </a>
                </li>

                <li>
                    <a href="transaksi_petugas.php">
                    <i class='bx bx-transfer' ></i>
                    <span class="links_name">Shipment</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        </header>

<div class="section">
    <div class="container">
    <h2>Shipment</h2>
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
            $qry_histori=mysqli_query($conn,"SELECT * FROM transaksi ORDER BY id_transaksi DESC");
            $no=0;
            while($dt_histori=mysqli_fetch_array($qry_histori)){
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
        
                $button_bayar="<a href='kirim.php?id=".$dt_histori['id_transaksi']."' class='btn btn-success' onclick='return confirm(\"Apakah anda yakin untuk mengirim?\")'>Kirim";
                } else {
        
                $status_bayar="<label class='alert alert-danger'>Belum bayar</label>";
        
                $button_bayar="Belum dapat dikirim";
            }

            $qry_cek_kirim=mysqli_query($conn,"SELECT * FROM kirim WHERE id_transaksi ='".$dt_histori['id_transaksi']."'");
            if(mysqli_num_rows($qry_cek_kirim)>0){
                $dt_kirim=mysqli_fetch_array($qry_cek_kirim);
                $status_kirim="<label class='alert alert-success'>Sudah kirim</label>";
        
                $button_bayar="Sudah dikirim";
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
        <a href="dashboard_petugas.php" class="btn btn-primary">Back</a>
    </div>
</div>
</body>
</html> 