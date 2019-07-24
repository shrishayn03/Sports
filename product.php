<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="shoppi.css" />
<title>Untitled Document</title>
</head>
<body>
<div><?php include("include_shoppi/topbar.php"); ?></div>

<div><?php include("include_shoppi/header.php"); ?></div>

<div><?php include("include_shoppi/navbar.php"); ?></div>




<?php
$id = $_GET['pid'];
include("include_shoppi/connect.php");

$result = mysqli_query($con,"select * from product where pno=$id");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  { 
	$pno = $row['pno'];
	$pname = $row['pname'];
	$detail = $row['pdetail'];
	$price = $row['pprice'];
	$image1 = $row['pimg1'];
	$image2 = $row['pimg2'];
 
?>
<form  method="post" action="product_direct.php?pno=<?php echo $pno?>" enctype="multipart/form-data">
<div style="margin-left:10px" >
<div class="col-md-3 products-right-grids-bottom-grid" >
<div class="col-md-3 products-right-grids-bottom-grid" >
	<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".3s">
	<div class="panel panel-default">
	<div class="products-right-grids-bottom">
            
            <div class="panel-body">
             <table  align="center" >
			 <tr>
	<td colspan="2" align="center">
	<div class="new-collections-grid1-image">
    
 
      
    <a href="#"><img src="shoppi_images/<?php echo $image1; ?>"
        onmouseover="this.src='shoppi_images/<?php echo $image2?>';"
        onmouseout="this.src='shoppi_images/<?php echo $image1; ?>';" height="300px" width="400px"/></a>
								</div>
								</div>
	</div>		
</td>
	</tr>
     <?php
	$r0 = mysqli_query($con,"select * from product where pno = '$id'");
    $n0 = mysqli_num_rows($r0);

while($r10 = mysqli_fetch_array($r0))
  {

		$quantity1 = $r10['pquantity'];
		
		if($quantity1 != 0){ 
		?>
    <tr align="center"><td><br /><br /><button style=" width:250px; height:40px;" type="submit" class="btn btn-warning" name="bye_u"><i class="fa fa-play" aria-hidden="true"> BUY NOW</i></button></td></tr>
	</tr>
    
    <tr align="center"><td><br /><button  style=" width:250px; height:40px" type="submit" class="btn btn-danger" name="cart_u"><i class="fa fa-shopping-cart" aria-hidden="true"> ADD to CART</i></button></td></tr>
	<?php }
	else {
	?>
        <tr align="center"><td><br /><button  style=" width:250px; height:40px" type="submit" class="btn btn-danger" disabled="disabled" name="cart_u"> Out Of Stock</i></button></td></tr>

	<?php }} ?>
	</table>
            </div>
			</div>
          </div>
	</div>
	</div>
</div >
</form>
<div style="float:right; margin-right:100px;">

<table width="400px">
<tr>
	<td align="center"><h2><?php echo $pname;?></h2><br />
	</td>
	</tr>
    
    <tr>
	<td>
	<p><b><u>Price:</u></b><h3><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $price;?>/-</h3></p>
	  <br />						
	
	</td></tr>
  
    <tr><td><font color="#00FFFF"><b>Cash On Delivery</b></font> available  </td></tr>
    <tr><td><font color="#6600FF"><b>Free Delivery</b></font></td></tr>
       
    
    
<tr>
<td>  <br /><p><b><u>Discription:</u></b></p>
<p><b><i><?php echo  wordwrap($detail,60,"<br>\n"); ?><i></b></p></td>
</tr>




</table>



</div>

</div>
<?php } ?>

<div><?php include("include_shoppi/foot.php"); ?></div>
</body>
</html>