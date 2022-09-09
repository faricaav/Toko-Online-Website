<?php
    session_start();
    include 'koneksi.php';
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
            <h2>Cart</h2>
                <div class="box">
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(@$_SESSION['cart'] != null){
                            foreach(@$_SESSION['cart'] as $list_produk => $item_produk):?>
                            <?php 
                                $total=$item_produk['harga'] * $item_produk['qty'];
                            ?>
                            <tr>
                                <td><?=($list_produk+1)?></td>
                                <td><?=$item_produk['nama_produk']?></td>
                                <td><?=$item_produk['qty']?></td>
                                <td>Rp.<?php echo number_format($total)?></td>
                                <td align="center"><a href="checkout.php" class="btn btn-success">Check Out</a>
                                <a href="hapus_cart.php?id=<?=$list_produk?>" class="btn btn-clear">Clear</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <?php 
                            }
                            $var="Tidak ada barang dalam keranjang Anda";
                            if(@$_SESSION['cart'] == null){
                        ?>
                        <tr>
                            <td align="center" colspan=5><?php echo $var; 
                            } ?></td>
                        </tr>
                        </table>
                        </br>
                        <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </div>
    </body>
</html>