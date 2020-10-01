<?php 
	session_start();
?>

<!DOCTYPE html>

<html>

<head>

	<title>Welcome Employee</title>

</head>

<body>

	<?php

		if(isset($_SESSION['ENAME']))
		{
			echo "<h1> Hello ".$_SESSION['ENAME']." Welcome <br /> </h1> <h2>You Have Successfully Looged In <br /> </h2> <br />";

			echo "<a href = 'logout.php?elogout' style = 'margin-left:100px; font-size:25px;'> Log-Out </a>";
		}
		else
		{
			header("location:index.php");
		}

	?>

</body>

</html>