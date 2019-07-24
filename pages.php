<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> FORMULA ONE CLASSICS </title>
<link rel="stylesheet" href="style1.css">
</head>

<body>
<!--THIS IS TOP BAR-->
<div id="top">
  <p>this is top bar
  <p/></div>

<!-- THIS IS HEADER-->
<div><?php include("includes/header.php");    ?></div>
<!-- THIS IS NAVIGATION-->
<div>
  
  <?php include("includes/navigation.php");    ?>
</div>


<!-- THIS IS sidebar-->
<div><?php include("includes/sidebar.php");    ?>
</div>


<!-- THIS IS post content area-->
<div class="post_body.php">

<?php 
include("includes/connect.php");
$page_id = $_GET['id'];

    $result = mysqli_query($con,$result = "select * from posts where post_id='$page_id'");
	$numrows = mysqli_num_rows($result);
	
	 while($row = mysqli_fetch_array($result)) 

{
	$title = $row["post_sport"];
	$date = $row["post_date"];
	$author = $row["post_writer"];
	$image = $row["post_image"];
	$content = $row["post_content"];
	

?>
      <h2><?php echo $title; ?>
      </h2>
     
      <p><b>Published ON:</b>&nbsp;&nbsp;<?php echo $date; ?></p>
	  <p align="right">Posted By:&nbsp;&nbsp;<b><?php echo $author; ?></p></b>
	  <center><img src="images/<?php echo $image;?>" width="600" /></center><br />
	  <p><?php echo $content;?></p>
	
	<?php } ?>
</div>



</body>
</html>