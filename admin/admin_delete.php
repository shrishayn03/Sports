<?php 
 include("includes/connect.php");

 $delete = $_GET['del'];
 
 $delete_query = " delete from posts where post_id='$delete'";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post has been Deleted')</script>";
		echo "<script>window.open('index.php?view=view','_self')</script>";
	}
?>