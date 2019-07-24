<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login_style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<title>contact us</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div><?php include("includes/topbar.php"); ?></div>

<div><?php include("includes/header.php"); ?></div>

<div><?php include("includes/navbar.php"); ?></div>

<div>

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post" action="contact.php" enctype="multipart/form-data">
			<h2>Mail Us Your Query......</h2>
			<hr color="#FF0000" />
			<div class="row">
				<div >
					<div class="form-group">
                        <input  type="text" name="name" id="first_name" class="form-control" placeholder="Enter Name" tabindex="1" required="required">
					</div>
                    <div class="form-group">
                        <input  type="email" name="email" id="first_name" class="form-control" placeholder="Enter Your Email Address" tabindex="1" required="required">
					</div>
                    <div class="form-group">
                        <input  type="text" name="subject" id="first_name" class="form-control" placeholder="Subject" tabindex="1" required="required">
					</div>
				</div>
				<div class="col-xs-12 col-sm-60 col-md-60">
						<div  class="form-group">
<textarea  name="message" class="form-control" placeholder="Type MESSAGE"  required="required" rows="10"></textarea>            
			</div>
				</div>
			</div>
            
		
            <div align="center" class="form-group">
                        <input  type="submit" name="submit" value="Send Mail">
					</div>
			
		</form>
	</div>
</div>

</div>
<br /><br />
<div><?php include("includes/foot.php"); ?></div>

</body>
</html>
<?php 

if(isset($_POST['submit'])){

$sender_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$to = "ghurevinit@gmail.com";

mail($to,$subject,$message,$sender_email);

$sender = $_POST['email'];
$sub = "sportsection.com<br>";
$msg = "Thank you for sending an email, we will get back to you soon.";
$from = "ghurevinit@gmail.com";

mail($sender,$sub,$msg,$from);

}

?>