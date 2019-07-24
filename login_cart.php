<?php
session_start(); 
include("includes/connect.php");
if(isset($_POST['login'])){
$id = $_GET['pno'];
	 $user_name = mysql_real_escape_string($_POST['username']);
	 $password = mysql_real_escape_string($_POST['password']);
	
	$encrypt = md5($password);
	
		
$login_query = mysqli_query($con,"select * from user where email='$user_name' and password = '$password'");
$numrows1 = mysqli_num_rows($login_query);

while($row = mysqli_fetch_array($login_query))
  {
	$user_id = $row['user_id']; 
	$p = $row['p'];
	$username = $row['username'];
	
	
if($numrows1==1){
    $_SESSION['user_id'] = $user_id;
	$result = mysqli_query($con,"select * from cart where user_id = '$user_id' and pno='$id'");
    $numrows = mysqli_num_rows($result);

       if($numrows==0 && $p == 0)
         { 
			echo "<script>window.open('cart_user.php?pid=$id','_self')</script>";
 		 }
 		else{
	 			$result = mysqli_query($con,"select * from cart where pno=$id and user_id=$user_id");
     $numrows = mysqli_num_rows($result);

      while($row = mysqli_fetch_array($result))
         { 
  	         $quantity = $row['quantity'];
			 $total = $row['total'];
   			 $result1 = mysqli_query($con,"select * from product where pno=$id");
  			 $numrows1 = mysqli_num_rows($result1);
             while($row = mysqli_fetch_array($result1))
  					{ 
    					echo $price = $row['pprice'];
	  				    echo $quantity = $quantity + 1;
			            echo $total = $total + $price;
   
   						$query = "UPDATE `cart` SET `quantity`='$quantity',`total`=$total WHERE user_id='$user_id' and pno = '$id'";
	
							if(mysqli_query($con,$query)){
										echo "<script>alert('Added To CART.....Successful')</script>";
										echo "<script>window.open('shoppi_user.php','_self')</script>";
										}
                    } 
         }
	 			}
	}
	
  }
  
  
  if($numrows == 0){
		echo "<script>alert('username or password is incorrect!')</script>";
		echo "<script>window.open('index.php?pno=$id#popup3','_self')</script>";
	}
	if($numrows == 1 && $p == 1  ){
		echo "<script>alert('username or password is incorrect!')</script>";
		echo "<script>window.open('index.php?pno=$id#popup3','_self')</script>";
	}
}
?>
