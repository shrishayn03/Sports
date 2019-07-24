<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login_style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<title>SignUp</title>
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript">
//Function to allow only numbers to textbox
function validate(key)
{
//getting key code of pressed key
var keycode = (key.which) ? key.which : key.keyCode;
var phn = document.getElementById('mobileno');
//comparing pressed keycodes
if ((keycode < 48 || keycode > 57))
{
return false;
}
else
{
//Condition to check textbox contains ten numbers or not
if (phn.value.length < 10)
{
return true;
}
else
{
return false;
}
}
}


</script>
<script>
function phonenumber(inputtxt)  
{  
  var phoneno = /^\d{10}$/;  
  if(inputtxt.value.match(phoneno))  
  {  
      return true;  
  }  
  else  
  {  
     alert("Not a valid Phone Number");  
     return false;  
  }  
  }
</script>

</head>


<body>
<div><?php include("includes/topbar.php"); ?></div>

<div><?php include("includes/header.php"); ?></div>

<div><?php include("includes/navbar.php"); ?></div>

<div>

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post" action="signup.php" enctype="multipart/form-data">
			<h2>Please Sign Up......</h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input  type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required="required">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required="required">
					</div>
				</div>
			</div>
            
			
            <div class="form-group">
                  <input type="number" ID="mobileno" maxlength="10" name="mobile"  onkeypress="return validate(event)"  class="form-control input-lg" placeholder="Enter Mobile Number" required/>			
                  
                  </div>
                  <div class="form-group">
    <textarea  type="text" required="required"  name="address" class="form-control  input-lg" cols="20" rows="5"   placeholder="Enter Delivery Address"></textarea>
  </div>
			<div class="form-group">
				<input type="email" required="required" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" required="required" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" required="required" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
					</div>
				</div>
  <script>
   var password = document.getElementById("password")
  , confirm_password = document.getElementById("password_confirmation");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
			</div>
			
			
			<hr class="colorgraph">
			<div class="row" >
				<div><input type="submit" value="SignUp" name="submit" onclick="return phonenumber(mobile)" class="btn btn-primary btn-block btn-lg" tabindex="6"></div>
                </div>
			</div>
		</form>
	</div>
</div>

</div><br /><br />
<div><?php include("includes/foot.php"); ?></div>
</body>
</html>

<?php
 include("includes/connect.php");
 
 
 if(isset($_POST['submit'])){
	  $first = $_POST['first_name'];
	  $last = $_POST['last_name'];
	  $username = $first .' '. $last;
	  $addr = $_POST['address'];
	  $mobile = $_POST['mobile'];
	  $email = $_POST['email'];
	  $password1 = $_POST['password'];
	  $password2 = $_POST['password_confirmation'];
	  
	  
	  $result = mysqli_query($con,"select email from user where email = '$email'");
      $numrows = mysqli_num_rows($result);

	
 
	  if($numrows == 0 ){
     
	  
	$query = "insert into user(username,address,mobile_no,email,password,p) values('$username','$addr','$mobile','$email','$password1',0)";
	
	if(mysqli_query($con,$query)){
		echo "<script>alert('Welcome...')</script>";
	}
	else  echo "<script>alert('SignIn again')</script>";
	  }
	 else echo "<script>alert('Email Address Exist.....SignIn with Different Email  Address')</script>"; 
  
 }
		 

 ?>