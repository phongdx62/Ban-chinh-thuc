<?php

$msg='';
if(!empty($_POST['email']) && isset($_POST['email']) &&  !empty($_POST['password']) &&  isset($_POST['password']) )
{
	// username and password sent from Form
	$email=$_POST['email']; 
	$password=$_POST['password']; 

	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

	if(preg_match($regex, $email))
	{  
		$password=md5($password); // Encrypted password
		$activation=md5($email.time()); // Encrypted email+timestamp
		require("db.php");
		$sql = "SELECT uid FROM users WHERE email='$email'" or die("cau truy van sai");
		$kq = mysqli_query($conn, $sql);
		if(mysqli_num_rows($kq) == 0)
		{
			$sql = "INSERT INTO users(email,password,activation) VALUES('$email','$password','$activation')";
			$kt = mysqli_query($conn, $sql);

					 //goi thu vien
		    include('smtp/class.smtp.php');
		    include ("smtp/class.phpmailer.php"); 
		    include ("smtp/sendmail.php"); 
		    $title = 'Thu xac nhan';
		    $content = 'Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
		    $nTo = 'homangtrang';
		    $mTo = $email;
		    
		    //test gui mail
		    $mail = sendMail($title, $content, $nTo, $mTo);
		    if($mail==1)
		    	echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
		    else 
		    	echo 'Co loi!';
	

		}
	

	}
	else
	{
		$msg = '<font color="#cc0000">The email you have entered is invalid, please try again.</font>';  
	}

}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP Email Verification Script</title>
<link rel="stylesheet" href="style.css"/>
</head>

<body>
<div id="main">
<h1>PHP Email Verification Script</h1>

<form action="index.php" method="post">
<label>Email</label> <input type="text" name="email" class="input" autocomplete="off"/>
<label>Password </label><input type="password" name="password" class="input" autocomplete="off"/><br/>
<input type="submit" class="button button-primary" value="Registration" /> <span class='msg'><?php echo $msg; ?></span> 
</form>	
</div>
</body>
</html>