<?php
session_start();
$conn = mysqli_connect("localhost", "root", "","dbtry") or die("Error while connecting");
if(isset($_POST['login']))
{
    $email = $_POST["uname"];
    $password = $_POST["password"];

    $sql="SELECT firstname FROM user WHERE emailid='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(isset($row))
{
$_SESSION['user']=$row[fname];
header('Location: main.php');
}
else
{
header('Location: loginfailed.php');
}
}

if(isset($_POST['signup'])){header('Location: signup1.php');}
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="css/login1.css">
  </head>
  <body>
    <?php include "header.php" ?>

<form class="box"  method="post">
  <h1>Login</h1>
  <input type="text" name="uname" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="login" value="Login">
  <input type="submit" name="cancel" value="cancel">
              Don't have any account
   <input type="submit" name="signup" value="sign up">

 </form>

  </body>
</html>

