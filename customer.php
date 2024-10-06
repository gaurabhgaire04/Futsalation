<?php
session_start();
 $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
require 'config.php';

if(isset($_POST['vsubmit']))
{
  $vno= $_POST['vno'];
  $id=$_POST['bookingid'];
  $check = "select vno from booking";
  $run = $connect->query($check);
  $flag=0;
  while($test =$run->fetch_assoc())
  {
    if($vno == $test['vno'])
    {
      echo '<script language="javascript">
          alert("Voucher not valid/already used!");
          window.location.replace("customer.php");
          </script>';
      $flag=1;
    }  
  }
  //$name = $_FILES['vimg']['name'];
  $size = $_FILES['vimg']['size'];
  $tmp_name = $_FILES['vimg']['tmp_name'];
  $name= 'vouch'.$id.'.jpg';
  
  if(isset($tmp_name)&&$flag==0)
  {
    
    $location = 'uploads/';
    if(move_uploaded_file($tmp_name, $location.$name))
    {
      $name= 'vouch'.$id.'.jpg';
      $confirm = "update booking set confirm_key = 10, vno = '$vno', vimgloc = '$location$name' where id = '$id' ";
      $connect->query($confirm);
      echo '<script language="javascript">
          alert("Voucher Submitted Successfully!\n Waiting For Admin Approval");
          window.location.replace("customer.php");
          </script>';
    }
  }


}

if(isset($_POST['login']))
{
  if($_POST['email'] == 'kiran' && $_POST['pwd'] == 'admin')
  {
    $_SESSION['admin'] = 1;
    header("location:admin.php");
  }
}


if(isset($_POST['btnSubmit']))
  {
  //$connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
  //require 'config.php';

    $fname=$_POST['fname'];
    $user=$fname;
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $address=$_POST['address']; 
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword']; 
    $test = "select email from register";
    $allUsers = $connect->query($test);
    $flag = 0;
    while($test = $allUsers->fetch_assoc())
    {
      if($test['email'] == $_POST['email']) $flag = 1;
    }
    if ($flag)
    {
      echo '<script language="javascript">';
          echo 'alert("Email Already exists!!")';
          echo '</script>';
    } 
      else{  
      $connect->query("INSERT INTO `register`(`id`, `fname`, `lname`, `gender`, `address`, `email`, `contact`, `password`)
                VALUES (NULL,'$fname','$lname','$gender','$address','$email','$contact','$password')");
      $id = "select id from register where email = '".$_POST['email']."' and password = '".$_POST['password']."' ;";
      //session_start();
      $_SESSION['email'] = $email;
      $_SESSION['pwd']   = $password;
      $_SESSION['user']  = $fname;
      echo '<script language="javascript">';
          echo 'alert("User Registered Successfully!")';
          echo '</script>';      
      }
    $connect->close();  // close Connection
  
  }

  if(isset($_POST['login']))
  {

    
   // $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
    //require 'config.php';

    
    $email = $_POST['email'];
    $pwd   = $_POST['pwd'];

    $test = "select email,password,fname from register";
    $allUsers = $connect->query($test);
    $flag = 0;
    while($test = $allUsers->fetch_assoc())
    {
      if($test['email'] == $email && $test['password'] == $pwd) 
      {
        $flag = 1;
        $user = $test['fname'];
      }
    }
    if($flag == 1)
      {
        
        $_SESSION['email']  = $email;
        $_SESSION['pwd']    = $pwd;
        $_SESSION['user']   = $user;
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password!!!")';
            echo '</script>';
            header("location: index.php");      
        }
  }

   if(isset($_POST['proceed']))
        {

          $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
          require 'config.php';
          if(isset($_SESSION['email']))
          {
            $email=$_SESSION['email'];
            $bookday=$_POST['bookdate'];
            $shift=$_POST['shift'];
            
            $t=time()+13500;
            $details = "select contact,fname from register where email='".$email."'";
            $test = $connect->query($details);
            $details=$test->fetch_assoc();
            $user=$details['fname'];
            $contact=$details['contact'];

            if($shift == "6-7")
              $hr = 6 * 3600;
            else if($shift == "7-8")
              $hr = 7 * 3600;
            else if($shift == "8-9")
              $hr = 8 * 3600;
            else if($shift == "10-11")
              $hr = 10 * 3600;
            else if($shift == "12-13")
              $hr = 12 * 3600;
            else if($shift == "14-15")
              $hr = 14 * 3600;
            else if($shift == "16-17")
              $hr = 16 * 3600;
            else if($shift == "17-18")
              $hr = 17 * 3600;
            else if($shift == "18-19")
              $hr = 18 * 3600;
            else
              $hr = 19* 3600;
            $timestamp = strtotime($bookday);
            $timestamp += $hr;

           
            if($timestamp < $t)
            {
              $msg ='Expired Time value selected!!\n\n Boooked Time : '.date("H:i:s",$timestamp).'\n Current Time : '.date("Y/m/d @ H:i:s",$t);
              echo '<SCRIPT language = "javascript">
                    alert(" Booking Failed !!!\n '.$msg.'");
                    window.location.replace("booking.php");
                    </SCRIPT>';
            }
            else
            {
              
              $msg ='Booked Successfully!!\n Boooked Date & Time : '.date("Y/m/d @ H:i:s",$timestamp);
              echo '<SCRIPT language = "javascript">
                    alert("'.$msg.'");
                    window.location.replace("booking.php");
                    </SCRIPT>';
            $connect->query(
                "INSERT INTO `booking` (`id`, `user`, `bookday`, `shift`, `contact`, `email`, `timecheck`, `confirm_key`) 
                 VALUES                (NULL,'$user','$bookday', '$shift','$contact', '$email', '$t','1');");

          
            $connect->close();
           }
          }
          else
          {
            header("location:login.html");
          }    
        }
      
  

 ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/CSS">
    th,td{
      padding:5px; 
    }
  </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                
                    <li>
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
  
      <br>
      <div class = "container" style = "background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey; 
                                        margin: 20px; 
                                        box-shadow: 10px 10px 5px #DCDCDC;
                                        width:95%;>

        <div class="row">
          
          <div class = "col-md-6">
          <h3><u>Your Bookings List</u></h3>
    
            <div class="container">
            <?php
          	   $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
    		       require 'config.php';
          	   $test = "select * from booking where email ='".$_SESSION['email']."' and confirm_key =1";
			     $allbookings = $connect->query($test);
			     $i=0;
			     $testarr = array(); 


			     while($test = $allbookings->fetch_assoc())
			     {  
				      $testarr[$i]=$test['id'];
				
			
          	  echo '  <div  class="row" style="color:cyan;">
                      <form method = "post" action = "payment.php">
         	            <table border = "0" >
          	             <tr><td> Booking ID       </td><td>   : '.$test['id'].'</td></tr>
          	             <tr><td> Booked Date      </td><td>   : '.$test['bookday'].'</td></tr>
                         <tr><td> Shift            </td><td>   : '.$test['shift'].'</td></tr>
          	             <tr><td> Payment Deadline </td><td>   : '.date("Y/M/d (H:i:s)",$test['timecheck']+86400).'</td></tr>
          	          </table>
          	          <input type = "hidden" name = "bookingid" value = '.$testarr[$i].'>
          	          <input type = "submit" name = "pay" class="btn btn-success" value = "Payment">
                      </form>
                      </div>';
              $i++;
      		}
          if($i==0)
          {
            echo '<h5 style="color:#777;">No record!</h5>';
          } 
          echo '</div>  <!-- 1st container-->
                </div>  <!-- 1st col-->


     <div class="col-md-6">

     <div class="container" style="width:100%; position:relative; left:-10%;">
      <h3> <u>Pending Approvals</u>&emsp;  &emsp; &emsp;   
            <u>Voucher images</u></h3>
        <div class="row">';
          $test = "select * from booking where email ='".$_SESSION['email']."' and confirm_key =10";
          $allbookings = $connect->query($test);
          $i=0;
          $testarr = array(); 
          while($test = $allbookings->fetch_assoc())
          {
            $testarr[$i]=$test['id'];
            echo '
            <div class ="col-md-6">
            <table border = "0">
            <tr><td> Booking ID   </td><td> : '.$test['id'].'</td></tr>
            <tr><td> Booked Date  </td><td> : '.$test['bookday'].'</td></tr>
            <tr><td> Shift        </td><td> : '.$test['shift'].'</td></tr>
            <tr><td> Payment      </td><td> : Paid</td></tr>
            <tr><td> Voucher no.  </td><td> : '.$test['vno'].'</td></tr>
            </table>
            </div>
            <div class ="col-md-6">
            <img src = '.$test['vimgloc'].' width="225" height="150">
            <br><br><br>
            </div>';
            $i++;
        }
        if($i==0)
        {
          echo '<h5 style="color:#777;">No record!</h5>';
        }  
        echo '<br></div> <!-- row --><br><br>';
        

    echo '</div>  <!-- 2nd container--> 
          </div>  <!-- 2nd col -->
          </div>  <!-- row--><br><br>
          </div>  <!-- main container-->

      <div class = "container" style = "background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey; 
                                        width:95%;
                                        margin: 20px;
                                        box-shadow: 10px 10px 5px #DCDCDC;">
        <h3> <u>Approved Bookings</u>&emsp; &emsp; &emsp;  &emsp;  &emsp;  &emsp; &emsp;  &emsp;  &emsp;  &emsp; &emsp;  &emsp;  &emsp;  &emsp;  
            <u>Voucher images:</u></h3>
        <div class="row">';
          $test = "select * from booking where email ='".$_SESSION['email']."' and confirm_key =11";
          $allbookings = $connect->query($test);
          $i=0;
          $testarr = array(); 
          while($test = $allbookings->fetch_assoc())
          {
            $testarr[$i]=$test['id'];
            echo '
            <div class ="col-md-6">
            <table border = "0">
            <tr><td> Booking ID   </td><td> : '.$test['id'].'</td></tr>
            <tr><td> Booked Date  </td><td> : '.$test['bookday'].'</td></tr>
            <tr><td> Shift        </td><td> : '.$test['shift'].'</td></tr>
            <tr><td> Payment      </td><td> : Paid</td></tr>
            <tr><td> Voucher no.  </td><td> : '.$test['vno'].'</td></tr>
            </table>
            </div>
            <div class ="col-md-6">
            <img src = '.$test['vimgloc'].' width="225" height="150">
            <br><br><br>
            </div>';
            $i++;
        }
        if($i==0)
        {
          echo '<h5 style="color:#777;">No record!</h5>';
        } 
        echo '<br></div> <!-- row --><br><br>
              </div> <!-- container -->
             

              <br><br>
              <div class = "container" style = "background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey;  
                                        box-shadow: 10px 10px 5px #DCDCDC;
                                        width:95%;
                                        margin: 20px;">

                  <h3><u>Your Bookings History</u></h3><br>';
      
                    $test = "select * from booking where email ='".$_SESSION['email']."' and confirm_key =100";
                    $allbookings = $connect->query($test);
                    $i=0;
                    $testarr = array(); 
      while($test = $allbookings->fetch_assoc())
      {
            echo '<div class ="row">
            <table border = "0">
            <tr><td> Booking ID   </td><td> : '.$test['id'].'</td></tr>
            <tr><td> Booked Date  </td><td> : '.$test['bookday'].'</td></tr>
            <tr><td> Shift        </td><td> : '.$test['shift'].'</td></tr>
            </table>
            </div>'; 
            $i++;   
      }
      if($i==0)
      {
        echo '<h5 style="color:#777;">No record!</h5>';
      } 
      echo'</div>'; 

?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>
</body>
</html>
<div style="position: relative; top: 5%;">
<?php
include"footer.php";
?>
</div>