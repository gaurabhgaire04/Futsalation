<!DOCTYPE html>
<html>
<head>
	<title>Book</title>
	<script src="javascript/jvs.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Booking Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>
<body style=" background-image: url(img/backgr.jpg);">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#213e4a; font-family:impact; font-size:20px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href=
                " <?php
                    session_start();
                    if(isset($_SESSION['email']))
                    {  
                     if($_SESSION['email'] == 'kiran' )
                        echo 'admin.php';
                    else
                        echo 'customer.php';
                    }
                    else 
                      echo 'index.php';

                    ?>" 
                style="background: linear-gradient(yellow,orangered);
                 font-family:abril fatface; font-size: 25px; color: #213e4a">
                    &raquo; Khwopa Futsal &laquo;</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="services.php">Services</a>
                    </li>
                    <li>
                        <a href="contact_us.php">Contact</a>
                    </li>
                    <li>
                        <a href="tournament.php">MyTiesheet</a>
                    </li>
                    <li>
                        <a href="futsal_def.php">About Futsal</a>
                    </li>
                
                    <li class="active">
                        <a href="booking.php">Book Now</a>
                    </li>

                  
                   <?php
                    if(!isset($_SESSION['email']))
                      echo '
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="signup.html">Register</a>
                            </li>
                        </ul>
                      </li>';
                    else
                      echo '
                      <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">
                        '.$_SESSION['user'].'<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                      <li>
                        <a href="destroy.php"> &nbsp;Logout <span class="glyphicon glyphicon-log-out"></a>
                      </li>';

                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br><br><br>
	<div style="position: relative; color:#eee;left : 6%; font-size: 20px;">
       
		<form name="booking" action="booking.php" method="POST">
    	<p><label>Select Date:</label>
    	<input type = "date" name = "bookdate" style="color:#222;" value="<?php 
    							if(isset($_POST['dSubmit']))
    								echo $_POST['bookdate'];
    							else{
    								$today=time()+13500;
    								echo (date("Y-m-d",$today));
    							}
    								?>" required>
    	<span class="btn-group-sm">
       <!--  <script>
         var curr = new Date();
            function myFunction(a)
            {

                // document.getElementById("demo").innerHTML = a * b;
                var dateA = new Date(a);
                var dateB = new Date(curr);
                if(dateA < dateB)
                {
                    alert("Invalid Date please re-enter the date!");
                    document.getElementByName('bookdate').focus();
                }

            }
        </script> -->
        <input type="submit" class="btn btn-success " value="Check" name="dSubmit" onclick="myFunction(bookdate.value);"></input></span>
    	</p>
		</form>
	</div>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php



		$connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
		require 'config.php';
		//session_start();
		if(isset($_POST['dSubmit']))
        {
			$bookdate = $_POST['bookdate'];
            //$hr       = $_POST['hr'];
            $timestamp = strtotime($bookdate);
            $x=time();
            //echo $bookdate .' = '. $timestamp;
            //echo '<br>Today = '. time();
            //$timestamp+ = $hr;
            if(($timestamp-$x)<0){
                echo '  <script language="javascript">
                        alert("Sorry you enterd expired date value!!\nPlease select a valid date. \nDate has been reverted to current date! ");
                        window.location.replace("booking.php");
                        </script>';
                //$t=time()+13500;
                //$bookdate=date('Y-m-d',$t);

            }
        }
		else
		{
			$t=time()+13500;
			$bookdate=date('Y-m-d',$t);
		}
		
			$deadline=time()-72900;
			$today=time()+13500;
			$bktime = "delete from booking where timecheck < '$deadline' and confirm_key = 1";
			$connect->query($bktime);
			$allshifts = 
			array ('6-7', '7-8', '8-9', '10-11','12-13', '14-15', '16-17', '17-18', '18-19', '19-20');
			//$allshift= array ('A', 'B', 'C', 'D','E', 'F', 'G', 'H', 'I', 'J');

			$test = "select shift from booking where bookday='".$bookdate."'";
			$allbookings = $connect->query($test);
			$i=0;
			$testarr = array(); 
			while($test = $allbookings->fetch_assoc())
			{
				$testarr[$i]=$test['shift'];
				$i++;
			}
			$result=array_diff($allshifts, $testarr);

			echo '<div style ="position:relative; top : 20px; left : 5%; margin: 10px; height:90%; width:80%; font-size: 20px;  padding : 3px; color: #eee;">
				<form name = "shiftselect" action = "customer.php"  method = "POST"> 
					<b>Select your Shift (one at a time) and then press the proceed button. <br>
                    Selected Shifts will be booked for the date &emsp;&emsp;:<u>'.$bookdate.' </u></b><br>

                <table  border="0" cellspacing="40" cellpadding="50" height = "20%"><br><br><br>
								<tr  height= "50px"  class="btn-group-justified">';
			for($i=0;$i<10;$i++)
			{
				if(isset($result[$i])){
					echo '<td style="color: black; font-size:22px;"  align="center" class="btn btn-success">';

					echo '<strong><input  type="radio" name="shift" value='.$result[$i].' required></strong>'.$result[$i];

					echo '</td>';

				}
				else
				{
					echo '<td style="color: red; font-size:20px; align="center" class="btn btn-warning" >';

					echo '<strong><input type="radio" name="shift" disabled></strong>'.$allshifts[$i];

					echo '</td>';
				}
				
			}
			echo '</tr></table>
				  <input type = "hidden" name = "bookdate" value = "'.$bookdate.'"> <br><br>
				  <input type = "submit" style="color: black; font-size:22px;"  align="center" class="btn btn-success" class="btn btn-success" value = "Proceed " name = "proceed">
				  </form>
				  <br>
				<div style="position: relative; font-size:20px; float: right;" >
        			<b> Index: </b><br>
        			<button type="button" class="btn btn-success" style="color: black; font-size:22px;"  align="center" class="btn btn-success">Available
       				<input type="radio" id="radio1" hidden disabled></button>
       				<button type="button" class="btn btn-warning" style="color: black; font-size:22px;"  align="center" class="btn btn-success">Reserved
        			<input type="radio" id="radio2" hidden disabled> </button>               
     			</div>
				<br>
				</div>';	

		    /*if(isset($_POST['proceed']))
		    {
		    	if(!empty($_SESSION['email']))
				{
		    	$email=$_SESSION['email'];
		    	$bookday=$_POST['bookdate'];
		    	$shift=$_POST['shift'];
		    	$t=time();
		    	$details = "select contact,fname from register where email='".$email."'";
		    	$test = $connect->query($details);
		    	$details=$test->fetch_assoc();
		    	$user=$details['fname'];
		    	$contact=$details['contact'];

		    	$connect->query("INSERT INTO `booking` (`id`, `user`, `bookday`, `shift`, `contact`, `email`, `timecheck`, `confirm_key`) 
		    									VALUES (NULL, '$user', '$bookday', '$shift', '$contact', '$email', '$t','0');");	
		        $connect->close();
		        }
		     else
		     {
		     	echo '  <script>
					var key= confirm("Login First!");
					
					</script>';
					
		     }    	

		    }	*/
    
    include"footer.php";

		
?>
