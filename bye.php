
<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: ../index.php");
}
 $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login_style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
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

<?php $id = $_GET['pno']; 

include("includes/connect.php");

$result = mysqli_query($con,"select * from user where user_id = $user_id");
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
  {
	$username = $row['username']; 
	$mobileno = $row['mobile_no'];
	$email = $row['email'];
	$address = $row['address'];
	$p = $id;
?>

<div style="width:40%; float:left; padding-left:10px">
<form method="post" action="bye.php?pno=<?php echo $p ?>" enctype="multipart/form-data">

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
  <label>Select Mode OF Payment:</label><br>
<font size="3px"><select id="mySelect1" name="mode">
  <option value="0"><--Mode Of Payment-->
  <option value="1">Cash on Delivery
  <option value="2">Credit Card
  <option value="3">Net Banking
  <option value="4">Dedit Card
 
 </select></font>
   </div>
 
  
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
	</div>
	</div>
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
        onmouseout="this.src='shoppi_images/<?php echo $image1; ?>';" height="200px" width="200px"/></a>
								</div>
								</div>
	</div>
    <tr align="center">
	<td align="center"><h2><?php echo $pname;?></h2><br />
	</td>
	</tr>
    <tr>
	<td>
	<tr align="center">
	<td align="center"><b><u>Price:</u></b><h3><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $price;?>/-</h3></td>
	</tr>
	 						
	
	</td></tr>		
</td>
	</tr>
  
	</table>
            </div>
			</div>
          </div>
	</div>
	</div>
</div >
</div>
<?php } ?>
</div>
			
	

</body>
</html>

 <script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    var z = (x * '<?php echo $price?>');
    document.getElementById("demo").innerHTML = z + "/-" ;
}
</script>


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
 if($quantity == 0){
	 	echo "<script>alert('Select Quantity')</script>";
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
	  
	   if($value != 0 && $quantity != 0){
		     $query = "INSERT INTO `order`(`cust_id`, `cust_name`, `cust_email`, `cust_mobileno`, `cust_addr`, `mode`, `user_id`) VALUES (NULL, '$name', '$email', '$mobileno', '$addr','$mode', '$user_id')
";

  
	if(mysqli_query($con,$query)){
		$run =  mysqli_query($con,"SELECT cust_id FROM `order` where user_id= '$user_id' order by 1 desc limit 0,1");
		
		while($r = mysqli_fetch_array($run))
        { 
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
	    $cust_id = $r['cust_id'];
		$query1 = "INSERT INTO `order_item`(`item_id`, `cust_id`, `pno`, `user_id`, `order_quantity`, `total`, `order_date`) VALUES (NULL,'$cust_id','$pi','$user_id','$quantity','$total','$date')";
	if(mysqli_query($con,$query1)){
		echo "<script>swal('Good job!', 'You clicked the button!', 'success')</script>";
        echo "<script>window.open('display_order_user.php','_self')</script>";
	   }
		}
		}
  
 }
    
 
 }


?>
 
 
 
 
 

