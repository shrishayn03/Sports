<?php
 include("includes/connect.php"); 
$id = $_GET['pno'];

if(isset($_POST['bye_u'])){
	
		echo "<script>window.open('bye.php?pno=$id','_self')</script>";
	
}










if(isset($_POST['cart_u'])){
	session_start();
	$user_id = $_SESSION['user_id'];
	$result = mysqli_query($con,"select * from cart where user_id = '$user_id' and pno='$id'");
    $numrows = mysqli_num_rows($result);

if($numrows==0)
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












if(isset($_POST['bye'])){
	
		echo "<script>window.open('index.php?pno=$id#popup2','_self')</script>";
	
}

if(isset($_POST['cart'])){
	
		echo "<script>window.open('index.php?pno=$id#popup3','_self')</script>";
	
}

?>

