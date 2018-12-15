<?php  
	session_start(); //Dòng lệnh session_start() sẽ đăng ký phiên làm việc của người dùng trên Server, từ đó Server sẽ tạo ra một ID riêng không trùng lặp để nhận diện cho client hiện tại. Dòng này bắt buộc có.
	if($_SESSION["level"] == 2)
	{		
		require("templates/header.php");
		require("templates/footer.php"); 
	}
	else
	{
		ob_start(); 
		header('Location: ../index.php');
		ob_end_flush(); 
	}
?>
