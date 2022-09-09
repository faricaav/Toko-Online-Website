<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>'; 
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, intial-scale=1">
        <title>Toko Online</title>
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/style_all.css">
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

        <!--content-->
        <div class="section">
            <div class="container">
                <h2>Product</h2>
                <div class="box">
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA PRODUK</th>
                                <th>DESKRIPSI</th>
                                <th>HARGA PRODUK</th>
                                <th>FOTO PRODUK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include "koneksi.php";
                                $qry_produk=mysqli_query($conn,"select * from produk");
                                
                                $no=0;
                                while($data_produk=mysqli_fetch_array($qry_produk)){
                                    $no++;?>
                                    <tr>
                                    <td><?=$no?></td><td><?=$data_produk['nama_produk']?></td>
                                    <td><?=$data_produk['deskripsi']?></td>
                                    <td>Rp<?=number_format($data_produk['harga'])?></td>
                                    <td align="center"><img src="produk/<?php echo $data_produk['foto_produk']?>" width="200px"></td>
                                    <td align="center"><a href="ubah-produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Change</a> 
                                    <a href="hapus_produk.php?id_produk=<?=$data_produk['id_produk']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-clear">Delete</a></td>
                                    </tr>
                                    
                            <?php
                            }
                            ?>
                        </tbody>
                        </table>
                        </br>
                        <td><a href="dashboard_petugas.php" class="btn btn-primary">Back</a></td>
                        <td><a href="tambah-produk.php" class="btn btn-success">Add Product</a></td>
                </div>
            </div>
        </div>
    </body>
</html>