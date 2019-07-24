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
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Sports Section</title>
</head>

<body onload = "changeImage()">

<!--<script type = "text/javascript">

    function changeImage()
    {
    var img = document.getElementById("img");
    img.src = images[x];
    x++;

    if(x >= images.length){
        x = 0;
    } 
   var timerid = setInterval(changeImage(), 10);
   }
var images = [], x = 0;
images[0] = "images/ad2.jpg";

      </script>
-->
</head>

<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">
<p>&nbsp;</p>

<?php
include("includes/connect.php");


	$id = $_GET['edit'];
	
	$result = mysqli_query($con,"select * from post where post_id='$id'");
    $numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$post_id = $row['post_id']; 
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$content = substr($row['post_content'],0,200);
	$image = $row['post_image'];
  
  ?>
<h2><a href ="page.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a></h2>

<P>Publish on:&nbsp;&nbsp;<b><?php echo $date; ?></b></P>

<p align="right">Posted by:&nbsp;&nbsp;<b><font size="4px"><?php echo $author;?></font></b>
</P>

<center><img width="600px" height="250px" src="../photo gallary/<?php echo $image; ?>" /></center><br /><br />

<p><?php echo $content;?></p>


<?php }?>



<form method="post" action="#" enctype="multipart/form-data">
<button style=" width:100px; height:40px; float:left; margin-left:10px; margin-right:10px" type="submit" class="btn btn-primary" name="add" value="add"><i class="fa fa-plus" aria-hidden="true">Add Post</i></button>
<button style=" width:100px; height:40px;; " type="submit" class="btn btn-danger" name="del" value="del"><i class="fa fa-delete" aria-hidden="true">Delete Post</i></button>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['del'])){


$delete_query = " delete from post where post_id='$id'";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post's has been Deleted')</script>";
		echo "<script>window.open('approve.php','_self')</script>";
	}
}
if(isset($_POST['add'])){


$delete_query = " update post set post_view = 1 where post_id = '$id' ";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post's has been Deleted')</script>";
		echo "<script>window.open('approve.php','_self')</script>";
	 
}
}
?>