<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login_pelanggan'] != true){
        echo '<script>window.location="login_pelanggan.php"</script>'; 
    }

    $query=mysqli_query($conn, "SELECT* FROM pelanggan WHERE id_pelanggan = '".$_SESSION['id_pelanggan']."'");
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

        <!--content-->
        <div class="section">
            <div class="container">
                <h2>Profile</h2>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $p->nama ?>"required>
                        <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $p->alamat ?>" required>
                        <input type="text" name="telp" placeholder="No. Telp" class="input-control" value="<?php echo $p->telp ?>" required>
                        <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $p->username ?>" required>
                        <input type="submit" name="submit" value="Change Profile" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['submit'])){

                            $nama=$_POST['nama'];
                            $user=$_POST['user'];
                            $alamat=$_POST['alamat'];
                            $telp=$_POST['telp']; 

                            $update=mysqli_query($conn, "UPDATE pelanggan SET nama='".$nama."', alamat='".$alamat."', telp='".$telp."', username='".$user."' WHERE id_pelanggan='".$p->id_pelanggan."'");

                            if($update){
                                echo '<script>alert("Berhasil mengubah data")</script>';
                                echo '<script>window.location="profil_pelanggan.php"</script>';
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
                                $update_pass=mysqli_query($conn, "UPDATE pelanggan SET password='".MD5($pass1)."' WHERE id_pelanggan='".$p->id_pelanggan."'");
                                
                                if($update_pass){
                                    echo '<script>alert("Berhasil mengubah password")</script>';
                                    echo '<script>window.location="profil_pelanggan.php"</script>';
                                }else{
                                    echo 'Gagal'.mysqli_error($conn); 
                                }
                            }
                        }
                    ?>
                </div>
                    </br>
                    </br>
                <td><a href="index.php" class="btn btn-danger">Cancel</a></td>

            </div>
        </div>
    </body>
</html>