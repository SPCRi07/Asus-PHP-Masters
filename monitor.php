
<?php 
session_start();
require_once("DBController.php");
$db_handle = new DBController();
$d=$db_handle->getdatabydep("monitor");
$s=$db_handle->insertrawdata();
foreach($d as $r)
{


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
 
	<form method="post" action="">

<br>
  <div class="card">  
  <img src="<?php echo $r->image ?>" alt="Product" style="width:100% ">
  <h1 style="color:white;"><?php echo $r->name; ?></h1>
  <p class="price"><b>PRICE:</b><?php echo "$".$r->price; ?></p>
  <p style="color:white;"> <b><?php echo $r->specification; ?></b></p>
   <p><h3 style="color:white;">Enter Quantity</h3><p style="margin:20px; padding:10px;"><input type="text"  name="quantity" value="1" size="2" /></p><input type="submit" class="i" value="Add to Cart" name="submit" formaction="index.php?action=add&code=<?php echo $r->uniqueid; ?>"></p>
  <p><button>Buy Now</button></p>
</div> 

<?php } ?>
<br>
<br>
<hr>
 


</form>
</body>
</html>
