<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="stylesheet" type="text/css" href="style1.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style> 
input:checked {
    height: 50px;
    width: 50px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

<div class="post_body_user">
<p>&nbsp;</p>
<?php 
include("includes/connect.php");
$user_id = $_SESSION['user_id'];
	?>
<form name="theForm" action="#" method="post">
<table width="700px" align="center" border="2" style=" margin-top:1em;">
	<tr>
		<td height="20px"  colspan="8" align="center" bgcolor="#3366FF"><h3><font color="#00FF99">View My Posts</font></h3></td>
	</tr>
    <tr  align="center" style="font-family:'Comic Sans MS', cursive; color:#F30; height:50px; font-size:medium;">
    	<td>Post Title</td>
        <td>Post Date</td>
        <td>Post Author</td>
        <td>Post Image</td>
        <td>Post Content</td>
        <td>Edit</td>
        <td>Status</td>
        <td>Delete</td>
    </tr>
<?php

	
$result = mysqli_query($con,"select * from post where user_id = $user_id order by 1 DESC");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$post_id = $row['post_id']; 
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$content = substr($row['post_content'],0,200);
	$image = $row['post_image'];
	$status = $row['post_view'];
 
?>

	
    
    <tr align="center">
    	<td><?php echo $title ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $author ?></td>
        <td><img width="150px" height="100px" src="photo gallary/<?php echo $image; ?>" /></td>
        <td><?php echo $content ?></td>
        <td><a href="user_edit.php?edit=<?php echo $post_id?>">Edit</a></td>
        <?php if($status == 1) { ?>
        <td><font color="#00FF00">Approved</font></td>
        <?php }
		else {?>
        <td><font color="#FF0000">UnApproved</font></td>
        <?php }?>
        
        <td><input id="check" type="checkbox" name="checkbox[]" value="<?php echo $post_id ?>"></td>
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
$delete_query = " delete from post where post_id=$selected";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post's has been Deleted')</script>";
		echo "<script>window.open('user.php','_self')</script>";
	}
}
}
}
?>

</div>


</body>
</html>
