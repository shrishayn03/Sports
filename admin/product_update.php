<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="login_style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<title>add product</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">
<div>
<?php 
include("includes/connect.php");
$pno = @$_GET['pno'];

$r = mysqli_query($con,"select * from product where pno = '$pno'");
$n = mysqli_num_rows($r);

while($row = mysqli_fetch_array($r))
  {
	$pno = $row['pno']; 
	$price = $row['pprice'];
	
 

?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post" action="#" enctype="multipart/form-data">
			<h2 align="center"><strong>ADD Product</strong></h2>
			<hr class="colorgraph">
			<div class="row">
				
					
			
				
			
           		
				


				<div class="form-group">
                <label>Set Price for the Product:</label>
                        <input  type="number" value="<?php echo $price ?>" name="product_price"  class="form-control" placeholder="Enter Product Price" tabindex="4" required="required">
					</div>
				</div>
                <div class="form-group">
                <label>Update Quantity:</label>
                <input  type="number" name="quantity"  class="form-control " placeholder="Enter Product Quantity" tabindex="4">
					</div>
                
                <div class="form-group">

   </div>

<?php } ?>


			
     
			<div class="row" >
				<div><center><input type="submit" value="Update PRODUCT" name="insert" class="btn btn-primary" tabindex="6"></div>
                </center></div>
          </form>
          </div>
          </div>
          </div>
           


<?php

include("includes/connect.php");

if(isset($_POST['insert']))
{
	$uquantity = $_POST['quantity'];
    $product_price=$_POST['product_price'];
    $r1 = mysqli_query($con,"select * from product where pno = '$pno'");
    $n1 = mysqli_num_rows($r);

while($row = mysqli_fetch_array($r1))
  {

		$quantity = $row['pquantity']; 
	    $uquantity = $uquantity + $quantity;
	  $result1 = "update product set pprice = $product_price ,pquantity = $uquantity where pno = $pno";
      
	if(mysqli_query($con,$result1))
	{ 
		 echo "<script>window.open('view_products.php','_self')</script>";

	}
}

}
?>

</div>           
</body>
</html>