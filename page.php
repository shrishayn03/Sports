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


<div><?php include("includes/topbar.php"); ?></div>

<div><?php include("includes/header.php"); ?></div>

<div><?php include("includes/navbar.php"); ?></div>

<div><?php include("includes/sidebar.php"); ?></div>

<div class="post_body">

<?php
include("includes/connect.php");
$post_id = $_GET['id'];
$result = mysqli_query($con,"select * from post where post_id='$post_id'");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  { 
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$content = $row['post_content'];
	$image = $row['post_image'];
 
?>
<h1><font color="#FF0000" size="30px"><center><?php echo $title; ?></font></center></h1>

<P>Publish on:&nbsp;&nbsp;<b><?php echo $date; ?></b></P>

<p>Posted by:&nbsp;&nbsp;<b><font size="4px"><?php echo $author;?></font></b>
</P>

<center><img width="600px"  src="photo gallary/<?php echo $image; ?>" /></center><br /><br />

<p align="center"><?php echo $content;?></p>

<?php } ?>

</div>

<div><?php include("includes/foot.php"); ?></div>

</body>
</html>