<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, intial-scale=1">
        <title>Register | Toko Online</title>
        <link rel="stylesheet" type="text/css" href="css/style_login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> 
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    </head>
    <div class="container">
		<div class="img">
			<img src="img/web shopping.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/profile pic.svg">
				<h2 class="title">Welcome</h2>
                <div class="input-div one">
           		   <div class="i">
						<i class='bx bxs-rename' ></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nama</h5>
           		   		<input type="text" name="nama" class="input">
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
						<i class='bx bxs-map' ></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Alamat</h5>
           		   		<input type="text" name="alamat" class="input">
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
						<i class='bx bxs-phone' ></i>
           		   </div>
           		   <div class="div">
           		   		<h5>No. Telp</h5>
           		   		<input type="text" name="telp" class="input">
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
            	<input type="submit" name="submit" class="btn" value="Register">
            </form>
        </div>
        <?php
            if($_POST){
                $nama=$_POST['nama'];
                $alamat=$_POST['alamat'];
                $telp=$_POST['telp'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                    if(empty($nama)){
                        echo "<script>alert('nama tidak boleh kosong');location.href='register_pelanggan.php';</script>";
                    } else if(empty($alamat)){
                        echo "<script>alert('alamat tidak boleh kosong');location.href='register_pelanggan.php';</script>";
                    } else if(empty($telp)){
                        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='register_pelanggan.php';</script>";
                    } else if(empty($username)){
                        echo "<script>alert('username tidak boleh kosong');location.href='register_pelanggan.php';</script>";
                    } else if(empty($password)){
                        echo "<script>alert('password tidak boleh kosong');location.href='register_pelanggan.php';</script>";
                    } else {
                        include "koneksi.php";
                        $insert=mysqli_query($conn,"INSERT INTO pelanggan (nama, alamat, telp, username, password) VALUES ('".$nama."','".$alamat."','".$telp."','".$username."','".md5($password).")");
                        if($insert){
                            echo "<script>alert('Akun anda berhasil terdaftar');location.href='login_pelanggan.php';</script>";
                        } else {
                            echo "<script>alert('Gagal menambahkan akun anda');location.href='register_pelanggan.php';</script>";
                        }
                    }
            }
        ?>
            <script type="text/javascript" src="main.js"></script>
        </div>
    </body>
</html>