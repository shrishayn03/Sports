
<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}
 $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login_style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<title>Untitled Document</title>
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
if (phn.value.length <10)
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
<div><?php include("user_sidebar.php");?></div>


<?php 
include("includes/connect.php");


$result = mysqli_query($con,"select * from user where user_id = '$user_id'");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$name = $row['username'];
	$address = $row['address'];
	$mobile = $row['mobile_no'];
	$email = $row['email']; 
 
?>
<div class="post_body_user">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post" action="edit_profile.php" enctype="multipart/form-data">
			<h2>Edit Profile......</h2>
			<hr class="colorgraph">
        
					<div class="form-group">
                     <label>Change User Name:</label>
                        <input value="<?php echo $name ?>"  type="text" name="name" id="name" class="form-control" placeholder="User Name"  required="required">
					</div>
			
            
			
            <div class="form-group">
            <label>Change Mobile No.:</label>
                  <input ID="mobileno" value="<?php echo $mobile ?>" required="required" name="mobile" type="text" onkeypress="return validate(event)" class="form-control" placeholder="Enter Mobile Number" />			
                  </div>
			<div class="form-group">
            <label>Change Email Address:</label>
				<input type="email" value="<?php echo $email ?>" required="required" name="email" id="email" class="form-control" placeholder="Email Address" tabindex="4">
			</div>
            <div class="form-group">
    <label>Enter Address:</label>
    <textarea  type="text"  name="address" class="form-control" cols="20" rows="5"   placeholder="Enter Delivery Address"><?php echo $address ?></textarea>
  </div>
             <label>Change Password:</label>
			<div class="row">
            
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                   
						<input type="password"  name="password" id="password" class="form-control" placeholder="New Password" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                   
						<input type="password"  name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6">
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
				<div><input type="submit" value="Update Profile" name="submit" onclick="return phonenumber(mobile)" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
                </div>
			</div>
		</form>
	</div>
</div>

<?php } ?>

</div>
</body>
</html>

<?php
 include("includes/connect.php");
 
 
 if(isset($_POST['submit'])){
	 
	  $username = $_POST['name'];
	  $addr = $_POST['address'];
	  $mobile = $_POST['mobile'];
	  $email = $_POST['email'];
	  $password1 = $_POST['password'];
	 
	 if($password1 == ''){ 
	$query = "update user set username='$name', address='$addr', mobile_no='$mobile', email='$email' where user_id='$user_id'";
	
	if(mysqli_query($con,$query)){
		echo "<script>alert('Profile Updated')</script>";
		echo "<script>window.open('edit_profile.php','_self')</script>";
	          }
	 }
	
	else{
		$query = "update user set username='$name', address='$addr', mobile_no='$mobile',address='$addr', email='$email',password='$password1' where user_id='$user_id'";
	
	if(mysqli_query($con,$query)){
		echo "<script>alert('Profile Updated')</script>";
		echo "<script>window.open('edit_profile.php','_self')</script>";
	          }
		}
	 
 }
		
 ?>