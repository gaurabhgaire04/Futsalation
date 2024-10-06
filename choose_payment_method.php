<?php
session_start();

//print_r($_POST);
$_SESSION['room_id'] =  $_POST['room_id'];
//$_SESSION['avai_room'] =  $_POST['avai_room'];
$room_type=@$_SESSION['room_id'];
$_SESSION['no_room'] = $_POST['no_room'];
$person=$_SESSION['person'];
$_SESSION['totalamt']=$_POST['totalamt'];
//print_r($_SESSION);
$no_room=$_SESSION['no_room'];
if(!isset($_SESSION['no_room'])){
    header('location: booking.php');
}

?>
<html>
<head>
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/style2.css">

<title>Payment Method</title>
</head>
<body background="images/back.jpg">
<table width="872" border="0" cellspacing="0" cellpadding="0" class="main" height="80px">
  <tr>
<!-- Header -->
    <td align="left" valign="top" class="header" >
	<table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td align="left" valign="top">
			<img src="images/slogo.gif" alt="City Hotel"  title="City Hotel" width="269" height="50" class="logo" />
			<br class="spacer" />
			<ul>
				<li>HOME</li>
				<li>ABOUT US</li>
				<li>PHOTO GALLERY</li>
				<li>ACCOMODATION</li>
				<li><a href="booking.php" title="Booking" class="active">BOOKINGS</a></li>
			<li>CONTACT US</li>
			</ul>
			</td>
      </tr>

    </table>
<center>
<?php
if(isset($_POST['add']))
{
require_once('conn.php');
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
    // $country =$_POST['country'];
	   $email =$_POST['email'];
	    $contact=$_POST['contact'];
      // $arrival =$_POST['arrival'];
	// $departure =$_POST['departure'];
	// $person =$_POST['person'];
	// $no_room=$_POST['no_room'];

	
}

	?>
	
	<br>
<h1><font color=#33b5e5>Choose your payment method</font></h1>
<br>
<?php 

$a=array_sum($no_room);

?>
<a href="addnewrecord.php"><img alt="" src="images/direct.jpg" width="144" height="144"></a><br><br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="project@gmail.com">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="item_name" value="Room">
                <input type="hidden" name="item_number" value="<?php echo $a;?>">
                <input type="hidden" name="amount" value="<?php echo $_SESSION['totalamt'];?>">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="return" value="http://www.canopy.com/"><!-- return path after payment success  -->
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                <input type="image" src="images/paypal.jpg" width="144" height="144" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
              </form>
    </table>
            <div class="clear"></div>
<!-- Links Down -->
<div class="links-down"> 
  
  <!-- About us -->
  <div class="links about-us">
    <fieldset>
       <ul>
        <li><a href="about.html" >About Us</a></li>
      </ul>
    </fieldset>
  </div>
  <!-- Ends About us --> 
  
  <!-- My Account -->
  <div class="links">
    <fieldset>
      <legend>Connect With: </legend>
      <ul>
        <li><a href="https://www.facebook.com/cityhotel?ref=hl"><img src="images/facebook.png" width="30px" height="30px"></a></li>
        <li><a href="https://twitter.com/cth"><img src="images/twitter.png" width="30px" height="30px"></a></li>
      </ul>
    </fieldset>
  </div>
  <!-- Ends My Account --> 
  
  <!-- Contact Us -->
  <div class="links contact-us">
    <fieldset>
      <legend>Contact Us</legend>
      <strong>City Hotel, Thamel<br /> Kathmandu, Nepal</strong>
      <p style="padding-bottom: 0;"> <br />
        Phone:  977-01-4267912, +1 (000) 000-0000  </p>
    </fieldset>
  </div>
  <!-- Ends Contact Us --> 
  
</div>
<!-- Ends Links Down -->     </div>
  </div>
  </div>
  <!-- Ends Links --> 
  
  <!-- Footer Container -->
  <div class="footer-container">
    <div class="footer">
  <p class="copyright">&copy; 2014  City Hotel,  All rights reserved. </p>
</div>
  </div>
  <!-- Ends Footer --> 
</div>
<!-- Ends Wrapper -->
</body>
</html>