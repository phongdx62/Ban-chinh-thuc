<?php 
	include("../models/m_user.php");
	$userid = addslashes(stripslashes($_GET["userid"]));
	$user = new user();
	$user->m_del_user($userid);
	$user->disconnect();
	ob_start(); 
	header('Location: list_user.php');
	ob_end_flush(); 
?>