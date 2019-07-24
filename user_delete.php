<?php 
 include("includes/connect.php");

 $delete = $_GET['del'];
 
  $delete_query = " delete from post where post_id=$selected";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post's has been Deleted')</script>";
		echo "<script>window.open('user.php','_self')</script>";
	}
?>