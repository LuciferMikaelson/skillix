<?php include 'header.php'; ?>
<html>
<head>
  <title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
 
  <link rel="stylesheet" type="text/css" href="css/skillix.css">
</head>


<body>
	<div class="container-fluid">
		<div class="row"   style="padding-top: 110px;">
			<div class="col-sm-3">				
			</div>

			
		<div class="col-sm-6" style="background-color: lightgrey; border-radius: 10px; " >
			<h6 style="color: black; padding-left: 10px; padding-top: 10px;"><i class="fa fa-phone  fa-2x" aria-hidden="true"><b> Get in Touch with us</b></h6></i>
<form style=" padding-top: 4vh; " method="POST" action="contactform.php" >
		
		<div class="form-group">
		<b><label for="formGroupExampleInput" >Name</label></b>
		<input type="text"  name="username" class="form-control  " id="inputbtn"  placeholder="Enter Name" required>
		</div>
		
		
		<div class="form-group">
		<b><label for="exampleInputEmail1">Email address</label></b>
		<input type="email" name="email" class="form-control" id="inputbtn" placeholder="Enter Email" aria-describedby="emailHelp" required>
		
		</div>
		<div class="form-group">
		<b><label for="formGroupExampleInput">Subject</label></b>
		<input type="text"  name="subject" class="form-control " id="inputbtn"  placeholder="Enter Subject" required>
		</div>

		<div class="form-group">
		<b><label for="exampleFormControlTextarea1">Meassge</label></b>
		<textarea class="form-control "id="inputbtn" name="message" placeholder="Write Your Meassge Here...."  rows="3" required></textarea>
		</div>
		<button type="submit"  name="submit" class="btn btn-danger" style="padding-left: 60px; padding-right: 60px;  margin-bottom:20px;  border-radius: 30px;">Submit</button>
		</form>

		</div>
		</div>		
	
	</div>	

</body>
</html>

  <?php include 'footer.php'; ?>
 
