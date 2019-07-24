<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shoppi.css" />
<link rel="stylesheet" type="text/css" href="login_style.css" />
<title>Sports Section</title>
</head>

<body onload = "changeImage()">

<!--<script type = "text/javascript">

    function changeImage()
    {
    var img = document.getElementById("img");
    img.src = images[x];
    x++;

    if(x >= images.length){
        x = 0;
    } 
   var timerid = setInterval(changeImage(), 10);
   }
var images = [], x = 0;
images[0] = "images/ad2.jpg";

      </script>
-->
</head>


<div><?php include("include_shoppi/topbar.php"); ?></div>

<div><?php include("include_shoppi/header.php"); ?></div>

<div><?php include("include_shoppi/navbar.php"); ?></div>

<div><?php include("include_shoppi/post_body.php"); ?></div>


<div><?php include("include_shoppi/foot.php"); ?></div>

</body>
</html>