<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang quản lý</title>

	<link rel="stylesheet" href="../public/core/css/all.min.css">
    <link rel="stylesheet" href="../public/core/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/core/css/style-admin.css">

	<script language="javascript">
		function show_confirm() {
			if(confirm("Bạn có thực sự muốn xóa không?"))
			{
				return true;
			}
			else
			{
				return false;
			}			
		}
	</script>
</head>
<body class="container">
	<div id="top">
		<h3>Xin chào Admin, <a href="../logout.php">Đăng xuất</a></h3>
	</div>
	<div id="menu" class="mt-3">
				<ul>
					<li><a href="list_user.php">Quản lý thành viên</a></li>
					<li><a href="list_music.php">Quản lý nhạc</a></li>
				</ul>
	</div>
	<div style="clear: left;"></div>
		
