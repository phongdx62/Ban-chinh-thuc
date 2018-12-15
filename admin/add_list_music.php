<?php
	session_start();
    if($_SESSION["level"] == 2)
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
			
			if(isset($song) && isset($singer) && isset($musician) && isset($country) && isset($style) && isset($new) && isset($best) && isset($topten))
			{
				include("../models/m_music.php");
				$music = new music();
				$result = $music->m_add_music($song, $singer, $musician, $country, $style, $new, $best, $topten);	
				if($result == 'fail')
				{
					$err["add"] = "* Tên bài hát đã tồn tại";					
				}
				else
				{
					$err["add"] = "* Thêm bài hát thành công";
				}
				$music->disconnect();
			}
		}	
    } 
	else
	{
		ob_start(); 
		header('Location: ../index.php');
		ob_end_flush();
	}
	
	require("templates/table_add_music.php");
?>	
	
	<div style="width: 500px; margin: 30px; text-align: center; color: red;">
		<?php  
			echo $err["add"];
		?>
	</div>

<?php  
	require("templates/footer.php");
?>
