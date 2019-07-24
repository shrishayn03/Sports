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
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Sports Section</title>
</head>

</head>

<div><?php include("admin_sidebar.php");?></div>
<div class="post_body_user">
<p><span style="color:white; padding:5px; margin:5px"><strong>:</strong>
<?php
 include("includes/connect.php");
?>
</span></p>







<table align="center" bgcolor="#339999" width="600"; border="6">

<tr>
	<td colspan="8" align="center" bgcolor="#CCFF33">
    <h2>Customer Orders</h2></td>
    </tr>


</table>

<?php
include("includes/connect.php");



		$result = mysqli_query($con,"SELECT * FROM `order` where c = 0");
		$numrows = mysqli_num_rows($result);
$i=1;
		while($row = mysqli_fetch_array($result))
		{
			$cust_id=$row['cust_id'];
		$cust_name = $row['cust_name'];

			//$password= $row['password'];
		
	
?>
<form method="post" action="confirm.php?cust_id=<?php echo $cust_id?>">
<style>
.button {
    background-color:  #008CBA; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 1px 1px;
    cursor: pointer;
}
.button2 {background-color: #008CBA;}
</style>
<div align="justify">
<div align="left" width=20%>

	<?php echo " " ;?></div>
	<p></p>
    <div align="center" width=40%><?php 
	
	
	
	?></div>
    <div align="center" width=25%><?php echo $cust_name;?> 
    <button class="button button2" align="right" name= "confirm" value="confirm">CONFIRM NOW</button>
       </p>
      </div> 
       </div>
</form>     

<?php } ?>

</div>
</body>
</html>
