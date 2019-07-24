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
<style> 
input:checked {
    height: 30px;
    width: 30px;
}
</style>
 <script>
function selectToggle(toggle, form) {
     var myForm = document.forms[form];
     for( var i=0; i < myForm.length; i++ ) { 
          if(toggle) {
               myForm.elements[i].checked = "checked";
          } 
          else {
               myForm.elements[i].checked = "";
          }
     }
}  </script>
</head>

<body>

<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">







<form name="theForm" action="#" method="post">
<table align="center" bgcolor="#339999" width="750" border="3">

<tr>
	<td colspan="8" align="center" bgcolor="#FHCK"><h2>All Products</h2></td>
    </tr>

<tr align="center" height="50px">
<td><b>Product Name</b></td>
<td><b>Image 1</b></td>
<td><b>Image 2</b></td>
<td><b>Price</b></td>
<td><b>Description</b></td>
<td><b>Stock</b></td>
<td><b>Update</b></td>
<td><b>Delete</b></td>
</tr>

<?php
include("includes/connect.php");
$i=1;


		$result = mysqli_query($con,"select * from product order by 1 DESC");
		$numrows = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result))
		{
		$id = $row['pno'];
		$title = $row['pname'];
			$image1 = $row['pimg1'];
			$image2 = $row['pimg2'];
			$product_price = $row['pprice'];
			$product_quantity = $row['pquantity'];
			$product_disc = substr($row['pdetail'],0,50);
	
?>
<tr align="center">
<td><?php $text1 = wordwrap($title,20,"<br>\n",true); echo $text1; ?> </td>
<td><img src="../shoppi_images/<?php echo $image1; ?>" width="50" height="50"></td>
<td><img src="../shoppi_images/<?php echo $image2; ?>" width="50" height="50"></td>
<td><?php echo $product_price; ?>/-</td>
<td><?php $text = wordwrap($product_disc,30,"<br>\n",true); echo $text; ?></td>
<td><?php echo $product_quantity; ?></td>
<td><a href="product_update.php?pno=<?php echo $id?>">Update</a></td>
 
<td width="20"><input id="check" type="checkbox" name="checkbox[]" value="<?php echo $id ?>"></td>



</tr>

<?php } ?>

</table>
<br />


<div style="float:right; margin-right:50px">
  <button type="button" class="btn btn-primary" onclick="selectToggle(true, 'theForm')">select All</button>
    <button type="button" class="btn btn-primary"  onclick="selectToggle(false, 'theForm')">Unselect All</button>
   <button type="submit" class="btn btn-primary" name="del">Delete</button>
</div>
</form>
<?php
if(isset($_POST['del'])){
if(!empty($_POST['checkbox'])){
foreach($_POST['checkbox'] as $selected){
$delete_query = " delete from product where pno=$selected";
 if(mysqli_query($con,$delete_query)){
		echo "<script>alert('product has been Deleted')</script>";
		echo "<script>window.open('view_products.php','_self')</script>";
	}
}
}
}
?>
</div>
<body>
</body>
</html>