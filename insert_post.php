<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<html>
	<head>	
			<title> Insert New Post</title>
			<head>
			
<body>

<form method="post" action="insert_post.php" enctype="multipart/form-data">

<table align="center" border="10" width="900">
    <tr>
	<td align="center" colspan="6" bgcolor="green">
	<h1> Insert New post </h1></td></tr>

	<tr>
	<td align="right"> Post Sport Name:</td>
	<td><input type="text" name="title" size="40"></td>
	</tr>

		<tr>
	<td align="right">Post Writer Name:</td>
	<td><input type="text" name="author" size="40"></td>
	</tr>

		<tr>
	<td align="right">Post Image:</td>
	<td><input type="file" name="image"></td>
	</tr>

		<tr>
	<td align="right">Post Content:</td>
	<td><textarea name="content" cols="40" rows="25"></textarea></td>
	</tr>

	<tr>
	<td align="center" colspan="6" bgcolor="red"><input type="submit" name= "upload" value="PUBLISH NOW"></td>
	</tr>


</table>
</form>
</body>
</html>



<?php

include("includes/connect.php");

if(isset($_POST['upload']))
{
	 $title = $_POST['title'];
	 $date = date("Y-m-d");
	 $author = $_POST['author'];
	 $content = $_POST['content'];
	 $image_name = $_FILES['image']['name'];
	 $image_type = $_FILES['image']['type'];
	 $image_size = $_FILES['image']['size'];
	 $image_tmp = $_FILES['image']['tmp_name'];
	 
	 
	 if($title =="" or $author=="" or $content=="")
	 {
		 echo "<script>alert('ANY FEILD IS EMPTY')</script>";
		 exit();
	 }
	 if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif")
	 {
		 if($image_size<=890000){
				move_uploaded_file($image_tmp,"images/$image_name");
			   
		 }
		 else
		 {
			 echo "<script>alert('Image is larger, only 90kb size is allowed')</script>";
		 }
	 }
	 else{
		 echo "<script>alert('image type is invalid')</script>";
	 }
	  $query = mysqli_query($con,"insert into posts(post_sport,post_date,post_writer,post_image,post_content) values('$title','$date','$author','$image_name','$content'");
      
	if(mysqli_query($con,$query))
	{
	
 	  echo "<center><h1>NEWS HAS BEEN PUBLISHED</h1></center>";
	}
}




?>
<body>
</body>
</html>