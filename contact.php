<?php
$myfile = fopen("contact.txt", "a+") or die("Unable to open file!");
if(isset($_POST['submit']))
{
  $txt=$_POST['nametxt'];
  $info= "here is the".$txt."feedback";
  fwrite($myfile,$info.PHP_EOL);

$txt=$_POST['nametxt'];
fwrite($myfile,$txt.PHP_EOL);
fwrite($myfile,"\n");
$txt2 = $_POST['emailtxt'];
fwrite($myfile,$txt2.PHP_EOL);
fwrite($myfile,"\n");
$txt3 = $_POST['msgtxt'];
fwrite($myfile,$txt3.PHP_EOL);
fwrite($myfile,"\n");
fclose($myfile);
}

?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/contact.css">
    <style>
      .button{
          background: none;
  color: #70a1ff;
  border: 1px solid #70a1ff;
  padding: 12px 40px;
  border-radius: 8px;
  text-transform: uppercase;
  font-size: 14px;
  transition: 0.4s linear;
  cursor: pointer;
      }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <form method="post">
    <?php include "header.php" ?>
  <body style="background-color:#313840;">
    <div class="contact-section">
      <div class="inner-width">
        <h1>Get in touch with us</h1>
        <input type="text" class="name" placeholder="Your Name" name="nametxt">
        <input type="email" class="email" placeholder="Your Email" name="emailtxt">
        <textarea rows="1" placeholder="Message" class="message" name="msgtxt"></textarea></div>
      <input type="submit" class="button" name="submit" value="submit">
      
    </div>
    <?php include "footer.php" ?>
  </body>
</html>
