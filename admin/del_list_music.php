<?php 
	include("../models/m_music.php");
	$id = addslashes(stripslashes($_GET["id"]));
	$music = new music();
	$music->m_del_music($id);
	$music->disconnect();
	ob_start(); 
	header('Location: list_music.php');
	ob_end_flush(); 
?>