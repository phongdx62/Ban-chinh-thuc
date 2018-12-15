<?php
	session_start();
    if($_SESSION["level"] == 1)
    {
    	require("templates/header.php");

		$err = array();
		$err["add"] = NULL;

		if(isset($_POST["ok"]))	
		{
			//stripslashes loại bỏ ký tự \ trước dấu '
			$song = addslashes(stripslashes($_POST["song"]));
			$singer = addslashes(stripslashes($_POST["singer"]));
			$musician = addslashes(stripslashes($_POST["musician"]));
			$country = addslashes(stripslashes($_POST["country"]));
			$style = addslashes(stripslashes($_POST["style"]));
			$new = addslashes(stripslashes($_POST["new"]));
			$best = addslashes(stripslashes($_POST["best"]));
			$topten = addslashes(stripslashes($_POST["topten"]));
			$img = addslashes(stripslashes($_POST["img"]));
			$mp3 = addslashes(stripslashes($_POST["mp3"]));

			if(isset($song) && isset($singer) && isset($musician) && isset($country) && isset($style) && isset($new) && isset($best) && isset($topten) && isset($img) && isset($mp3))
			{
				require("../public/library/database.php");
				$sql = "SELECT id FROM music WHERE song = '$song'";
				$data = new database();
				$data->query($sql);

				$num = $data->num_rows();
				echo $num;
				echo 1;
				if($data->num_rows()>0)
				{
					$err["add"] = "* Tên bài hát đã tồn tại";
				}
				else
				{
					$sql = "INSERT INTO music(song,
											  singer,
											  musician,
											  country,
											  style,
											  new,
											  best,
											  topten)	VALUES	
											  ('$song',
											   '$singer',
											   '$musician',
											   '$country',
											   '$style',
											   '$new',
											   '$best',
											   '$topten')";

					$data->query($sql);
					$err["add"] = "* Thêm bài hát thành công";					   	
				}					
				$data->disconnect();
			}
		}	
    } 
	else
	{
		ob_start(); 
		header('Location: ../index.php');
		ob_end_flush();
	}
?>	
	<form action="add_list_music.php" method="post">	
		<h2>Thêm bài hát</h2>
		<div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="song" placeholder="Tên bài hát" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="singer" placeholder="Tên ca sĩ" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="musician" placeholder="Tên nhạc sĩ" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="country" placeholder="Quốc gia" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="style" placeholder="Thể loại" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="new" placeholder="Bài hát mới" value required>
				<div></div>
			</div>	
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="best" placeholder="Những bài hát hay nhất" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="topten" placeholder="Top 10" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="img" placeholder="Đường dẫn hình ảnh" value required>
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="mp3" placeholder="Đường dẫn âm thanh" value required>
				<div></div>
			</div>
		<button style="height: 30px;" type="submit" name="ok">Thêm</button>
	</form>

	<div style="width: 500px; margin: 30px; text-align: center; color: red;">
		<?php  
			echo $err["add"];
		?>
	</div>

<?php  
	require("templates/footer.php");
?>
