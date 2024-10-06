<html>
    <head>
        <title>Forget Password</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">


    <form class="form-signin" action="#" method="POST">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">Email/Username</span>
	  <input type="text" name="email" class="form-control" placeholder="example@abc.com" required>
	</div>
	<br />
        <button class="btn btn-lg btn-primary " type="submit">Forgot Password</button>
        <a class="btn btn-lg btn-primary " href="login.html">Login</a>
    </form>
    
    <?php
          $con=mysql_connect("localhost","root","");
                    mysql_select_db("new",$con);
                 
    
   if(isset($_POST) & !empty($_POST)){
	$username = mysql_real_escape_string( $_POST['email'],$con);
	$sql = "SELECT * FROM `register` WHERE email = '$username'";
	$res = mysql_query( $sql,$con);
	$count = mysql_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}

    $emails=$_REQUEST['email'];

    $r = mysql_fetch_assoc($res);
$password = $r['password'];
$to = $r['email'];
$subject = "Your Recovered Password!";
 $message=<<<EMAIL
Please use this password to login  $password;

     
EMAIL;
$headers = "From:$emails";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "<br><br>Failed to Recover your password, try again<br>Check Your internet Connection!";
}
   }
    ?>
    </body>
    
</html>