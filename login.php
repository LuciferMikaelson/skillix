<?php include 'header.php'; ?>

<?php 
  
// PHP CODE FOR AUTHENTICATION EMPLOYEE AND STUDENT
  require_once('db.php');

  session_start();

  if(isset($_POST['elogin']))
  {
    //checking username and password in our database
      $query = "SELECT * FROM employee_registration WHERE Email = '".$_POST['eemail']."' AND Password = '".$_POST['epassword']."' ";

    //executing the above query
      $execute = mysqli_query($dbconnect, $query);

    //checking either query is executed or not

      if(mysqli_fetch_assoc($execute))
      {
        $_SESSION['ENAME'] = $_POST['eemail'];

        header("location:welcome_employee.php");
      }
      else
      {
        echo "<script> alert('Oops...!!! Invalid Username or Password...!!! Please Try Agian...!!!'); </script>";
        
      }
  }

  else
  {
    echo "Oops...!!! Something Went Wrong Please Try Agian";
  }
?>



<?php 
  
// PHP CODE FOR AUTHENTICATION OF COMPANY
  require_once('db.php');

  //session_start();

  if(isset($_POST['clogin']))
  {
    //checking username and password in our database
      $query = "SELECT * FROM company_registration WHERE Email = '".$_POST['cemail']."' AND Password = '".$_POST['cpassword']."' ";

    //executing the above query
      $execute = mysqli_query($dbconnect, $query);

    //checking either query is executed or not

      if(mysqli_fetch_assoc($execute))
      {
        $_SESSION['CNAME'] = $_POST['cemail'];

        header("location:welcome_company.php");
      }
      else
      {
        echo "<script> alert('Oops...!!! Invalid Username or Password...!!! Please Try Agian...!!!'); </script>";
      }
  }

  else
  {
    echo "Oops...!!! Something Went Wrong Please Try Agian";
  }
  
?>


<?php 

// PHP CODE FOR FORGOT PASSWORD FOR EMPLOYEE AND STUDENT SECTION

  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

  require_once("db.php");

  if(isset($_POST['esendmail']))
  {
    $email = $_POST['efemail'];

    // query for checking that email exist in our system or not
    $query = "SELECT * FROM employee_registration WHERE Email = '".$email."'";

    // executing the query
    $execute = mysqli_query($dbconnect, $query);

    // check how many numbers of rows are fetched from executing above query
    $count = mysqli_num_rows($execute);

    if($count > 0)
    {
      // query for fetching Password from above entered email
      $query1 = "SELECT * FROM employee_registration WHERE Email = '".$email."'";

      // executing the above query
      $execute1 = mysqli_query($dbconnect, $query1);
      
      // getting result of executed query as an array
      $pass = mysqli_fetch_array($execute1);
      
      // SENDING MAIL PART
      // Load Composer's autoloader
      require 'vendor/autoload.php';

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try 
      {
          //Server settings
          $mail->SMTPDebug = 0;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'skillix007@gmail.com';                     // SMTP username
          $mail->Password   = '$K!ll!x@007';                               // SMTP password
          $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('skillix007@gmail.com', 'SKILLIX');
          $mail->addAddress($email, $email);     // Add a recipient
          
          // Content
          $mail->isHTML(true);                                  // Set email format to HTML

          // Mail Subject
          $mail->Subject = 'Forgot Password Mail for Employee And Student Section';

          // Mail Body
          $url = "http://" .$_SERVER["HTTP_HOST"]. $dirname=$_SERVER["PHP_SELF"];
          $mail->Body    = "<p style = 'font-size:20px;font-weight:bold;font-family:Times New Roman'> HELLO $email YOUR PASSWORD IS : -  <b style = 'font-size:24px;color:green;font-family:Consolas;'> {$pass['Password']} </b>  <br><br> <a href='$url'> Click Here </a> To Log-In in Our Website  </p>";

          // Mail Alternative Body
          $mail->AltBody = "HELLO $email YOUR PASSWORD IS : - {$pass['Password']}"; 

          $mail->send();

          echo "<script> alert('Your Password has been SENT on your E-Mail ID SUCCESSFULLY...!!!'); </script>";
      } 
      catch (Exception $e) 
      {
          echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

    }
    else
    {
      echo "<script> alert('Sorry...!!! E-Mail NOT FOUND in My System...!!! Please Try Again...!!!'); </script>";
    }
  }

?>

<?php 
  if(isset($_GET["code"]))
  {
    echo "can't find the page";
  }

?>


<?php 

// PHP CODE FOR FORGOT PASSWORD FOR COMPANY SECTION

  /*// Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
*/
  require_once("db.php");

  if(isset($_POST['csendmail']))
  {
    $email = $_POST['cfemail'];

    // query for checking that email exist in our system or not
    $query = "SELECT * FROM company_registration WHERE Email = '".$email."'";

    // executing the query
    $execute = mysqli_query($dbconnect, $query);

    // check how many numbers of rows are fetched from executing above query
    $count = mysqli_num_rows($execute);

    if($count > 0)
    {
      // query for fetching Password from above entered email
      $query1 = "SELECT * FROM company_registration WHERE Email = '".$email."'";

      // executing the above query
      $execute1 = mysqli_query($dbconnect, $query1);
      
      // getting result of executed query as an array
      $pass = mysqli_fetch_array($execute1);

      // SENDING MAIL PART
      // Load Composer's autoloader
      require 'vendor/autoload.php';

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try 
      {
          //Server settings
          $mail->SMTPDebug = 0;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'skillix007@gmail.com';                     // SMTP username
          $mail->Password   = '$K!ll!x@007';                               // SMTP password
          $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('skillix007@gmail.com', 'SKILLIX');
          $mail->addAddress($email, $email);     // Add a recipient
          
          // Content
          $mail->isHTML(true);                                  // Set email format to HTML

          // Mail Subject
          $mail->Subject = 'Forgot Password Mail for Company Section';

          // Mail Body
          $url = "http://" .$_SERVER["HTTP_HOST"]. $dirname=$_SERVER["PHP_SELF"];
          $mail->Body    = "<p style = 'font-size:20px;font-weight:bold;font-family:Times New Roman'> HELLO $email YOUR PASSWORD IS : -  <b style = 'font-size:24px;color:green;font-family:Consolas;'> {$pass['Password']} </b>  <br><br> <a href='$url'> Click Here </a> To Log-In in Our Website  </p>";


          // Mail Alternative Body
          $mail->AltBody = "HELLO $email YOUR PASSWORD IS : - {$pass['Password']}";


          $mail->send();
          
          echo "<script> alert('Your Password has been SENT on your E-Mail ID SUCCESSFULLY...!!!'); </script>";
      } 
      catch (Exception $e) 
      {
          echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

    }
    else
    {
      echo "<script> alert('Sorry...!!! E-Mail NOT FOUND in My System...!!! Please Try Again...!!!'); </script>";
    }
  }

?>



<!DOCTYPE html>
<html>
<head>
  <title>Log-In</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
 
  <link rel="stylesheet" type="text/css" href="css/skillix.css">
</head>


<body >
	<div class="container-fluid"  >
				<div class="row"   style="padding-top: 70px;">
			<div class="col-sm-12">
				<center ><h2 id="service" style="padding-top: 2%;   padding-bottom: 1%; color: #451f55;">Login</h2>
	<hr width="55%"style="border:2px solid grey;	">
</center>
			</div>

		</div>
	<div class="row"   style="padding-top: 20px;  ">

	<div class="col-sm-3"></div>
	<div class="card text-white mb-3  " style="max-width: 18rem; margin-right: 40px; margin-left:30px;  border:none;">
  
  <div class="card-body card2" >
    <h5 class="card-title">Empolyees and Students are Login Here.</h5>
    <p class="card-text"><center><i class="fa fa-user  fa-3x" aria-hidden="true"></i></center></p>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter1" style="margin-left: 70px;
	border-radius: 20px;"> 
  Login Here
</button>
  </div>
</div>

	<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalCenterTitle1">Login for Empolyees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="#">
    <div class="form-group row">

        
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="eemail" class="form-control cc" id="inputEmail3" placeholder="Enter Email" style="border-radius: 30px; border:1px solid black;" required oninvalid="this.setCustomValidity('Please Enter your E-Mail ID...!!!')" oninput="this.setCustomValidity('')">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3 " class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="epassword" class="form-control" id="inputPassword3" placeholder="Enter Password" style="border-radius: 30px; border:1px solid black;" required oninvalid="this.setCustomValidity('Please Enter your Password...!!!')" oninput="this.setCustomValidity('')">
    </div>
  </div>
      <!--forget passsword-->
        <a  href="" data-toggle="modal" data-target="#exampleModa1">Forgot Password ?</a>
  <!--code for link-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="elogin">Log-In</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- seconed card-->

	<div class="card text-white mb-3" style="max-width: 18rem; border:none ; margin-left:30px;  ">
   <div class="card-body card2">
       <h5 class="card-title">Companines are Login Here.</h5>
    <p class="card-text"><center> <i class="fa fa-users  fa-3x " aria-hidden="true"></i> </center></p>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter2" style="margin-left: 70px;
	border-radius: 20px;">
  Login Here
</button>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login for Compaines </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="#">
  <div class="form-group row">
    <label for="inputEmail3"  class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="cemail" class="form-control cc" id="inputEmail3" placeholder="Enter Email" style="border-radius: 30px; border:1px solid black;" required oninvalid="this.setCustomValidity('Please Enter your E-Mail ID...!!!')" oninput="this.setCustomValidity('')">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3 " class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="cpassword" class="form-control" id="inputPassword3" placeholder="Enter Password" style="border-radius: 30px; border:1px solid black;" required oninvalid="this.setCustomValidity('Please Enter your Password...!!!')" oninput="this.setCustomValidity('')">
    </div>
  </div>
      <!--forget passsword-->
        <a  href="" data-toggle="modal" data-target="#exampleModa2">Forgot Password ?</a>
  <!--code for link-->

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        <button type="submit" class="btn btn-primary" name="clogin">Log-In</button>
        
      </div>
      </form>
    </div>
  </div>
</div>

<!--Forgot Password for Employee And Student Part-->
<div class="modal fade" id="exampleModa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="padding-top: 50px; padding-bottom: 50px; padding-top: 30px;"   >
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalCenterTitle">Forgot Password For Employee And Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-top: 50px;">
        <form method = "POST" action = "#">
<div class="form-group row">
    <label for="inputEmail3" name="efemail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="efemail" class="form-control cc" id="inputEmail3" placeholder="Enter Email" style="border-radius: 30px; border:1px solid black;" required oninvalid="this.setCustomValidity('Please Enter your E-Mail ID...!!!')" oninput="this.setCustomValidity('')">
    </div>
  </div>
      </div>
      <div class="modal-footer">
   
        <button type="submit" name = "esendmail" class="btn btn-primary">Send E-Mail</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--close here-->

<!--Forgot Password for Comapany Part-->
<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="padding-top: 50px; padding-bottom: 50px; padding-top: 30px;"   >
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalCenterTitle">Forgot Password For Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-top: 50px;">
        <form method = "POST" action = "#">
<div class="form-group row">
    <label for="inputEmail3" name="cfemail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="cfemail" class="form-control cc" id="inputEmail3" placeholder="Enter Email" style="border-radius: 30px; border:1px solid black;" required oninvalid="this.setCustomValidity('Please Enter your E-Mail ID...!!!')" oninput="this.setCustomValidity('')">
    </div>
  </div>
      </div>
      <div class="modal-footer">
   
        <button type="submit" name = "csendmail" class="btn btn-primary">Send E-Mail</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--close here-->


</div>
	</div>
	
</body>
</html>

<?php include 'footer.php'; ?>