<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>


<div class="post_body">


<?php

include("includes/connect.php");


$result = mysqli_query($con,"select * from posts order by rand() LIMIT 0,4");
$numrows = mysqli_num_rows($result);

    // output data of each row
    while($row = mysqli_fetch_array($result)) 

{
	$post_id = $row["post_id"];
	$title = $row["post_sport"];
	$date = $row["post_date"];
	$author = $row["post_writer"];
	$image = $row["post_image"];
	$content = substr($row["post_content"],0,200);
	
	?>
      <h3><b><a href="pages.php?id=<?php echo $post_id; ?>">
       <?php echo $title; ?>
   <a/></b></h3>
      
      <p>Published ON:&nbsp;&nbsp;<?php echo $date; ?></p>
	  <p align="right">Posted By:&nbsp;&nbsp;<b><?php echo $author; ?></p></b>
	  <center><img src="images/<?php echo $image;?>" width="600" height="300"/></center><br />
	  <p><?php echo $content;?></p>
      <p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">READ MORE...</a></p>
      <br/></br>
</br/>  

<?php } ?>



</div>


</body>
</html>