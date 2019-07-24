<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}
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
@$id = $_GET['pid'];
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
<form  method="post" action="cart_user.php?pid=<?php echo $id?>" enctype="multipart/form-data">
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
      <tr><td>
       <div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6">
  <div class="form-group">
    <?php
	$r0 = mysqli_query($con,"select * from product where pno = '$id'");
    $n0 = mysqli_num_rows($r0);

while($r10 = mysqli_fetch_array($r0))
  {

		$quantity1 = $r10['pquantity'];
		 if($quantity1 >=50) {
		?>
       
  <label>Quantity:</label>
<font size="3px"><select id="mySelect" name="quantity" onchange="myFunction()">
  <option value="0"><--Quantity-->
  <option value="1">1
  <option value="2">2
  <option value="3">3
  <option value="4">4
  <option value="5">5
  <option value="6">6
  <option value="7">7
  <option value="8">8
  <option value="9">9
  <option value="10">10
  <option value="11">11
  <option value="12">12
  <option value="13">13
  <option value="14">14
  <option value="15">15
  <option value="16">16
  <option value="17">17
  <option value="18">18
  <option value="19">19
  <option value="20">20
  <option value="21">21
  <option value="22">22
  <option value="23">23
  <option value="24">24
  <option value="25">25
  <option value="26">26
  <option value="27">27
  <option value="28">28
  <option value="29">29
  <option value="30">30
  <option value="31">31
  <option value="32">32
  <option value="33">33
  <option value="34">34
  <option value="35">35
  <option value="36">36
  <option value="37">37
  <option value="38">38
  <option value="39">39
  <option value="40">40
  <option value="41">41
  <option value="42">42
  <option value="43">43
  <option value="44">44
  <option value="45">45
  <option value="46">46
  <option value="47">47
  <option value="48">48
  <option value="49">49
  <option value="50">50
 </select></font>
 <?php }
 else {
  ?>
   <label>Quantity:</label>
<font size="3px"><select id="mySelect" name="quantity" onchange="myFunction()">
  <option value="0"><--Quantity-->
  <?php for($i=1; $i <= $quantity1;$i++) {?>
  <option value="<?php echo $i?>"><?php echo $i ?>
<?php } ?>
 </select></font>
  <?php }}?>
   </div>
   </div>
   <div class="col-xs-12 col-sm-6 col-md-6">
   <div class="form-group">
   <label>Total Amount:</label>
       <h4 align="center" id="demo"></h4>
        <script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    var z = (x * '<?php echo $price?>');
    document.getElementById("demo").innerHTML = z + "/-" ;
}
</script>
	</div>
	</div>
    </div>
      
      
      </td></tr>
    <tr align="center"><td><br /><button  style=" width:250px; height:40px" type="submit" class="btn btn-danger" name="add"><i class="fa fa-shopping-cart" aria-hidden="true"> ADD to CART</i></button></td></tr>
	
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
    
    <?php 
	if($price >= 300){?>
		<tr><td><font color="#6600FF"><b>Free Delivery</b></font></td></tr>
       
		<?php
	}
	
		else {
	?>
    <tr><td><font color="#6600FF"><b>+30 Delivery Chargies</b></font></td></tr>
    	<?php
		}
	?>
    
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
<?php
if(isset($_POST['add'])){
	 $quantity = $_POST['quantity'];
	  $total = $quantity * $price;
	
if($quantity == 0){
	 	echo "<script>alert('Select Quantity')</script>";
             }
if($quantity != o){			 
	$query = "insert into cart(cart_id,user_id,quantity,total,pno) values(NULL,'$user_id','$quantity','$total','$id')";
	
	if(mysqli_query($con,$query)){
		echo "<script>alert('Added To CART.....Successful')</script>";
		echo "<script>window.open('shoppi_user.php','_self')</script>";

	}
}
}?>