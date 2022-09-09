<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, intial-scale=1">
        <title>Login | Toko Online</title>
        <link rel="stylesheet" type="text/css" href="css/style_login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
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
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="user" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="pass" class="input">
            	   </div>
            	</div>
            	<a href="register_pelanggan.php">Register Account</a>
            	<input type="submit" name="submit" class="btn" value="Login">
            </form>
        </div>
            <?php
                if(isset($_POST['submit'])){
                    session_start();
                    include 'koneksi.php';

                    $user=mysqli_real_escape_string($conn, $_POST['user']);
                    $pass=mysqli_real_escape_string($conn, $_POST['pass']);

                        $cek1=mysqli_query($conn, "SELECT* FROM pelanggan WHERE username='".$user."' AND password='".MD5($pass)."'");
                        if (mysqli_num_rows($cek1)>0){
                            $pel = mysqli_fetch_object($cek1);
                            $_SESSION['status_login_pelanggan'] = true;
                            $_SESSION['pelanggan']=$pel;
                            $_SESSION['id_pelanggan']=$pel->id_pelanggan; 
                            echo '<script>window.location="index.php"</script>';
                        }else{
                            echo '<script>alert("Username atau password Anda salah!")</script>';
                        }
                }
            ?>
            <script type="text/javascript" src="main.js"></script>
        </div>
    </body>
</html>