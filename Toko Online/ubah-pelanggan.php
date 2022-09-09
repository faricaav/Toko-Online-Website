<?php
    session_start();
    include 'koneksi.php'; 
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>'; 
    }

    $pelanggan=mysqli_query($conn, "select* from pelanggan where id_pelanggan='".$_GET['id_pelanggan']."'"); 
    $dt_pelanggan=mysqli_fetch_object($pelanggan); 
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

    <body>
        <!--content-->
        <div class="section">
            <div class="container">
                <h2>Change Customer</h2>
                <div class="box">
                <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Pelanggan" class="input-control" value= "<?php echo $dt_pelanggan->nama?>" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $dt_pelanggan->alamat?>" required>
                        <input type="text" name="telp" placeholder="No. Telp" class="input-control" value="<?php echo $dt_pelanggan->telp?>" required>
                        <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $dt_pelanggan->username?>" required>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </br>
                        </br>
                        </br> 
                        <td><a href="data_pelanggan.php" class="btn btn-clear">Cancel</a></td>
                        <input type="submit" name="submit" value="Change Customer" class="input-btn">
                </form>
                <?php
                if(isset($_POST['submit'])){
                $nama=$_POST['nama'];
                $alamat=$_POST['alamat'];
                $telp=$_POST['telp'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                    if(empty($nama)){
                    echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tampil-pelanggan.php';</script>";
                    } else if(empty($alamat)){
                    echo "<script>alert('alamat tidak boleh kosong');location.href='tampil-pelanggan.php';</script>";
                    } else if(empty($telp)){
                        echo "<script>alert('no.telp tidak boleh kosong');location.href='tampil-pelanggan.php';</script>";
                    } else if(empty($username)){
                        echo "<script>alert('username tidak boleh kosong');location.href='tampil-pelanggan.php';</script>";
                    } else if(empty($password)){
                        echo "<script>alert('password telepon tidak boleh kosong');location.href='tampil-pelanggan.php';</script>";
                    } else {
                    include "koneksi.php"; 
                    $update=mysqli_query($conn,"update pelanggan set nama='".$nama."', alamat='".$alamat."', telp='".$telp."' , username='".$username."' , password='".MD5($password)."' where id_pelanggan ='".$dt_pelanggan->id_pelanggan."'") or die(mysqli_error($conn));
                        if($update){
                        echo "<script>alert('Sukses update pelanggan');location.href='data_pelanggan.php';</script>";
                        } else {
                        echo "<script>alert('Gagal update pelanggan');location.href='ubah-pelanggan.php';</script>";
                        }
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </body>
</html>
