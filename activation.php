<?php
include 'db.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=$_GET['code'];

	$sql = "SELECT uid FROM users WHERE activation='$code'";
	$kq = mysqli_query($conn, $sql);

	if(mysqli_num_rows($kq) > 0)
	{

	$sql = "SELECT uid FROM users WHERE activation='$code' and status='0'";
	$kt = mysqli_query($conn, $sql);

	if(mysqli_num_rows($kt) == 1)
	{
    $sql = "UPDATE users SET status='1' WHERE activation='$code'";
    $result = mysqli_query($conn, $sql);
    $msg="Your account is activated";	
    }
    else
    {
	$msg ="Your account is already active, no need to activate again";
    }

    }
    else
    {
	$msg ="Wrong activation code.";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP Email Verification Script</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
</head>
<body>
	<div id="main">
	<h2><?php echo $msg; ?></h2>
	</div>
</body>
</html>
