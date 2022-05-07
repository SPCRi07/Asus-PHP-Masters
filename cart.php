<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			//var_dump($_REQUEST);
			$productByCode = $db_handle->getdatabyid($_REQUEST["uid"]);
			$result = $productByCode->toArray();
			
			$elements = json_decode(json_encode($productByCode), true);
			var_dump($productByCode);
			var_dump($elements);
		//	echo $elements[0][0]["name"];

			$itemArray = array($elements[0]["uniqueid"]=>array('name'=>$elements[0][0]["name"], 'code'=>$elements[0][0]["uniqueid"], 'quantity'=>$_POST["quantity"], 'price'=>$elements[0][0]["price"], 'image'=>$elements[0][0]["image"]));
			

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($elements[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($elements[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
							}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>


<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="css/style2.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
	 <?php include "header.php" ?>
<div id="shopping-cart">
<div class="txt-heading"><p style="font-size:20px; color:green;font-family:sans-serif;";>Shopping Cart</p></div>

<a id="btnEmpty" href="index.php?action=empty"><p style="font-size:20px; color:green;font-family:sans-serif;";>Empty Cart</p></a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><p style="font-size:15px; color:green;font-family:sans-serif;";>Name</p></th>
<th style="text-align:left;"><p style="font-size:15px; color:green;font-family:sans-serif;";>Code</p></th>
<th style="text-align:right;" width="5%"><p style="font-size:15px; color:green;font-family:sans-serif;";>Quantity</p></th>
<th style="text-align:right;" width="10%"><p style="font-size:15px; color:green;font-family:sans-serif;";>Unit Price</p></th>
<th style="text-align:right;" width="10%"><p style="font-size:15px; color:green;font-family:sans-serif;";>Price</p></th>
<th style="text-align:center;" width="5%"><p style="font-size:15px; color:green;font-family:sans-serif;";>Remove</p></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="image/id.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records"><p style="font-size:20px; color:green;font-family:sans-serif;";>Your Cart is Empty</p></div>
<?php 
}
?>
</div>

</BODY>
<?php include "footer.php" ?>

</HTML>

