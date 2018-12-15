<?php 
	function __autoload($file_name)
	{
		require('model/$file_name/$file_name.php');
	}
?>