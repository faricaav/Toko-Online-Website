<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>'; 
    }

    $query=mysqli_query($conn, "SELECT* FROM petugas WHERE id_petugas = '".$_SESSION['id']."'");
    $p = mysqli_fetch_object($query); 
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
                <h2>Add Admin</h2>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama_petugas" placeholder="Nama Petugas" class="input-control" required>
                        <input type="text" name="username" placeholder="Username" class="input-control" required>
                        <input type="text" name="level" placeholder="Level" class="input-control" required>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </br>
                        </br>
                        </br>
                        <td><a href="profil.php" class="btn btn-clear">Cancel</a></td>
                        <input type="submit" name="submit" value="Add Admin" class="input-btn">
                    </form>

                    <?php
                        if($_POST){
                            $nama_petugas=$_POST['nama_petugas'];
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $level=$_POST['level'];
                            if(empty($nama_petugas)){
                                echo "<script>alert('nama petugas tidak boleh kosong');location.href='tambah-petugas.php';</script>";
                            } else if(empty($username)){
                                echo "<script>alert('username tidak boleh kosong');location.href='tambah-petugas.php';</script>";
                            } else if(empty($password)){
                                echo "<script>alert('password tidak boleh kosong');location.href='tambah-petugas.php';</script>";
                            } else if(empty($level)){
                                echo "<script>alert('level tidak boleh kosong');location.href='tambah-petugas.php';</script>";
                            } else {
                                include "koneksi.php";
                                $insert=mysqli_query($conn,"insert into petugas (nama_petugas, username, password, level) value ('".$nama_petugas."','".$username."','".md5($password)."','".$level."')");
                                if($insert){
                                    echo "<script>alert('Sukses menambahkan petugas');location.href='profil.php';</script>";
                                } else {
                                    echo "<script>alert('Gagal menambahkan petugas');location.href='tambah-petugas.php';</script>";
                                }
                            }
                        }
                    ?>
                    
            </div>
        </div>
    </body>
</html>