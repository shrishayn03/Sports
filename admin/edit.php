<html>
<body>




<?php

include("index.php");
include("includes/connect.php");

$edit_id = @$_GET['edit'];


$result = mysqli_query($con,"select * from posts where post_id='$edit_id'");
		$numrows = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result))
		{
			
		$edit_id1  = $row['post_id'];
		$title = $row['post_sport'];
			$date = $row['post_date'];
			$author = $row['post_writer'];
			$image = $row['post_image'];
			$content = $row['post_content'];
		
?>


<form method="post" action="edit.php?edit_form=<?php echo $edit_id1; ?>" enctype="multipart/form-data">





<table align="center" border="10" width="600">
    <tr>ob_cleanp
 	<td align="center" colspan="6" bgcolor="green">
	<h1> Edit Post </h1></td></tr>

	<tr>
	<td align="right"> Post Sport Name:</td>
	<td><input type="text" name="title" size="40" value="<?php echo $title; ?>"></td>
	</tr>
		<tr>
	<td align="right">Post Writer Name:</td>
	<td><input type="text" name="author" size="40" value="<?php echo $author; ?>"></td>
	</tr>

		<tr>
	<td align="right">Post Image:</td>
	<td><input type="file" name="image">
	<img src="../images/<?php echo $image; ?>" width="60" height="60"></td>
	</tr>

		<tr>
	<td align="right">Post Content:</td>
	<td><textarea name="content" cols="40" rows="25"><?php echo $content; ?></textarea></td>
	</tr>  

	<tr>
	<td align="center" colspan="6" bgcolor="red"><input type="submit" name= "update" value="UPDATE NOW"></td>
	</tr>

		<?php }  ?>
</table>
</form>
</body>
</html>
<?php

if(isset($_POST['update']))
{
	$update_id = $_GET['edit_form'];
	
	
	
	 $id = $_GET['edit_form'];
	  $title = $_POST['title'];
	  $date = date('y-m-d');
	  $author = $_POST['author'];
	  $content = $_POST['content'];
       $image_name  = $_FILES['image']['name'];
	  $image_type = $_FILES['image']['type'];
	  $image_size = $_FILES['image']['size'];
	  $image_tmp = $_FILES['image']['tmp_name'];
	
	
	move_uploaded_file($image_tmp,"../images/$image_name");
	
	$update_query = "update posts set post_sport='$title',post_date='$date',post_writer='$author',post_image='$image_name',post_content='$content'
	where post_id='$update_id'";
	
	
	if(mysqli_query($con,$update_query)){
    echo "<script>alert('Post has been updated')</script>";
					echo "<script>window.open('index.php?view=view','_self')</script>";
					} 	
}

?>

