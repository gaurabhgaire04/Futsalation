
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Home</title>
<link rel="stylesheet" href="css/HOME.CSS" />
<script src="javascript/jvs.js"></script>
<style type="text/css">
.list {
	color: 	#FFF;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
</head>

<body bgcolor="">

<div>
	<div class ="div1">
		
		<h1 class="futsal_header">	Futsal Booking System		</h1>
		<form name="login" method="POST" action="customer.php">
			
			<input class="login_button1"  type="submit" value="Login" name="login">
			<br><h1>Bhaktapur</h1>

			<div class="div2">

			Username:  &emsp;&emsp;   <input type="text" name="email" > 
			<br><br>
			Password: &nbsp&emsp;&emsp;    <input type="password" name="pwd"  >
			</div>
		</form>
		

						  
	 
		<p style="color: maroon; 
				  position:absolute; 
				  left:69%; top:60%; ">Not a member yet? 
				  <a href="signup.html" target="content">Register</a></p>
		</p>
	</div>
		<div style ="color: lime; 
					 position:relative; 
					 top : -20px; 
					 left :90%; 
					 width:300px; 
					 height : 100%; 
					 overflow:auto; 
					 padding : 3px;">
		</div>
	<div class="lcolor">
		<ul class="list">
  			<li><a href="home.php" target="content">	Home 	</a></li>
  			<li><a href="login.html" onclick="disp();" target="content">	BOOKING </a></li>
  			<li>TOURNAMENT</li>
  			<li>CONTACT US</li>
		</ul>
	</div>

	<iframe src="home.php" name="content" width="100%" style="position: absolute;" scrolling="no"></iframe>
  		
 </div> 	
</body>
</html>
