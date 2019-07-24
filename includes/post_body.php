<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<div class="post_body">

<?php
include("includes/connect.php");

$result = mysqli_query($con,"select * from post where post_view = 1 order by rand() limit 0,4");
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
<h2><a href ="page.php?id=<?php echo $post_id;?>" ><?php echo $title; ?></a></h2>

<P>Publish on:&nbsp;&nbsp;<b><?php echo $date; ?></b></P>

<p align="right">Posted by:&nbsp;&nbsp;<b><font size="4px"><?php echo $author;?></font></b>
</P>

<center><img width="600px" height="250px" src="photo gallary/<?php echo $image; ?>" /></center><br /><br />

<p><?php echo $content;?>...............</p>

<p align="right"><a href="page.php?id=<?php echo $post_id;?>" >Read More....</a></p>

<br /><br /><hr color="#00FF00" /><br />
<?php } ?>
</div>


</body>
</html>