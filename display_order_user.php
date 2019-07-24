
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

<title>Order Place</title>
</head>
<body>


<div><?php include("include_shoppi/navbar_user.php"); ?></div>



<?php 
include("includes/connect.php");
$cust_id;
$a = 0;
$run =  mysqli_query($con,"SELECT cust_id FROM `order` where user_id= '$user_id' order by 1 desc limit 0,1");
		
		while($r = mysqli_fetch_array($run))
        { 
	    $cust_id = $r['cust_id'];
		}
?>

<center><h1><u><i>Order Placed</i></u></h1></center>

<?php 
include("includes/connect.php");
$result = mysqli_query($con,"SELECT * FROM `order` WHERE `cust_id`= $cust_id");
$numrows = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result))
  {
	$name = $row['cust_name'];
	$address = $row['cust_addr'];
	$mobile = $row['cust_mobileno'];
	$email = $row['cust_email'];
	$mode = $row['mode'];

?>

<table align="center" cellpadding="4">
<tr><td><?php echo $name ?></td></tr>
<tr><td><?php echo $email ?></td></tr>
<tr><td><?php echo $mobile ?></td></tr>
<tr><th>Shipping Address</th></tr>
<tr><td align="center"><?php echo $address ?></td></tr>
</table>
<br>

<table align="center" border="8px" width="70%" cellpadding="6px">

<tr align="center" style=" border-bottom-color: solid #000">
<td><b><u><i>Sr.no.</i></u></b></td>
<td><b><u><i>Product Name</i></u></b></td>
<td><b><u><i>Price</i></u></b></td>
<td><b><u><i>Quantity</i></u></b></td>
<td><b><u><i>Total Price</i></u></b></td>
</tr>

<?php 
$results = mysqli_query($con,"select * from order_item,product where order_item.pno=product.pno and `cust_id`= $cust_id");
$numrows2 = mysqli_num_rows($result);
while($rowss = mysqli_fetch_array($results))
  {
	$pno = $rowss['pno'];
	$pname = $rowss['pname'];
	$price = $rowss['pprice'];
	$quantity = $rowss['order_quantity'];
	$total = $rowss['total'];

?>


<tr align="center">
<td><?php echo $a = $a + 1; ?></td>
<td><?php echo $pname; ?></td>
<td><?php echo $price; ?> /-</td>
<td><?php echo $quantity; ?></td>
<td><?php echo $total; ?> /-</td>
</tr>



<?php } ?>

<tr>
<td colspan="4" align="right" > <b><i>Total Amount:</i></b></td>
<?php
$result1 = mysqli_query($con,"select * from order_item where cust_id='$cust_id'");
$numrows1 = mysqli_num_rows($result);
$total_amt = 0;
while($rows = mysqli_fetch_array($result1))
  {
	$total  = $rows['total'];
    $total_amt = $total_amt + $total;
  }
  
  if($numrows1 > 0){
?>
   <td align="center"><b><font size="3px"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total_amt ?>/-</font></b></td>
  <?php }?>
</tr>


<tr align="center">
<td><b><i>Mode Of Payment:</i></b></td>
<td colspan="2"><?php echo $mode ?></td>
<td><b><i>Payment:</i></b></td>

<?php if($mode == 'Cash on Delivery')
{
?>
<td><font color="#FF0000">Pending</font></td>
<?php } 
else
{
?>
<td><font color="#009933">DONE</font></td>
<?PHP } ?>
</tr>

</table>
<?php } ?>


<br />

<form action="#" method="post">
<center><br><button style=" width:500px" name="con" type="submit" class="btn">Continue Shopping....</button></center>

</form>
</div>
</body>
</html>

<?php
if(isset($_POST['con'])){
		echo "<script>window.open('shoppi_user.php','_self')</script>";
	

}?>