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

if(isset($_GET['submit'])){
	$search_id = $_GET['search'];
	
	$result = mysqli_query($con,"select * from post where post_title like '%$search_id%' and post_view = 1");
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

<center><img width="600px" height="250px" src="photo gallary/<?php echo $image; ?>" /></center><br /><br />

<p><?php echo $content;?></p>

<p align="right"><a href="page.php?id=<?php echo $post_id;?>" >Read More....</a></p>

<br /><br /><hr color="#00FF00" /><br />
<?php } }?>


</div>

<div><?php include("includes/foot.php"); ?> </div>

</body>
</html>