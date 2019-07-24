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
<link rel="stylesheet" type="text/css" href="../style1.css" />
</head>

<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">
<?php 
include("includes/connect.php");

$edit = @$_GET['edit'];

$result = mysqli_query($con,"select * from post where post_id = '$edit'");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$post_id = $row['post_id']; 
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$content = $row['post_content'];
	$image = $row['post_image']; 
 
?>
 <form method="post" action="admin_edit.php?edit_form=<?php echo $post_id ?>" enctype="multipart/form-data">

  <div align="center">
    <table width="700" height="400" border="3" align="center">
      
      <tr style="color:#F03;">
        <td colspan="2" align="center" bgcolor="#9933FF"><h1><font color="#33FF00">Editing Post</font></h1></td>
      </tr> 
      
      <tr>
        <td width="145" height="34" align="right" style="color:#F03;  font-family:'Comic Sans MS', cursive;">					         Post Title:
        </td>
        <td width="579" style="padding-left:2px;">
        <input width="40" type="text" name="title" size="70" value="<?php echo $title;?>"/>
        </td>
      </tr>
      
      <tr> 
        <td height="41" align="right" style="color:#F03; font-family:'Comic Sans MS', cursive;">
        Post Author:
        </td>
        <td style="padding-left:2px;"><input type="text" name="author" size="70" value="<?php echo $author;?>"/></td>
      </tr>
      
      <tr>
        <td height="49" align="right" style="color:#F03;  font-family:'Comic Sans MS', cursive;">
        Post Image:
        </td>
     <td style=" font-family:'Comic Sans MS', cursive; padding-top:3px; padding-bottom:3px; padding-left:2px;" >
        <input style="float:left;" type="file" name="image"/> <img style="float:right; margin-right:5em;" src="../photo gallary/<?php echo $image;?>" width="100px" height="80px"/>
        </td>
      </tr>
      
      <tr>
        <td height="346" align="right" style="color:#F03;  font-family:'Comic Sans MS', cursive;">
        Post Content:
        </td>
        <td style="padding-left:2px;">
        <textarea name="content" cols="72" rows="17" ><?php echo $content;?></textarea>
        </td>
      </tr>
      
      <tr>
        <td height="41" colspan="2" align="center"><input type="submit" name="update" value="Update"/></td>
      </tr>
  </table>
  </div>
</form>
<?php } ?>

<?php 

 $user_id = $_SESSION['user_id'];
 
 if(isset($_POST['update'])){
	  $id = $_GET['edit_form'];
	  $title = $_POST['title'];
	  $date = date('y-m-d');
	  $author = $_POST['author'];
	  $content = $_POST['content'];
      $image_nm = $_FILES['image']['name'];
	  $image_type = $_FILES['image']['type'];
	  $image_size = $_FILES['image']['size'];
	  $image_tmp = $_FILES['image']['tmp_name'];
	  
	  if($title == '' && $author == '' && $content == ''){
		  echo "<script>alert('Fill All the fields')</script>";
	  exit();
	  }
	  if($image_nm == ''){
			$result = mysqli_query($con,"select * from post where post_id = '$id'");
            $numrows = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result))
 			 {
				$image_nm = $row['post_image'];
				$query = "update post set post_title='$title', post_date='$date', post_author='$author',                post_image='$image_nm', post_content='$content' where post_id='$id'";
	
	            if(mysqli_query($con,$query)){
					echo "<script>alert('Post has been updated')</script>";
					echo "<script>window.open('admin.php','_self')</script>";
					} 
		     }
	
	  }
	  

		 
	 if( $image_type == "image/jpeg" or $image_type == "image/png" or $image_type == "image/gif"){
		 
		 if($image_size<=100000000000000000){
			 move_uploaded_file($image_tmp,"../photo gallary/$image_nm");
		 }
		 else{
			 echo "<script>alert('Image size Should be less than 100KB')</script>";
		 }
	 }
	 else{
	     echo "<script>alert('Image Type is Invalid')</script>";
         }
		 
		 
$query = "update post set post_title='$title', post_date='$date', post_author='$author', post_image='$image_nm', post_content='$content' where post_id='$id'";

	if(mysqli_query($con,$query)){
		echo "<script>alert('Post has been updated')</script>";
		echo "<script>window.open('admin.php','_self')</script>";
	}
 }
		 


?>
</div>
<body>
</body>
</html>
