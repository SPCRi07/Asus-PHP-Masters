
<?php 
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

?>
<html>
<head>
<head>
			<link rel="stylesheet" type="text/css" href="css/product.css">
      <style>
        .i{
           border: none;
          outline: 0;
    padding: 12px;
  color: white;
  background-image: radial-gradient(circle, #43be53, #32a34a, #238941, #167037, #0c572c);
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;

        }
      </style>
		</head>
<body>
<?php include "header.php" ?>
   <?php
  $product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='smartphone'");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
	<form method="post" action="">

<br>

  <div class="card">  
  <img src="<?php echo $product_array[$key]["image"]; ?>" alt="Denim Jeans" style="width:100% ">
  <h1 style="color:white;"><?php echo $product_array[$key]["name"]; ?></h1>
  <p class="price"><b>PRICE:</b><?php echo "$".$product_array[$key]["price"]; ?></p>
  <p style="color:white;"> <b><?php echo "$".$product_array[$key]["desc"]; ?></b></p>
   <p><h3 style="color:white;">Enter Quantity</h3><p style="margin:20px; padding:10px;"><input type="text"  name="quantity" value="1" size="2" /></p><input type="submit" class="i" value="Add to Cart" name="submit" formaction="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>"></p>
  <p><button>Buy Now</button></p>
</div>
<br>
<br>
<hr>
  <?php
}
}
?>



</form>
</body>
</html>
