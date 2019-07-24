<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

session_start();

if(!isset($_SESSION['username'])){
	echo "<script>window.open('admin_login.php','_self')</script>";
	

?>





<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN PANEL</title>

<link rel="stylesheet" href="admin_style.css" >
</head>

<body>

<header>
<h1><a href="index.php"> Admin Panel </h1></a>
</header>

<aside> <H2>MANAGE CONTENT
</H2>

<h2><a href="logout.php">Admin Logout</a></h2><br>
<h2><a href="index.php?view=view">View Posts</a></h2><br>
<h2><a href="index.php?insert=insert">Insert New posts</a></h2><br>



</aside>


<center><h1>     </h1>
<p> </p></center>

<?php
if(isset($_GET['insert']))
{
include("insert_post.php");

}
?>



<?php 
if(isset($_GET['view']))
{
?>
<table width="900" align="center" border="3">
<tr>
<td align="center" colspan="9" bgcolor="orange">
<h1>View All Posts</h1>
</td></tr>



<tr>

<th>Post No</th>
<th>Post Title</th>
<th>Post Date</th>
<th>Post Author</th>
<th>Post Image</th>
<th>Post Content</th>
<th>Edit</th>
<th>Delete</th>
<th>Approval</th>
</tr>

<?php
include("includes/connect.php");
$i=1;
if(isset($_GET['view']))
	{

		$result = mysqli_query($con,"select * from posts order by 1 DESC");
		$numrows = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result))
		{
		$id = $row['post_id'];
		$title = $row['post_sport'];
			$date = $row['post_date'];
			$author = $row['post_writer'];
			$image = $row['post_image'];
			$content = substr($row['post_content'],0,30);
	
?>
<tr align="center">
<td><?php echo $i++; ?></td>
<td><?php echo $title; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $author; ?></td>
<td><img src="../images/<?php echo $image; ?>" width="50" height="50"></td>
<td><?php echo $content; ?></td>
<td><a href="edit.php?edit=<?php echo $id; ?>">Edit</a></td>
<td><a href="admin_delete.php?del=<?php echo $id; ?>">Delete</a></td>
<td><a href="Approve.php">Approve</a></td>


</tr>








<?php }}} ?></table>




</body>
</html>
<?php } ?>