<?php
    session_start();
    include 'koneksi.php'; 
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>'; 
    }

    $produk=mysqli_query($conn, "select* from produk where id_produk='".$_GET['id_produk']."'"); 
    $dt_produk=mysqli_fetch_object($produk); 
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
                <h2>Change Product</h2>
                <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" name="nama_produk" placeholder="Nama Produk" class="input-control" value= "<?php echo $dt_produk->nama_produk?>" required>
                        <input type="text" name="deskripsi" placeholder="Deskripsi" class="input-control" value="<?php echo $dt_produk->deskripsi?>" required>
                        <input type="text" name="harga" placeholder="Harga" class="input-control" value= "<?php echo $dt_produk->harga?>"  required>
                        <img src="produk/<?php echo $dt_produk->foto_produk?>" width="200px">
                        <input type="hidden" name="gambar_produk" value="<?php echo $dt_produk->foto_produk?>">
                        <input type="file" name="foto_produk" class="input-control">
                        </br> 
                        <td><a href="data_produk.php" class="btn btn-clear">Cancel</a></td>
                        <input type="submit" name="submit" value="Change Product" class="input-btn">
                    </form>
                <?php
                if(isset($_POST['submit'])){
                    $nama_produk=$_POST['nama_produk'];
                    $deskripsi=$_POST['deskripsi'];
                    $harga=$_POST['harga'];
                    $gambar_produk=$_POST['gambar_produk']; 

                    $filename =$_FILES['foto_produk']['name'];
                    $tmp_name=$_FILES['foto_produk']['tmp_name'];

                    if($filename != ''){
                        $type1=explode('.',$filename);
                        $type2=$type1[1];
                        $tipe_diizinkan=array('jpg','jpeg','png');

                        if(!in_array($type2, $tipe_diizinkan)){
                            echo '<script>alert("format file tidak diizinkan")</script>';
                        }else{
                            unlink('./produk/'.$gambar_produk); 
                            move_uploaded_file($tmp_name,'./produk/'.$filename); 
                            $nama_gambar=$filename; 
                        }
                    }else{
                        $nama_gambar=$gambar_produk; 
                    }
                    
                    $update=mysqli_query($conn,"UPDATE produk SET nama_produk='".$nama_produk."', deskripsi='".$deskripsi."', harga='".$harga."', foto_produk='".$nama_gambar."'  WHERE id_produk ='".$dt_produk->id_produk."'") or die(mysqli_error($conn));
                    if($update){
                    echo "<script>alert('Sukses update produk');location.href='data_produk.php';</script>";
                    } else {
                    echo "<script>alert('Gagal update produk');location.href='ubah-produk.php?id_produk=".$id_produk."';</script>";
                    }
                } 
                ?>
                </div>
            </div>
        </div>
    </body>
</html>