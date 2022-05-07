<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
	.mySlides {
    max-width: 90rem;	
display:none;
	}


  #container {
   min-height:10%;
   position:relative;
}

h3{
  color:green;
  font: size 32px;
}

.text-style{
font-family:serif; 
color:green; 
font-size:32px; 
text-align:center;
}
</style>
</head>

<body>
  
<form method="POST">
<?php include "header.php" ?>
<br>
<br>
<p class="text-style">Best for Best</p>
<div class="w3-content w3-display-container" >
 <a href="productdynamic.php?type=graphics"> <img class="mySlides" src="image/2.jpg"  style=" margin-left:0px; margin-right:10px;padding-left:100px " ></a>
 <a href="productdynamic.php?type=motherboard">  <img class="mySlides" src="image/1.jpg" style=" margin-left:0px; margin-right:10px;padding-left:100px "></a>
 <a href="productdynamic.php?type=smartphone"> <img class="mySlides" src="image/3.jpg" style="margin-left:0px; margin-right:100px;padding-left:100px; "></a>
  </div> 
    
<script>

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000); 
}

</script>

<p1 style="font-family:serif; color:green; font-size:32px; text-align:center;">Republic of Gamers Represents new RTX 2070ti series for Those who has Sprit to Combine their <b>Soul</b> to <b style="font-size:45px;">NFS HEAT</b></p1>

 <center>

     <a href="productdynamic.php?type=motherboard">  <img src="image/2222.jpg" alt="Motherboard" width="400" height="200"  class="rounded">
    </a>
   <a href="productdynamic.php?type=motherboard"><h3>MotherBoard</h3></a>


     <a href="productdynamic.php?type=laptop">  <img src="image/laptop.png" alt="Laptop" width="400" height="300"  class="rounded">
    </a>
   <a href="productdynamic.php?type=laptop"><h3 >Laptop</h3></a>

     <a href="productdynamic.php?type=smartphone">  <img src="image/mobile.png" alt="SmartPhones" width="200"   class="rounded">
    </a>
   <a href="productdynamic.php?type=smartphone"><h3 >SmartPhones</h3></a>

     <a href="productdynamic.php?type=monitor">  <img src="image/monitor1.jpg" alt="Monitor" width="400" height="260"  class="rounded">
    </a>
   <a href="productdynamic.php?type=monitor"><h3 >Monitor</h3></a>
 
    <a href="productdynamic.php?type=graphics">  <img src="image/gtx.jpg" alt="graphics Card" width="400" height="300"  class="rounded">
    </a>
   <a href="productdynamic.php?type=graphics"><h3 >Graphics Card</h3></a>
</center>

</form>

</body>
<?php include "footer.php"?>
</html>
