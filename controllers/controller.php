<?php  
	if (isset($_GET['action'])) 
	{
		switch ($_GET['action']) 
		{
			case 'login': include('controllers/user/c_login.php');
				break;
		}
	}
?>