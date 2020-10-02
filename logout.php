<?php 
	session_start();

	if(isset($_GET['clogout']))
	{
		session_destroy();
		header("location:index.php");
	}else_if(isset($_GET['elogout']))
	{
			session_destroy();
			header("location:index.php");
	}else{
		header("location:index.php");
	}
?>
