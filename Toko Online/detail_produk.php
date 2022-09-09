<?php
    error_reporting(0); 
    session_start();
    include 'koneksi.php'; 
    if($_SESSION['status_login_pelanggan'] != true){
        echo '<script>window.location="login_pelanggan.php"</script>'; 
    }

    $produk=mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '".$_GET['id']."'"); 
    $p=mysqli_fetch_array($produk);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, intial-scale=1">
        <title>Toko Online</title>
        <link rel="stylesheet" type="text/css" href="css/style_sidebar.css">
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
                <h2>Product Details</h2>
                <div class="box">
                    <div class="col-2">
                        <img src="produk/<?php echo $p['foto_produk']?>" width="100%">
                    </div>
                    <div class="col-2">
                        <h3><?php echo $p['nama_produk']?></h3>
                        </br>
                        <h3>Rp.<?php echo number_format($p['harga'])?></h3>
                        </br>
                        <p><?php echo $p['deskripsi']?></p>
                        </br></br>
                        <td>Quantity : </td><td><input type="number" name="jumlah_beli" id="jumlah_beli" value="1"></td>
                        </br></br></br>
                        <td><a onclick="addtocart()" class="btn btn-success">Add to Cart</a></td>
                    </div>
                </div>
                </br>
                <td><a href="index.php" class="btn btn-primary">Back</a></td>
            </div>
        </div>
    </body>
</html> 
<script>
    //href="masukkan_keranjang.php?id=<?php echo $p['id_produk']?>&qty=<?php echo $_GET['jumlah_beli']?>"
    function addtocart(){
        var id=<?php echo $p['id_produk']?>;
        var qty=document.getElementById("jumlah_beli").value; 
        location="masukkan_keranjang.php?id="+id+"&qty="+qty;
    }
</script>