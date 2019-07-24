<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert New Post</title>
<link rel="stylesheet" type="text/css" href="../style1.css" />

</head>
<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: ../index.php");
}

?>
<body><div><?php include("admin_sidebar.php");?></div>


<form method="post" action="insert_post.php" enctype="multipart/form-data">

  <div class="post_body_user" >
   
   <table width="750" height="400" border="3" align="center">
      
      <tr style="color:#F03;">
        <td colspan="2" align="center" bgcolor="#9933FF"><h1><font color="#33FF00">Insert New Post</font></h1></td>
      </tr> 
      
      <tr>
        <td width="145" height="34" align="right" style="color:#F03;  font-family:'Comic Sans MS', cursive;">					         Post Title:
        </td>
        <td width="579" style="padding-left:2px;">
        <input width="40" type="text" name="title" size="70" required="required"/>
        </td>
      </tr>
      
      <tr> 
        <td height="41" align="right" style="color:#F03; font-family:'Comic Sans MS', cursive;">
        Post Author:
        </td>
        <td style="padding-left:2px;"><input type="text" name="author" size="70" required="required"/></td>
      </tr>
      
      <tr>
        <td height="49" align="right" style="color:#F03;  font-family:'Comic Sans MS', cursive;">
        Post Image:
        </td>
     <td style=" font-family:'Comic Sans MS', cursive; padding-top:3px; padding-bottom:3px; padding-left:2px;" >
        <input style="float:left;" type="file" name="image" required="required"/> 
        </td>
      </tr>
      
      <tr>
        <td height="346" align="right" style="color:#F03;  font-family:'Comic Sans MS', cursive;">
        Post Content:
        </td>
        <td style="padding-left:2px;">
        <textarea name="content" cols="72" rows="17" required="required"></textarea>
        </td>
      </tr>
      
      <tr>
        <td height="41" colspan="2" align="center"><input type="submit" name="submit" value="Submit"/></td>
      </tr>
  </table>
  </div>
</form>
</body>
</html>

<?php 
$user_id = $_SESSION['user_id'];
 include("includes/connect.php");
 
 if(isset($_POST['submit'])){
	  $title = $_POST['title'];
	  $date = date('y-m-d');
	  $author = $_POST['author'];
	  $content = $_POST['content'];
      $image_nm = $_FILES['image']['name'];
	  $image_type = $_FILES['image']['type'];
	  $image_size = $_FILES['image']['size'];
	  $image_tmp = $_FILES['image']['tmp_name'];
	  
	  if($title == '' && $author == '' && $content == '' && $image_nm == ''){
	  echo "<script>alert('Please provide the inputs.....')</script>";
	  exit();
	  }
	 
	 
	 
	 if( $image_type == "image/jpeg" or $image_type == "image/png" or $image_type == "image/gif"){
		 
		 if($image_size<=100000000000000000){
			 move_uploaded_file($image_tmp,"../photo gallary/$image_nm");
		 }
		 else{
			 echo "<script>alert('Image size Should be less than 100KB')</script>";
		 }
	 }
	 else{
	     echo "<script>alert('Image Type is Invalid')</script>";
         }
		 
    $query = "insert into post(post_title,post_date,post_author,post_image,post_content,post_view,user_id) values('$title','$date','$author','$image_nm','$content',1,$user_id)";
	
	if(mysqli_query($con,$query)){
		echo "<script>alert('Post has been updated')</script>";
	}
 }
		 


?>