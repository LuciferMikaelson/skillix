<?php

$dbconnect = mysqli_connect('localhost', 'root','','skillix');//Localhost, Id, Password

// error if not connected to database
if(mysqli_connect_errno($dbconnect))
{
	echo"Fail to database connect";
}

?>
