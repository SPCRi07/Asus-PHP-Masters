<?php

session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();


if(isset($_POST['searchbox']))
{
$con=mysqli_connect("localhost","root","","dbtry");
if(!$con)
{
die("Connection Error");
}
else
{
$name=$_POST['searchbox'];
$sql="SELECT * from tblproduct where name='$name'";
$result=mysqli_query($con,$sql);
}
}
?>

<html>
<head>
			<link rel="stylesheet" type="text/css" href="css/product.css">
		</head>
		<form method="post">	
		<body>
			<?php include "header.php" ?>
			Enter Product Name:
<input type="text" name="searchbox">
	<button><input type="submit" name="search" value="search"></button>
			<?php
			while($row=mysqli_fetch_assoc($result))
			{
			?>

  <div class="card">  
  <img src="<?php echo $row['image']; ?>" alt="Denim Jeans" style="width:100% ">
  <h1 style="color:white;"><?php echo $row['name']; ?></h1>
  <p class="price"><b>PRICE:</b><?php echo "$".$row['price']; ?></p>
  <p style="color:white;"> <b><?php echo "$".$row['desc']; ?></b></p>
  <?php } ?>

</div>
</body>
</html>





