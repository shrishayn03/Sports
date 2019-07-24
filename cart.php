<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shoppi.css" />
<title>Untitled Document</title>
<script>

</script>

</head>

<body>
<div><?php include("include_shoppi/topbar.php"); ?></div>

<div><?php include("include_shoppi/header.php"); ?></div>

<div><?php include("include_shoppi/navbar_user.php"); ?></div>



<?php

include("include_shoppi/connect.php");

$result = mysqli_query($con,"select * from product,cart where cart.pno=product.pno and cart.user_id='$user_id'");
$numrows = mysqli_num_rows($result);
if($numrows == 0){?>
	<p align="center" style=" font-family:'Arial Black', Gadget, sans-serif"><b><i>No Items Added To Cart </i></b></p>
	<?php }
while($row = mysqli_fetch_array($result))
  {
	$pno = $row['pno'];
	$quantity = $row['quantity'];
	$total = $row['total'];
	$pname = $row['pname'];
	$detail = substr($row['pdetail'],0,30);
	$price = $row['pprice'];
	$image1 = $row['pimg1'];
	$image2 = $row['pimg2'];
 
?>
<form  method="post" action="cart.php" enctype="multipart/form-data">
<div>
<div style="margin-left:30px; float:left" >
<div class="col-md-3 products-right-grids-bottom-grid" >
<div class="col-md-3 products-right-grids-bottom-grid" >
	<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".3s">
	<div class="panel panel-default">
	<div class="products-right-grids-bottom">
            
            <div class="panel-body">
             <table  >
			 <tr>
	<td colspan="2" align="center">
	<div class="new-collections-grid1-image">
    
 
      
    <a href="product_cart.php?pid=<?php echo $pno?>"><center><img src="shoppi_images/<?php echo $image1; ?>"
        onmouseover="this.src='shoppi_images/<?php echo $image2?>';"
        onmouseout="this.src='shoppi_images/<?php echo $image1; ?>';"height="150px" width="150px"/></a>
			</center>					</div>
								</div>
	</div>		
</td>
	</tr>
</table>
            </div>
			</div>
          </div>
	</div>
	</div>
  
</div >
  <br /><hr /><br />
<div style="float:right; margin-right:30px;">

<table width="400px">
<tr>
	<td align="center"><a href="product_cart.php?pid=<?php echo $pno?>"><h3><?php echo $pname;?></h3></a><br />
	</td>
	</tr>
    
    <tr>
	<td>
	<p><b><u>Price:</u></b><h5><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $price;?>/-</h5></p>
	  <br />						
	
	</td></tr>
    
     <tr>
	<td>
	<p><b><u>Quantity:</u></b><h5><?php echo $quantity;?></h5></p>
	  <br />						
	
	</td>
    <td>
	<p><b><u>Amount:</u></b><h5><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total;?>/-</h5></p>
	  <br />						
	
	</td>
    </tr>
      
<tr>
<td>  <p><b><u>Discription:</u></b></p>
<p><i><?php echo $detail; ?>....<i></p></td>
</tr>



 <tr align="center"><td><br /><button style=" width:250px; height:40px;"  type="submit" value="<?php echo $pno ?>" class="btn btn-danger" name="remove"><i class="fa fa-shopping-cart" aria-hidden="true"> REMOVE from CART</i></button></td></tr>
	</tr>



</table>

<br /><hr />




   
    

</div>	
</div>

</form>
<?php } ?>




</body>
<div><br /><?php include("include_shoppi/foot.php"); ?></div>

<div style=" width:100%; padding:20px;">
<?php

include("include_shoppi/connect.php");

$result = mysqli_query($con,"select * from cart where user_id='$user_id'");
$numrows = mysqli_num_rows($result);
$total_amt = 0;
while($row = mysqli_fetch_array($result))
  {
	$pno = $row['pno'];
	
	$total  = $row['total'];
    $total_amt = $total_amt + $total;
  }
  
  if($numrows > 0){
?>
<form action="bye_cart.php" method="post" enctype="multipart/form-data">
<p><center><h3> <label><u>Total Amount:</u></label></h3>  <b><h4> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total_amt ?>/-</h4></b>
</center></p>
<p align="center"><button style=" width:250px; height:40px; padding-right:10px" type="submit" class="btn btn-warning" name="bye_all"><i class="fa fa-play" aria-hidden="true"> BUY NOW</i></button>
</p>
</form>
<?php }?>
</div>
<div><br /><?php include("include_shoppi/foot.php"); ?></div>
</html>
<?php
if(isset($_POST['remove'])){
	$a = $_POST['remove'];

$delete_query = " delete from cart where pno=$a";
 
 if(mysqli_query($con,$delete_query)){
	 
		echo "<script>alert('Product Removed From CART')</script>";
		echo "<script>window.open('cart.php','_self')</script>";
	}

}?>