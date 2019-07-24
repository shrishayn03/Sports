 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="sidebar" >
<div class="social">
<table border="1px" bordercolor="#0099FF" align="center">
<td>
<h4 align="center" ><i><font color="#CC33CC">Follow us on</font></i></h4>
<a href="#"><i class="fa fa-facebook-square" style="font-size:50px; color:#3b5998"></i></a>
<a href="#"><i class="fa fa-instagram" style="font-size:50px; color:#cd486b "></i></a>
<a href="#"><i class="fa fa-twitter" style="font-size:50px; color:#0084b4"></i></a>
<a href="#"><i class="fa fa-skype" style="font-size:50px; color:#00aff0"></i></a>
<a href="#"><i class="fa fa-youtube-play" style="font-size:50px; color:#bb0000"></i></a>

</td>
</table>
</div>

<hr /><br />

<form action="search.php" method="get" >
<table align="center"  width="30">
<td>
<center><input type="text" size="25" name="search" placeholder="search this site.."  border="3px"/>
<br /><br /><input type="submit" name="submit" value="Search" /></center>
</td>
</table>
</form>
<hr/>
<br />
<center><h3><font color="#CC3300" style="font-family:'Comic Sans MS', cursive;">Recent Posts</font></h3></center>
<br /><br />
<?php 

include("includes/connect.php");

$result = mysqli_query($con,"select * from post where post_view=1 order by 1 DESC LIMIT 0,6");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$post_id = $row['post_id'];
	$title = $row['post_title'];
    $author = $row['post_author'];
    $image = $row['post_image'];
 
?>

<center><a href ="page.php?id=<?php echo $post_id;?>"><img width="150px" height="100px" src="photo gallary/<?php echo $image; ?>" /></a>

<h3><a href ="page.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a></h3>
</center>

<br /><br />



<?php } ?>


</div>


</body>
</html>