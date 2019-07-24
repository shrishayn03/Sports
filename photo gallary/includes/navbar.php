
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

<?php @$id = $_GET['pno']; ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><font color="#FF0000">Sports Section</font></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../index.php">Home</a></li>
      <li><a href="../shoppi.php">Sports Bazzar</a></li>
      <li><a href="../photo gallary/photogallary.php">Photo Gallary</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="../contact.php">Contact us<span class="glyphicon glyphicon-phone"></span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../index.php#popup1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  
  
  <div id="popup1" class="overlay">
  
<form method="post" action="login.php" enctype="multipart/form-data">  
<div class="container">

    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login"><a class="close" href="#" >x</a>
            <h4><font color="#0000FF">Please Login....</font></h4>
            				<hr class="colorgraph">

            <input type="text" name="username" class="form-control input-sm chat-input" placeholder="username" />
            
            </br>
            <input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
            </br>
           
            <div class="wrapper">
                
               <input class="btn btn-primary"  type="submit" name="login" value="Login"> <span class="glyphicon glyphicon-log-in"></span>
            </div>
            </div>
       
        </div>
        
    </div>
    
</div>
</form>
</div>

<div id="popup2" class="overlay">
  
<form method="post" action="login_bye.php?pno=<?php echo $id?>" enctype="multipart/form-data">  
<div class="container">

    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login"><a class="close" href="product.php?pid=<?php echo $id ?>" >x</a>
            <h4><font color="#0000FF">Please Login....</font></h4>
            				<hr class="colorgraph">

            <input type="text" name="username" class="form-control input-sm chat-input" placeholder="username" />
            
            </br>
            <input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
            </br>
           
            <div class="wrapper">
                
               <input class="btn btn-primary"  type="submit" name="login" value="Login"> <span class="glyphicon glyphicon-log-in"></span>
            </div>
            </div>
       
        </div>
        
    </div>
    
</div>
</form>
</div>

</nav>
  

</body>
</html>


