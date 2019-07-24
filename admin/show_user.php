<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style> 
input:checked {
    height: 20px;
    width: 20px;
}
</style>

  <script>
function selectToggle(toggle, form) {
     var myForm = document.forms[form];
     for( var i=0; i < myForm.length; i++ ) { 
          if(toggle) {
               myForm.elements[i].checked = "checked";
          } 
          else {
               myForm.elements[i].checked = "";
          }
     }
}  </script>
</head>

<body>

<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">







<form name="theForm" action="#" method="post">

<table align="center" bgcolor="#339999" width="750"; border="6" cellpadding="3">
<tr>
	<td colspan="6" align="center" bgcolor="#CCFF33">
    <h2>System USER</h2></td>
    </tr>


<tr align="center">

<th>Customer Name</th>
<th>Conatct NO.</th>
<th>Email Address</th>
<th>Address</th>
<th>No. of Posts</th>
<th>Delete</th>

</tr>

<?php
include("includes/connect.php");

$i=1;

	
	$result5 = mysqli_query($con,"select * from user  where p = 0 ");
		$numrows = mysqli_num_rows($result5);


		while($row = mysqli_fetch_array($result5))
		{
		$user_id = $row['user_id'];
		  $user_name = $row['username'];
			$contact= $row['mobile_no'];
			$email_address = $row['email'];
			$address= $row['address'];
			$password= $row['password'];
		
	
?>
<tr align="center">


    <td><?php echo $user_name;?></td>
    <td><?php echo $contact;?></td>
	<td><?php echo $email_address;?></td>
    <td><?php echo $address;?></td>
    
   <?php $r = mysqli_query($con,"select * from post where user_id = $user_id ");
		$n = mysqli_num_rows($r);
?>
    <td><?php echo $n ?></td>
    
            <td><input id="check" type="checkbox" name="checkbox[]" value="<?php echo $user_id ?>"></td>

</tr>


<?php } ?>

</table>
<br/>

<div style="float:right; margin-right:50px">
  <button type="button" class="btn btn-primary" onclick="selectToggle(true, 'theForm')">select All</button>
    <button type="button" class="btn btn-primary"  onclick="selectToggle(false, 'theForm')">Unselect All</button>
   <button type="submit" class="btn btn-primary" name="del">Delete</button>
</div>
</form>
<?php
if(isset($_POST['del'])){
if(!empty($_POST['checkbox'])){
foreach($_POST['checkbox'] as $selected){
$delete_query = " delete from user where user_id=$selected";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post's has been Deleted')</script>";
		echo "<script>window.open('admin.php','_self')</script>";
	}
}
}
}
?>
</div>
</body>
</html>