<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="stylesheet" type="text/css" href="../style1.css" />
  <link rel="stylesheet" type="text/css" href="style.css"/>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style> 
input:checked {
    height: 50px;
    width: 50px;
}

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
function selectToggle(toggle, form) {
     var myForm = document.forms[form];
     for( var i=0; i < myForm.length; i++ ) { 
          if(toggle) {
               myForm.elements[i].checked = "checked";
          } 
          else {
               myForm.elements[i].checked = "";
          }
     }
}  </script>
</head>
<body>
<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">
<p>&nbsp;</p>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for post.." title="Type in a name">

<?php 
include("includes/connect.php");

	?>
<form name="theForm" action="#" method="post">
<table id="myTable" width="700px" align="center" border="2" style=" margin-top:1em;">
	<tr>
		<th height="20px"  colspan="7" bgcolor="#3366FF"><h3><font color="#00FF99"><center>View All Posts</center>
        </font></h3></th>
        </tr>
    <tr  align="center" style="font-family:'Comic Sans MS', cursive; color:#F30; height:50px; font-size:medium;">
    	<th>Post Title</th>
        <th>Post Date</th>
        <th>Post Author</th>
        <th>Post Image</th>
        <th>Post Content</th>
        <th>View Post</th>
        <th>Delete</th>
    </tr>
<?php

	
$result = mysqli_query($con,"select * from post where post_view = 1 order by 1 DESC");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$post_id = $row['post_id']; 
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$content = substr($row['post_content'],0,30);
	$image = $row['post_image'];
 
?>

	
    
    <tr align="center">
    	<td><?php echo $title ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $author ?></td>
        <td><img width="150px" height="100px" src="../photo gallary/<?php echo $image; ?>" /></td>
        <td><?php echo $content ?>..</td>
        <td><a href="all_post.php?edit=<?php echo $post_id?>#popup1">View</a></td>
        <td><input id="check" type="checkbox" name="checkbox[]" value="<?php echo $post_id ?>"></td>
    </tr>
 
<?php } ?>
   <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</table>
<br/>

<div style="float:right; margin-right:50px">
  <button type="button" class="btn btn-primary" onclick="selectToggle(true, 'theForm')">select All</button>
    <button type="button" class="btn btn-primary"  onclick="selectToggle(false, 'theForm')">Unselect All</button>
   <button type="submit" class="btn btn-primary" name="del">Delete</button>
</div>
</form>
<?php
if(isset($_POST['del'])){
if(!empty($_POST['checkbox'])){
foreach($_POST['checkbox'] as $selected){
$delete_query = " delete from post where post_id=$selected";
 
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('Post's has been Deleted')</script>";
		echo "<script>window.open('all_post.php','_self')</script>";
	}
}
}
}
?>

</div>
 <div id="popup1" class="overlay">
  
<form method="post" action="login.php" enctype="multipart/form-data">  
<div class="container">

    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login"><a class="close" href="#" >x</a>
<?php          
     $id = $_GET['edit'];
	
	$result = mysqli_query($con,"select * from post where post_id = '$id'");
    $numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$post_id = $row['post_id']; 
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$content = $row['post_content'];
	$image = $row['post_image'];
  
  ?>
<h2><a href ="page.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a></h2>

<P>Publish on:&nbsp;&nbsp;<b><?php echo $date; ?></b></P>

<p align="right">Posted by:&nbsp;&nbsp;<b><font size="4px"><?php echo $author;?></font></b>
</P>

<center><img width="200px" height="100px" src="../photo gallary/<?php echo $image; ?>" /></center><br /><br />

<p><?php $text = wordwrap($content,50,"<br>\n",true); echo $text;?></p>


<?php } ?>


</div>

       
        </div>
        
    </div>
    
</div>
</form>
</div>

</body>
</html>
