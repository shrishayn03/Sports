
<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}
 $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login_style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<title>order</title>
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript">
//Function to allow only numbers to textbox
function validate(key)
{
//getting key code of pressed key
var keycode = (key.which) ? key.which : key.keyCode;
var phn = document.getElementById('mobileno');
//comparing pressed keycodes
if ((keycode < 48 || keycode > 57))
{
return false;
}
else
{
//Condition to check textbox contains ten numbers or not
if (phn.value.length <10)
{
return true;
}
else
{
return false;
}
}
}

</script>
<script>
function phonenumber(inputtxt)  
{  
  var phoneno = /^\d{10}$/;  
  if(inputtxt.value.match(phoneno))  
  {  
      return true;  
  }  
  else  
  {  
     alert("Not a valid Phone Number");  
     return false;  
  }  
  }
</script>



</head>
<body>

<div><?php include("include_shoppi/topbar.php"); ?></div>

<div><?php include("include_shoppi/header.php"); ?></div>

<div><?php include("include_shoppi/navbar_user.php"); ?></div>

<?php  

include("includes/connect.php");

$result = mysqli_query($con,"select * from user where user_id = $user_id");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$username = $row['username']; 
	$mobileno = $row['mobile_no'];
	$email = $row['email'];
	$address = $row['address'];

?>

<div style="width:40%; float:left; padding-left:10px">
<form method="post" action="#" enctype="multipart/form-data">

 <div class="form-group">
    <label>Customer Name:</label>
    <input type="text" value="<?php echo $username  ?>" name="username" class="form-control" id="name"  placeholder="Enter Customer Name " required>
  </div>
  
 <div class="form-group">
    <label>Email:</label>
				<input type="email" value="<?php echo $email ?>" name="email" id="email" class="form-control" placeholder="Enter Email Address" required >
			</div>
  
  <div class="form-group">
    <label>Mobile Number:</label>
    <input type="text" value="<?php echo $mobileno  ?>" name="mobileno" class="form-control" id="mobileno"  placeholder="Enter mobile Number" onkeypress="return validate(event)" required>
  </div>
  
  <div class="form-group">
    <label>Enter Address:</label>
    <textarea  type="text"  name="address" class="form-control" cols="20" rows="5"   placeholder="Enter Delivery Address"><?php echo $address ?></textarea>
  </div>
  
  <div class="form-group">
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
    <label>Total Amount:</label>
    <br><b><font size="3px"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total_amt ?>/-</font></b>
  <?php }?>
  </div>
  
  <div class="form-group">
  <label>Select Mode OF Payment:</label><br>
<font size="3px"><select id="mySelect1" name="mode">
  <option value="0"><--Mode Of Payment-->
  <option value="1">Cash on Delivery
  <option value="2">Credit Card
  <option value="3">Net Banking
  <option value="4">Dedit Card
 
 </select></font>
   </div>
 
  
  
  
  <center><br><button style="border-radius:50%; width:200px" name="place" onclick="return phonenumber(mobileno)" type="submit" class="btn btn-primary">Place Order</button></center>

</div>										


</table>
</form>
</div>


<?php }?>
















<div style="float:right; width:50%; padding-right:2px"
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
	$price = $row['pprice'];
	
 
?>
<form  method="post" action="cart.php" enctype="multipart/form-data">
<div>
<div style="margin-left:30px; float:left; border-left-color:#999;" >
<div class="col-md-3 products-right-grids-bottom-grid" >
<div class="col-md-3 products-right-grids-bottom-grid" >
	<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".3s">
	<div class="panel panel-default">
	<div class="products-right-grids-bottom">
            
            
			</div>
          </div>
	</div>
	</div>
  
</div >
  
<div style="float:right; margin-right:30px;">

<table width="400px">
<tr>
	<td align="center"><h3><?php echo $pname;?></h3>
	</td>
	</tr>
  
    
     <tr>
	<td>
	<p><b><u>Quantity:</u></b><h5><?php echo $quantity;?></h5></p>
	  
	</td>
    <td>
	<p><b><u>Amount:</u></b><h5><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total;?>/-</h5></p>
	  						
	
	</td>
    </tr>





</table>

<hr />




   
    

</div>	
</div>

</form>
<?php } ?>

</div>
			
	

</body>
</html>



<?php 

 
 if(isset($_POST['place'])){
	 $pi = $_GET['pno'];
	 $name = $_POST['username'];
	 $email = $_POST['email'];
	 $mobileno = $_POST['mobileno'];
	 $addr = $_POST['address'];
      $quantity = $_POST['quantity'];
	  $total = $quantity * $price;
	  $value = $_POST['mode'];
	  $date = date('y-m-d');
	  
	 if($value == 0){
	echo "<script>alert('Select Mode Of Payment')</script>";
 }
	  if($value == 1){
		  $mode = 'Cash on Delivery';
		  }
	  if($value == 2){
		  $mode = 'Credit Card';
		  }
		  if($value == 3){
		  $mode = 'Net Banking';
		  }
	  if($value == 4){
		  $mode = 'Debit Card';
		  }
	  
	   if($value != 0){
		     $query = "INSERT INTO `order`(`cust_id`, `cust_name`, `cust_email`, `cust_mobileno`, `cust_addr`, `mode`, `user_id`) VALUES (NULL, '$name', '$email', '$mobileno', '$addr','$mode', '$user_id')
";

	if(mysqli_query($con,$query)){
		$run =  mysqli_query($con,"SELECT cust_id FROM `order` where user_id= '$user_id' order by 1 desc limit 0,1");
		
		while($r = mysqli_fetch_array($run))
        { 
		
	    $cust_id = $r['cust_id'];
		
		$run =  mysqli_query($con,"SELECT * FROM `cart` where user_id= '$user_id'");
          while($r = mysqli_fetch_array($run))
           { 
		      $pno = $r['pno'];
	          $quantity = $r['quantity'];
	          $total = $r['total'];
              $r0 = mysqli_query($con,"select * from product where pno = '$pno'");
    $n0 = mysqli_num_rows($r0);

while($r10 = mysqli_fetch_array($r0))
  {

		$quantity1 = $r10['pquantity']; 
	    $uquantity =  $quantity1 - $quantity;
	  $result1 = "update product set pquantity = $uquantity where pno = $pno";
	  if(mysqli_query($con,$result1)){
		
	   }
  }		
		
		
		$query1 = "INSERT INTO `order_item`(`item_id`, `cust_id`, `pno`, `user_id`, `order_quantity`, `total`, `order_date`) VALUES (NULL,'$cust_id','$pno','$user_id','$quantity','$total','$date')";
	if(mysqli_query($con,$query1)){
		echo "<script>alert('Order Placed')</script>";
        echo "<script>window.open('display_order_user.php','_self')</script>";
	   }
		}
		
		
		}
		
		
		
		}
 }
    
 
 }


?>
 
 
 
 
 

