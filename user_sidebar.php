<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css" />
</head>

<body>

 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                
                <?php  

                     include("includes/connect.php");
                      $user_id = $_SESSION['user_id'];
                      $result = mysqli_query($con,"select * from user where user_id = $user_id");
                      $numrows = mysqli_num_rows($result);

                      while($row = mysqli_fetch_array($result))
                        {
	                      $username = $row['username'];
						  ?>
                    <a href="#">
                        <h3><font color="#FF0000"><?php echo $username ?></font></h3>
                    </a>
                    <?php } ?>
                </li>
                <li>
                    <a href="insert_post_user.php">Creat New Posts</a>
                </li>
                <li>
                    <a href="user.php">View Post</a>
                </li>
                <li>
                    <a href="edit_profile.php">Edit Profile</a>
                </li>
                <li>
                    <a href="shoppi_user.php">Sports Baazar</a>
                </li>
                
                <li>
                    <a href="logout.php">Logout<span class="glyphicon glyphicon-log-out"></span></a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

</body>
</html>