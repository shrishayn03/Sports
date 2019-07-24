<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style1.css" />
<title>Untitled Document</title>
</head>

<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}

else{

$user_id = $_SESSION['user_id'];

?>
<body>
<div><?php include("user_sidebar.php"); ?></div>

<div><?php include("post_body_user.php"); ?></div>
</body>
</html>
<?php }?>