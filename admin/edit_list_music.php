<?php 
	session_start();
	require("../../public/library/database.php");
    if($_SESSION["level"] == 1)
    {
    	require("templates/header.php");

		$id = addslashes(stripslashes($_GET["id"]));

		if(isset($_POST["ok"]))
		{
			$song = addslashes(stripslashes($_POST["song"]));
			$singer = addslashes(stripslashes($_POST["singer"]));
			$musician = addslashes(stripslashes($_POST["musician"]));
			$country = addslashes(stripslashes($_POST["country"]));
			$style = addslashes(stripslashes($_POST["style"]));
			$new = addslashes(stripslashes($_POST["new"]));
			$best = addslashes(stripslashes($_POST["best"]));
			$topten = addslashes(stripslashes($_POST["topten"]));

			if(isset($song) && isset($singer) && isset($musician) && isset($country) && isset($style) && isset($new) && isset($best) && isset($topten))
			{
				$sql = "UPDATE music SET song = $song, singer = $singer, musician = $musician, country = $country, style = $style, new = $new, best = $best, topten = $topten WHERE id = $id";
				$data = new database();
				$data->query($sql);
				$data->disconnect();
				header('Location: list_music.php');
				ob_end_flush();
			}
		}

		$sql = "SELECT id, song, singer, musician, country, style, new, best, topten FROM music WHERE id = $id";
		$data = new database();
		$data->query($sql);
		$row = $data->fetch_assoc();
    }
	else
	{		
		ob_start(); 
		header('Location: ../index.php');
		ob_end_flush();
	}					   								  	
?>	

	<form action="edit_list_music.php?id=<?php echo $id; ?>" method="post">	
		<h2>Sửa thông tin bài hát</h2>
		<div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="song" placeholder="Tên bài hát" value="<?php echo $row['song']; ?>" required>
				<div style="color: #FF33FF;">Tên bài hát</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="singer" placeholder="Tên ca sĩ" value="<?php echo $row['singer']; ?>" required>
				<div style="color: #FF33FF;">Tên ca sĩ</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="musician" placeholder="Tên nhạc sĩ" value="<?php echo $row['musician']; ?>" required>
				<div style="color: #FF33FF;">Tên nhạc sĩ</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="country" placeholder="Quốc gia" value="<?php echo $row['country']; ?>" required>
				<div style="color: #FF33FF;">Quốc gia</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="style" placeholder="Thể loại" value="<?php echo $row['style']; ?>" required>
				<div style="color: #FF33FF;">Thể loại</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="new" placeholder="Bài mới" value="<?php echo $row['new']; ?>" required>
				<div style="color: #FF33FF;">Bài mới</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="best" placeholder="Hay nhất" value="<?php echo $row['best']; ?>" required>
				<div style="color: #FF33FF;">Hay nhất</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="topten" placeholder="Top 10" value="<?php echo $row['topten']; ?>" required>
				<div style="color: #FF33FF;">Top 10</div>
			</div>	
		<button style="height: 30px;" type="submit" name="ok">Sửa</button>
	</form>
	
<?php  
	$data->disconnect();
	require("templates/footer.php");
?>