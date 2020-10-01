<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Registration</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
 
  <link rel="stylesheet" type="text/css" href="css/skillix.css">
</head>


<body>
	<div class="container-fluid">
		<div class="row"   style="padding-top: 110px;">
			<div class="col-sm-3">
				
			</div>

			
		<div class="col-sm-6" style="background-color: lightgrey; border-radius: 10px; " >
			<h6 style="color: black; padding-left: 10px; padding-top: 10px;"><i class="fa fa-user-circle-o  fa-2x" aria-hidden="true"><b> 
			Register Here...</b></h6></i>
		<form style=" padding-top: 4vh; " method="POST" action="#" >
		
		<div class="form-group">
		<b><label for="formGroupExampleInput" >Name</label></b>
		<input type="text"  name="username" class="form-control  " id="inputbtn"  placeholder="Enter Name" required oninvalid="this.setCustomValidity('Please Enter your Name...!!!')" oninput="this.setCustomValidity('')">
		</div>
		 
		<div class="form-group">
		<b><label for="formGroupExampleInput" >Contact Number</label></b>
		<input type="Number"  name="enum" class="form-control  " id="inputbtn"  placeholder="Enter Contact Number" pattern="[0-9]{10}" minlength="10" maxlength="10"
		required oninvalid="this.setCustomValidity('Please Provide a contact number which has Whatssapp account...!!!')" oninput="this.setCustomValidity('')">
		</div>
		<div class="form-group">
		<b><label for="exampleInputEmail1">Email Address</label></b>
		<input type="email" name="email" class="form-control" id="inputbtn" placeholder="Enter Email" aria-describedby="emailHelp" required oninvalid="this.setCustomValidity('Please Provide E-Mail ID...!!!')" oninput="this.setCustomValidity('')">
		
		</div>


 		<div class="form-group ">
	 	<b><label for="inputPassword3" >Password</label></b>
		 <b><input type="password" class="form-control " placeholder="Enter Password " id="inputPassword3epwd"  name="epwd"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="border-radius: 10px;" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="this.setCustomValidity('Please Enter Password in Correct Foramt...!!!')" oninput="this.setCustomValidity('')">
				  </div>
		 <div class="form-group "> 
	 	<b><label for="inputPassword3" > Confirm Password</label></b>
		 <input type="password" class="form-control " placeholder="Confirm Password " id="inputPassword3epwd"  name="c_pwd"  required style="border-radius: 10px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password did not matched yet..." >
				  </div>

			<div class="form-group ">
				    <b><label > Your Working Field :</label><br><br></b>
				<input type="radio" id="Techinical" name="field" value="Techinical Field"  required oninvalid="this.setCustomValidity('Please Select your Working field...!!!')" oninput="this.setCustomValidity('')">
				<label>Techinical</label></b>	
				<input type="radio" id="Non-Techinical" name="field" value="Artistary">
			<b><label>Non-Techinical</label><br><br></b>
			</div>
			<div class="form-group" >
				   <b> <label for="formGroupExampleInput">Skill :</label></b>
				    <input type="text" name="eskill" class=" form-control " id="formGroupExampleInput " placeholder="Enter Your Skill" required  style="border-radius: 10px;" oninvalid="this.setCustomValidity('Please Enter your Skill...!!!')" oninput="this.setCustomValidity('')">   
             
				  </div>


		
		 <div class="form-group" >
				  <b><label> Are You... ? </label><br></b>
				<input type="radio" id="Fresher" name="rdemp" value="Fresher" >
				<b><label>Fresher</label>	</b>
			 	<input type="radio" id="Experienced" name="rdemp" value="Experienced Person">
				<b><label>Experienced</label><br></b>
			</div>

		
 <div class="form-group" >
		<b><label>Upload Your Resume :</label><br><br></b>
		<input type="file"  name="eresume" required
				oninvalid="this.setCustomValidity('Please upload your Resume for better communications with other...!!!')" oninput="this.setCustomValidity('')"style=" width: 80%;"><br><br>
				</div>
		<button type="submit"  name="submit" class="btn btn-danger" style="padding-left: 60px; padding-right: 60px;  margin-bottom:20px;  border-radius: 30px;">Submit</button>
		<a href="register.php"  class="btn btn-danger" style="padding-left: 60px; padding-right: 60px;  margin-bottom:20px;  border-radius: 30px;">Back</button></a> 
<?php 

// including database coneectivity file

include "db.php";

if (isset($_POST['submit'])) 
{
	$Employee_Name = $_POST['username'];
	$Number = $_POST['enum'];
	$Email = $_POST['email'];
	$Password = $_POST['epwd'];
	$c_pwd = $_POST['c_pwd'];
	$Field = $_POST['field'];
	$Skill = $_POST['eskill'];
	$Status = $_POST['rdemp'];
	$Resume = $_POST['eresume'];

    // logic of unique email id
    if ($dbconnect -> connect_errno) 
    {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }

    $get_user = mysqli_query($dbconnect,"SELECT * FROM employee_registration where 
    		Email = '$Email'");

 	if(mysqli_num_rows($get_user)>0)
 	{
 	?>
	 	<script type="text/javascript">
	 		alert("E-Mail is Already Submitted, Please Try Another E-Maill...!!!");
	 	</script>
 	<?php
 	}

 	// Confirm Password Verification
    else if ($Password != $c_pwd) 
    {
        echo "<script> alert('Password is not matched Correctly to Confirm Password Field, Please Try Agin...!!!'); </script>";
    }
 	else
 	{
		// final query after all the validations
 		$sql= "insert into employee_registration(Employee_name, Number, Email, Password, Field, Skill, Status, Resume) values('$Employee_Name' , '$Number' , '$Email' , '$Password' , '$Field' , '$Skill' , '$Status' , '$Resume')";
	
        
        if ($dbconnect->query($sql) === TRUE) 
        {
		// showing feedback messages
            echo "<p style='color:green;padding-left:10px;font-family: Consolas;font-weight:bold;font-size:20px;'> Registration Successfully Completed. <a href='login.php'> Click Here to Login </a> </p>";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $dbconnect->error;
        }

 	}	

}

?>
</form>

		</div>
		</div>	
	</div>

</body>
</html>

<?php include 'footer.php'; ?>
