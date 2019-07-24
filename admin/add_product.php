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

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post" action="#" enctype="multipart/form-data">
			<h2 align="center"><strong>ADD Product</strong></h2>
			<hr class="colorgraph">
			<div class="row">
				
					<div class="form-group">
                    <label>Enter Product Name:</label>
                        <input  type="text" name="product_title"  class="form-control" placeholder="Enter Product Name" tabindex="4" required="required">
					</div>
			
				
			
           		
					<div class="form-group">
                    <label>Select Image:</label>
						<input type="file" name="product_img1" required="required"  class="form-control "  tabindex="5">
					</div>
				
					<div class="form-group">
                    <label>Select Image:</label>
						<input type="file" name="product_img2" required="required"  class="form-control "  tabindex="5">
					</div>
				


				<div class="form-group">
                <label>Set Price for the Product:</label>
                        <input  type="number" name="product_price"  class="form-control" placeholder="Enter Product Price" tabindex="4" required="required">
					</div>
				</div>
                <div class="form-group">
                <label>Enter Quantity:</label>
                <input  type="number" name="pquantity"  class="form-control " placeholder="Enter Product Quantity" tabindex="4" required="required">
					</div>
                
                <div class="form-group">
  <label>Select Game the Product Belongs:</label><br>
  <?php include("includes/connect.php"); ?>
<font size="3px"><select id="mySelect1" name="game">

  <option value="0"><--select Game-->
<?php $result1 = mysqli_query($con,"select * from games");
	$numrows = mysqli_num_rows($result1);

		while($row = mysqli_fetch_array($result1))
		
	{
	$gno = $row['gno'];
	 $gnm = $row['gnm']; 
?>  
  <option value="<?php echo $gno?>"><?php echo $gnm; ?>
  
<?php } ?>
 </select></font>
   </div>



			<div class="form-group">
    <textarea  type="text"  name="product_disc" class="form-control" cols="20" rows="5"   placeholder="Enter Product Description"></textarea>
  </div>

			
     
			<div class="row" >
				<div><center><input type="submit" value="ADD PRODUCT" name="insert" class="btn btn-primary" tabindex="6"></div>
                </center></div>
          </form>
          </div>
          </div>
          </div>
           


<?php

include("includes/connect.php");

if(isset($_POST['insert']))
{
	$product_title= $_POST['product_title'];
	  $product_price=$_POST['product_price'];
	$product_disc=$_POST['product_disc'];
	$quantity = $_POST['pquantity'];
	$gno = $_POST['game'];

	 $image1_name = $_FILES['product_img1']['name'];
	 $image1_tmp = $_FILES['product_img1']['tmp_name']	; 
	 $image1_size = $_FILES['product_img1']['size'];
	  $image1_type = $_FILES['product_img1']['type'];


 $image2_name = $_FILES['product_img2']['name'];
	 $image2_tmp = $_FILES['product_img2']['tmp_name']	; 
	 $image2_size = $_FILES['product_img2']['size'];
	  $image2_type = $_FILES['product_img2']['type'];





	 
	 
				move_uploaded_file($image1_tmp,"../shoppi_images/$image1_name");
			   
		 
	
	 
	 
				move_uploaded_file($image2_tmp,"../shoppi_images/$image2_name");
	
	 
	 
	 
	  $result1 = "insert into product(pname,pimg1,pimg2,pprice,pdetail,pquantity,gno) values('$product_title','$image1_name','$image2_name','$product_price','$product_disc','$quantity','$gno')";
      
	if(mysqli_query($con,$result1))
	{
		 echo "<script>alert('product has been added')</script>";
	}
}

?>

</div>           
</body>
</html>