<?php 
	session_start();

	if(isset($_GET['clogout']))
	{
		session_destroy();
		header("location:index.php");
	}

	if(isset($_GET['elogout']))
	{
			session_destroy();
			header("location:index.php");
	}
?>