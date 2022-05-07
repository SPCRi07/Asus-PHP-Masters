<?php
session_start();
?>

<?php
if(isset($_POST['signup']))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $pincode = $_POST["pincode"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];

    foreach($_POST as $key=>$value)
	{
		if(empty($_POST[$key]))
		{
			$Err = "All are required field.";
		}
	}


    if (!preg_match("/^[a-z]$/", $_POST['fname']))
	{
		$fnameerror = "Invalid First Name";
	}
	else
		$fname = $_POST["fname"];


	if (!preg_match("/^[a-z]$/", $_POST['lname']))
		{
		$lnameerror = "Invalid Last Name";
		}
	else
        $lname = $_POST["lname"];


    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
         $emailerror = "Invalid Email Address";
    }
     else
        $email = $_POST["email"];


    if (!preg_match("/^[a-z0-9]$/", $_POST['password']))
    {
        $passworderror = "Invalid password";
    }
     else
         $password = $_POST["password"];


    if(!preg_match("/[0-9]{10}$/", $_POST["contact"]))
    {
        $contacterror = "Invalid Contact Number";
    }
    else
        $contact = $_POST["contact"];


    if(!preg_match("/^[a-z]$/",$_POST['address']))
    {
        $areaerror = "Invalid Address";
    }
    else
         $address = $_POST["address"];


     if(!preg_match("/[0-9]{6}$/", $_POST["pincode"]))
    {
        $pincoderror = "Invalid Pincode";
    }
    else
        $pincode = $_POST["pincode"];


    if (!preg_match("/^[a-z]$/", $_POST['city']))
    {
        $cityerror = "Invalid City";
    }
    else
        $city = $_POST["city"];


    if (!preg_match("/^[a-z]$/", $_POST['state']))
    {
         $stateerror = "Invalid State";
     }
     else
          $state = $_POST["state"];


    if (!preg_match("/^[a-z]$/", $_POST['country']))
    {
        $countryerror = "Invalid Country";
    }
    else
       $country = $_POST["Country"];


        $conn = mysqli_connect("localhost", "root", "", "dbtyr");
		$sql = "insert into user values('$fname', '$lname', '$email', '$password', $contact, '$address', $pincode, '$city', '$state', '$country')";
		$res = mysqli_query($conn, $sql);
		}
?>
<html>
<head><title>REGISTRATION PAGE</title> <link rel='stylesheet' href='blended_layout.css'></head>
<body>
<header>
    <div class='container'>
      <h1 class='logo'></h1>

      <nav>
        <ul>
          <li><a href="home.php"><font color="black">HOME</a></li>
          <li><a href="index.php"><font color="black">LOG IN</a></li>
          <li><a href="gallery.php"><font color="black">GALLERY</a></li>
          <li><a href="AboutUs.php"><font color="black">ABOUT US</a></li><div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>

  <form method = "post">
  <center>
  <div class="form2"><h1> STUDENT REGISTRARION FORM  </h1>
  <br>

        <?php if(isset($Err)) { ?>
				<div class="error-message"><?php if(isset($Err)) echo $Err; ?></div>
        <?php } ?>

            First Name :<br> <input type="text" name="fname"  placeholder="First Name" size="30" value="<?php if(isset($fname)) echo $fname; ?>">
            <span class="error">*<?php if(isset($fnameerror)) echo $fnameerror; ?> </span>
						<br>
            Last Name :<br> <input type="text" name="lname" placeholder="Last Name" size="30" value="<?php if(isset($lname)) echo $lname; ?>">
            <span class="error">*<?php if(isset($lnameerror)) echo $lnameerror; ?> </span>
						<br>
            Email :<br> <input type="text" name="email" placeholder="Email" size="30" value="<?php if(isset($email)) echo $email; ?>">
            <span class="error">*<?php if(isset($emailerror)) echo $emailerror; ?> </span>
						<br>
            Password :<br> <input type="password" name="password" placeholder="Password" size="30" value="<?php if(isset($password)) echo $password; ?>">
            <span class="error">*<?php if(isset($passworderror)) echo $passworderror; ?> </span>
						<br>
            Contact number :<br> <input type="text" name="contact" placeholder="Contact number" size="30" value="<?php if(isset($contact)) echo $contact; ?>">
            <span class="error">*<?php if(isset($contacterror)) echo $contacterror; ?> </span>
						<br>
            Address :<br> <textarea name="address"placeholder="Address (house no/name, street name, Area and Landmark Only)" cols="26" rows="4" value="<?php if(isset($address)) echo $address; ?>"></textarea>
            <span class="error">*<?php if(isset($addresserror)) echo $addresserror; ?> </span>
            <br>
            Pin code :<br> <input type="text" name="pincode" placeholder="Pincode" size="30" value="<?php if(isset($pincode)) echo $pincode; ?>">
            <span class="error">*<?php if(isset($pincodeerror)) echo $pincodeerror; ?> </span>
						<br>
            City :<br> <input type="text" name="city" placeholder="city" size="30" value="<?php if(isset($city)) echo $city; ?>">
            <span class="error">*<?php if(isset($cityerror)) echo $cityerror; ?> </span>
						<br>
            State :<br> <input type="text" name="state" placeholder="state" size="30" value="<?php if(isset($state)) echo $state; ?>">
            <span class="error">*<?php if(isset($stateerror)) echo $stateerror; ?> </span>
            <br>
            Country :<br> <input type="text" name="country" placeholder="only for india" size="30" value="<?php if(isset($country)) echo $country; ?>">
            <span class="error">*<?php if(isset($countryerror)) echo $countryerror; ?> </span>
						<br>
           <br> <div class="button"> <input type="submit" class="signup" value="register" name="register"></div>



  </center>
  </form>
  </div>
  </body>
</html>