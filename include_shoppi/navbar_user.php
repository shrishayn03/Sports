<?php 

if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="login_style.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><font color="#FF0000">Sports Bazaar</font></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="user.php">Account</a></li>
      <li><a href="shoppi_user.php">Sports Bazaar</a></li>
      <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Games
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
       <?php include("include_shoppi/connect.php");

$result = mysqli_query($con,"select * from games");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  { 
	$gno = $row['gno'];
	$gnm = $row['gnm'];
 ?>
          <li><a href="game_user.php?id=<?php echo $gno; ?>"><?php echo $gnm;?></a></li>
  <?php }?>
      </ul>

      </li>
 
      <li><a href="contact_user.php">Contact us <span class="glyphicon glyphicon-envelope"></span></a></li>
    </ul>
    
   <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search" method="get" enctype="multipart/form-data" action="product_search_user.php">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="product_s"><i class="glyphicon glyphicon-search" style=" font-size:20px"></i></button>
            </div>
        </div>
        </form>
    </div>
    
     <ul class="nav navbar-nav navbar-right">
      <li>
      <?php include("include_shoppi/connect.php");

$result = mysqli_query($con,"select * from cart where user_id='$user_id'");
$numrows = mysqli_num_rows($result);
?>
      <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (<?php echo $numrows ?>)</a>
      
      </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
   
</div>

</nav>
  

</body>
</html>


