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



</head>

<body>

<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">
<?php $date = $_GET['date'];?>



<br />

<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->


        <div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="form-horizontal" method="post" action="#">
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="date">
       Date
       
     </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
       </div>
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2"><br />
       <button class="btn btn-primary " name="submit" type="submit">
        Search
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>


<br /><br />
<table align="center" bgcolor="#339999" width="750"; border="6" cellpadding="3">
<tr>
	<td colspan="2" align="center" bgcolor="#CCFF33">
    <h2>Sales Report off <?php  echo $date; ?></h2></td>
    </tr>


<tr align="center">

<th><center>Product Name</center></th>
<th><center>Total Quantity Sold</center></th>
</tr>

<?php
include("includes/connect.php");

$i=1;

	
	$result5 = mysqli_query($con,"select distinct(pname), sum(order_quantity) as sum from product,order_item where product.pno = order_item.pno  and order_date = '$date' GROUP BY pname Having sum >0 ");
		$numrows = mysqli_num_rows($result5); 


		while($row = mysqli_fetch_array($result5))
		{
		
		  $pname = $row['pname'];
		  $sum = $row['sum'];
			
		
	
?>
<tr align="center">


    <td><?php echo $pname;?></td>
    <td><?php echo $sum;?></td>
 
</tr>


<?php } ?>

</table>


<?php
if(isset($_POST['submit'])){
	 $date = $_POST['date'];
	echo "<script>window.open('date_report.php?date=$date','_self')</script>";

}
?>

</div>
</body>
</html>