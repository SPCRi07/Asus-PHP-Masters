
<?php 
session_start();
require_once("DBController.php");
$product=$_GET['type'];
$db_handle = new DBController();
$data=$db_handle->getdatabydep($product);
?>

<html>
<head>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

	<form method="POST" action="">

<?php 
foreach($data as $row)
{


?>

<br>


<div class="card" style="width: 20rem; padding: 10px;" >
  <img src="<?php echo $row->image ?>" class="card-img-top" alt="Image">
  <div class="card-body">
  <ul class="list-group list-group-flush" style="max-width:120dp">

 <li class="list-group-item"> <h5 class="card-title"><?php echo $row->name; ?></h5></li>

 <li class="list-group-item">  <p class="card-text"><b>Price:</b><?php echo "$".$row->price; ?></p></li>

 <hr>  
</div>

    <li class="list-group-item"> <p class="card-text">Specification: -</p>
    </li>
<li class="list-group-item">
    <?php $str =$row->specification; 
      $s;    
    if($product=="motherboard"){
      $s=(explode("\\r\\n",$str));
    }
    else
    {
      $s=(explode(",",$str));  
    }
    echo "<ul>";
    foreach($s as $r)
    {
      echo "<li>".$r."</li>";
    }
    echo "<ul>";
    ?>
    </li>
    </ul>
    <ul class="list-group list-group-flush" style="align-items: flex-start;">
    <li class="list-group-item" >
      <input type="hidden" name="code" value="<?php echo  $row->uniqueid; ?>"/>
  <p ><h3 style="color:black; align-self: flex-start; text-align: left;">Enter Quantity</h3></p>
  <input type="number" id="quantity"  name="quantity" value="1" size="2" style="max-width: 150px; align-content: flex-start;"/></li>
  <li class="list-group-item">
  <input type="submit" class="btn btn-primary" value="Add to Cart" name="submit" formaction="cart.php?action=add&uid=<?php echo $row->uniqueid; ?>" >
   </p>
<hr>
  <a href="#" class="btn btn-primary">Buy Now</a>
  </li>
  </ul>
 </div>

<?php } ?>
<br>
<br>
<hr>
 


</form>
</body>
<?php include "footer.php"?>
</html>
