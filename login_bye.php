<?php
session_start(); 
include("includes/connect.php");
if(isset($_POST['login'])){
$id = $_GET['pno'];
	 $user_name = mysql_real_escape_string($_POST['username']);
	 $password = mysql_real_escape_string($_POST['password']);
	
	$encrypt = md5($password);
	
		
$login_query = mysqli_query($con,"select * from user where email='$user_name' and password = '$password'");
$numrows = mysqli_num_rows($login_query);

while($row = mysqli_fetch_array($login_query))
  {
	$user_id = $row['user_id']; 
	$p = $row['p'];
	$username = $row['username'];
	
	
	
	
	if($numrows==1 && $p == 0){
		$_SESSION['user_id'] = $user_id;
		echo "<script>window.open('bye.php?pno=$id','_self')</script>";
	}
	
  }
  if($numrows == 0){
		echo "<script>alert('username or password is incorrect!')</script>";
		echo "<script>window.open('index.php?pno=$id#popup2','_self')</script>";
	}
	if($numrows == 1 && $p == 1  ){
		echo "<script>alert('username or password is incorrect!')</script>";
		echo "<script>window.open('index.php?pno=$id#popup2','_self')</script>";
	}
}

if(isset($_POST['signin'])){
	
		echo "<script>window.open('signup.php','_self')</script>";
	
}
?>



	

	
	
