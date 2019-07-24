<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<div id="sidebar">

<center><h2><b>RECENT POSTS</b></h2><center>
<?php

include("includes/connect.php");

$result = mysqli_query($con,"select * from posts order by 1 DESC LIMIT 0,4");
$numrows = mysqli_num_rows($result);


while($row = mysqli_fetch_array($result)) {
	
	$post_id = $row['post_id'];
	$title = $row["post_sport"];
	$image = $row["post_image"];
	
	
?>	
		
        
 <center>
 <a href="pages.php?id=<?php echo $post_id; ?>"><img src="images/<?php echo $image; ?>"  width="150" height="150" > </a>      
       
       
       
       <a href="pages.php?id=<?php echo $post_id; ?>"><h3><?php echo $title; ?></h3></a></center>
        
<?php	} ?>











 </div>

</body>
</html>