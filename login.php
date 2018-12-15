<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./public/core/css/all.min.css">
    <link rel="stylesheet" href="./public/core/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/core/css/style.css">   
    <link rel="stylesheet" href="./public/core/css/style-login.css">

	<title>Trang đăng nhập</title>

</head>
<body class="text-center">

	
	<form action="./controllers/c_login.php" method="post" class="form-signin">
	
		<?php  
			if(isset($err))
			{
				echo $err;
			}
			else
			{
				echo"<img class='mb-3' src='./public/core/image/login.png'  width='158' height='65'>";
				echo "<h1 class='h3 mb-3 font-weight-normal'>Đăng nhập</h1>";
			}
		?>	

		<label for="inputEmail" class="sr-only">Tài khoản</label>
		<input type="text" class="form-control is-valid" id="username" name="user" placeholder="Tài khoản" required>
		<label for="inputPassword" class="sr-only">Mật khẩu</label>
		<input type="password" id="inputPassword" name="pass" class="form-control is-valid" placeholder="Mật khẩu" required >
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me">
				Ghi nhớ
			</label>
		</div>
		<button class="btn btn-lg btn-success btn-block mb-2" type="submit" name="ok">Đăng nhập</button>
		<a class="register" href="./register.php">Đăng ký ngay</a>
		<p class="mt-4 mb-3 text-muted" style="font-size: 15px; opacity: .8;">Copyright 2018-2019</p>

	</form>

	
	<div class="go-home fixed-bottom" style="bottom: 1rem; left: 94%;">
	    <a href="./index.php"><i class="fas fa-home fa-3x " style="color: #3ea24c;"></i></a>
	</div>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   	<script src="./public/core/js/jquery-3.3.1.slim.min.js"></script>
	<script src="./public/core/js/popper.min.js"></script>
	<script src="./public/core/js/bootstrap.min.js"></script>
	<script src="./public/core/js/main.js"></script>
</body>
</html>   
