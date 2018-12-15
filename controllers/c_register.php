<?php 
	if(isset($_POST["ok"]))
	{
		$f = addslashes(stripslashes($_POST["fname"]));
		$l = addslashes(stripslashes($_POST["lname"]));
		$u = addslashes(stripslashes($_POST["user"]));
		$e = addslashes(stripslashes($_POST["email"]));
		$p = addslashes(stripslashes($_POST["pass"]));
	}

	$err = array();	
	$err["register"] = $err["re_pass"] = NULL;

	if(isset($f) && isset($l) && isset($u) && isset($e) && isset($p))
	{	
	  	if($p != $_POST["re_pass"])
		{
			$err["re_pass"] = "<p style='color: red;'>* Bạn nhập lại mật khẩu không đúng</p>";
		}
  		else
  		{
  			require("../models/m_user.php");
			$user = new user();
			$user->set_fname($f);
			$user->set_lname($l);
			$user->set_email($e);
			$user->set_name($u);
			$user->set_pass($p);
			$register = $user->m_register();
			if($register == 'fail')
			{
				$err["register"] = "<p style='color: red;'>* Tài khoản đã tồn tại</p>";
			}
			else
			{
				$err["register"] = "<p style='color: blue;'>* Đăng kí thành công, <a href='../../views/user/login.php' style='color: #FF00FF'>Đăng nhập</a> để vào website<br /></p>";
			}								
	  	}	  												    
	}
	require("../register.php");				 		
?>
