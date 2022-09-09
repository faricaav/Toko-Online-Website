<?php
    session_start();
    include 'koneksi.php'; 
    if($_SESSION['status_login_pelanggan'] != true){
        echo '<script>window.location="login_pelanggan.php"</script>'; 
    }
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

        <!--content-->
        <div class="bagian">
            <div class="kontainer">
                <div class="kotak">
                    <h4>Welcome, <?php echo $_SESSION['pelanggan']->nama ?>!</h4>
                </div>
            </div>
        </div>

        <!--search-->
        <div class="search">
            <div cass="container">
                <form action="produk.php">
                    <input type="text" name="search" placeholder="Search">
                    <input type="submit" name="cari" value="Search">
        </br>
        <!--new product-->
        <div class="section">
            <div class="container">
            <h3>Our Product</h3>
                <div class="box">
                    <?php
                        $produk=mysqli_query($conn, "SELECT* FROM produk  ORDER BY id_produk DESC");
                        if(mysqli_num_rows($produk)>0){
                            while($p=mysqli_fetch_array($produk)){
                    ?>
                        <a href="detail_produk.php?id=<?php echo $p['id_produk']?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['foto_produk']?>">
                                <p class="nama"><?php echo $p['nama_produk']?></p>
                                <p class="harga">Rp.<?php echo number_format ($p['harga'])?> </p>
                            </div>
                        </a>
                    <?php }} else { ?>
                        <p>Produk tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html> 