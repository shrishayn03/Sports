
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="login_style.css"/>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dropdownhover.min.js"></script>
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
      <li><a href="index.php">Home</a></li>
      <li><a href="shoppi.php">Sports Bazaar</a></li>
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" data-hover="dropdown">
   Games <span class="caret"></span>
 
        <ul class="dropdown-menu">
       <?php include("include_shoppi/connect.php");

$result = mysqli_query($con,"select * from games");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  { 
	$gno = $row['gno'];
	$gnm = $row['gnm'];
 ?>
          <li><a href="game.php?id=<?php echo $gno; ?>"><?php echo $gnm;?></a></li>
  <?php }?>
      </ul>

      </li>
       <li><a href="contact.php">Contact us <span class="glyphicon glyphicon-envelope"></span></a></li>
    </ul>
    <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search" method="get" enctype="multipart/form-data" action="product_search.php">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="product_s">    <i class="glyphicon glyphicon-search" style=" font-size:20px"></i></button>
            </div>
        </div>
        </form>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="index.php#popup1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
   
</div>

</nav>
  

</body>
</html>


