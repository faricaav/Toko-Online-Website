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
                <h2>Customer</h2>
                <div class="box">
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA PELANGGAN</th>
                                <th>ALAMAT</th>
                                <th>NO. TELP</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include "koneksi.php";
                            $qry_pelanggan=mysqli_query($conn,"select * from pelanggan");
                            
                            $no=0;
                            while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){
                                $no++;?>
                                <tr>
                                <td><?=$no?></td><td><?=$data_pelanggan['nama']?></td>
                                <td><?=$data_pelanggan['alamat']?></td>
                                <td><?=$data_pelanggan['telp']?></td>
                                <td align="center"><a href="ubah-pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success">Change</a> 
                                <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-clear">Delete</a></td>
                                </tr>
                            
                            <?php
                            }
                            ?>
                        </tbody>
                        </table>
                        </br>
                        <td><a href="dashboard_petugas.php" class="btn btn-primary">Back</a></td>
                        <td><a href="tambah-pelanggan.php" class="btn btn-success">Add Customer</a></td>
                </div>
            </div>
        </div>
    </body>
</html>