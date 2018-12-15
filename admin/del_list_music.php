<?php 
	require("../../public/library/database.php");
	$id = addslashes(stripslashes($_GET["id"]));

	$sql = "DELETE FROM music WHERE id = $id";
	$data = new database();
	$data->query($sql);
	$data->disconnect();
	ob_start(); 
	header('Location: list_music.php');
	ob_end_flush(); 	
?>