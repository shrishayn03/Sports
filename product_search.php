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

<div >

<div >

<?php
include("include_shoppi/connect.php");
if(isset($_GET['product_s'])){
	$search_id = $_GET['search'];
$result = mysqli_query($con,"SELECT * FROM `product` WHERE `pname` like '%$search_id%'");
$numrows = mysqli_num_rows($result);
if($numrows == 0)
{
?>
<p align="center"><i><b>Search Product is NOT Available or Exists </b></i></p>
<?php	 
	}
while($row = mysqli_fetch_array($result))
  { 
	$pno = $row['pno'];
	$pname = $row['pname'];
	$detail = $row['pdetail'];
	$price = $row['pprice'];
	$image1 = $row['pimg1'];
	$image2 = $row['pimg2'];
 
?>

<div class="col-md-3 products-right-grids-bottom-grid" >
	<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".3s">
	<div class="panel panel-default">
	<div class="products-right-grids-bottom">
            
            <div class="panel-body">
             <table class="table table-condensed" id="myTable">
			 <tr>
	<td colspan="2" align="center">
	<div class="new-collections-grid1-image">
    
 
      
    <a href="product.php?pid=<?php echo $pno?>"><img src="shoppi_images/<?php echo $image1; ?>"
        onmouseover="this.src='shoppi_images/<?php echo $image2?>';"
        onmouseout="this.src='shoppi_images/<?php echo $image1; ?>';" height="230px" width="180px"/></a>
								</div>
								</div>
	</div>		
</td>
	</tr>
	
	<tr>
	<td><a href="product.php?pid=<?php echo $pno?>"><h4><?php echo $pname;?></h4></a>
	</td>
	</tr>
	<tr>
	<td>
	<div  align="center">
								<p><h3><span class="item_price"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $price;?>/-</span></h3></p>
							</div>
	
	</td></tr>
	
	
	</table>
            </div>
			</div>
          </div>
	</div>
	</div>


<?php } ?>
</div>
<?php } ?>

</body>
</html>