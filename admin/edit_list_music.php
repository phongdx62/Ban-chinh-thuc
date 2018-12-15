<?php 
	session_start();
    if($_SESSION["level"] == 2)
    {
    	require("templates/header.php");
    	include("../models/m_music.php");
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
				$music = new music();
				$music->m_edit_music($id, $song, $singer, $musician, $country, $style, $new, $best, $topten);
				$music->disconnect();
				ob_start();
				header('Location: list_music.php');
				ob_end_flush();
			}
		}

		$music = new music();
		$row = $music->m_get_music($id);
    }
	else
	{		
		ob_start(); 
		header('Location: ../index.php');
		ob_end_flush();
	}					   								  	
	
	require("templates/table_edit_music.php"); 
	$music->disconnect();
	require("templates/footer.php");
?>