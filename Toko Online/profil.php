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
                <h2>Profile</h2>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $p->nama_petugas ?>"required>
                        <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $p->username ?>" required>
                        <input type="text" name="level" placeholder="Level" class="input-control" value="<?php echo $p->level ?>" required>
                        <input type="submit" name="submit" value="Change Profile" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['submit'])){

                            $nama=$_POST['nama'];
                            $user=$_POST['user'];
                            $level=$_POST['level'];

                            $update=mysqli_query($conn, "UPDATE petugas SET nama_petugas='".$nama."', username='".$user."', level='".$level."' WHERE id_petugas='".$p->id_petugas."'");

                            if($update){
                                echo '<script>alert("Berhasil mengubah data")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'Gagal'.mysqli_error($conn); 
                            }
                        }
                    ?>
                </div>
                
                <h2>Change Password</h2>
                <div class="box">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="New Password" class="input-control" required>
                        <input type="password" name="pass2" placeholder="Confirm Password" class="input-control" required>
                        <input type="submit" name="ubah_password" value="Change Password" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['ubah_password'])){

                            $pass1=$_POST['pass1'];
                            $pass2=$_POST['pass2'];

                            if($pass2 != $pass1){
                                echo '<script>alert("Konfirmasi password tidak sesuai")</script>';
                            }else{
                                $update_pass=mysqli_query($conn, "UPDATE petugas SET password='".MD5($pass1)."' WHERE id_petugas='".$p->id_petugas."'");
                                
                                if($update_pass){
                                    echo '<script>alert("Berhasil mengubah password")</script>';
                                    echo '<script>window.location="profil.php"</script>';
                                }else{
                                    echo 'Gagal'.mysqli_error($conn); 
                                }
                            }
                        }
                    ?>
                </div>
                    </br>
                    </br>
                <td><a href="dashboard_petugas.php" class="btn btn-danger">Cancel</a></td>
                <td><a href="tambah-petugas.php" class="btn btn-success">Add Admin</a></td>

            </div>
        </div>
    </body>
</html>