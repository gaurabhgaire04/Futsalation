<!DOCTYPE html>
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
<style>
button.down {
    background-color: #87ceeb;
    color: #333;
    cursor: pointer;
    padding: 20px;
    width: 60%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.down.active, button.down:hover {
    background-color: #ddd;
}

button.down:after {
   /* content: '\002B';*/
    content: #9660;
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

/*button.down.active:after {
    content: "\2212";
}*/

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    width: 60%;
}
 .navbar-default .navbar-toggle {
    border-color: transparent;
}

/* Dropdown */
.open .dropdown-toggle {
    color: #fff ;
    background-color: #555 !important;
}

/* Dropdown links */
.dropdown-menu li a {
    color: #000 !important;
}

/* On hover, the dropdown links will turn red */
.dropdown-menu li a:hover {
    background-color: red !important;
}
    .panel{
        column-width: 60%;
    }
    img{
         height: 200px;
        width: 200px;
    }   
    p{
        font-size: 20px;
    }
</style>
</head>

<body style=" background-image: url(img/backgr.jpg);" id="myPage">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#213e4a;  font-family:impact; font-size:20px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="active">
                        <a href="services.php">Services</a>
                    </li>
                    <li >
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
<div class="container">
<span style="color:#eee">
<h2>SERVICES</h2>
<p>The Khwopa Futsal Ground is popular because of their best services provided to their members and bookers. 
    <br>Following are the major services:<br> </span>
 </p>
<button class="down">1.SWIMMING POOL</button>
    <div class="panel panel-primary"><p class="text-info">The Khwopa Swimming Pool is providing extra recreational and refreshing services where people can enjoy before/after the match.</p>
        <p class="text-info">Price<code>Rs150</code>  per person.</p><img src="img/pool.jpg">
    </div>
    
       <button class="down">2. SHOPPING</button>
<div class="panel panel-primary">
    <p class="text-info">Select the best product from our shop. Some of the products are as follows.</p><br>
    <img src="img/football/ball1.png">&nbsp;<img src="img/football/boot1.jpg">&nbsp;<img src="img/football/kits2.jpg"><br><br>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">See More..</button>
</div> 

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div style=" background-image: url(img/backgr.jpg);" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Khwopa Futsal Store</h4>
        </div>

        <div class="row" align="center" align="center">
        <b><h3><center>JERSEYS</center></b></h3>
        <hr color="black" width=90% align=center>
            <div class="col-md-6"  >
            <img src="img/football/jersey1.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/jersey2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
             <div class="col-md-6" >
            <img src="img/football/jersey3.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/jersey4.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6"  >
            <img src="img/football/jersey5.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/jersey6.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
             <div class="col-md-6" >
            <img src="img/football/jersey7.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/jersey8.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        </div>
       
        <div class="row" align="center">
        <b><h3><center>BALLS</center></b></h3>
        <hr color="black" width=90% align=center>
            <div class="col-md-6"  >
            <img src="img/football/ball1.png" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/ball2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6" >
            <img src="img/football/ball3.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/ball4.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

             <div class="col-md-6"  >
            <img src="img/football/ball5.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/ball6.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6" >
            <img src="img/football/ball7.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/ball8.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        </div>

        <div class="row" align="center">
        <b><h3><center>GLOVES</center></b></h3>
        <hr color="black" width=90% align=center>
            <div class="col-md-6"  >
            <img src="img/football/gloves1.jpg" class="image">
            <p align="center" > Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/gloves2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6" >
            <img src="img/football/gloves3.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/gloves4.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        </div>

        <div class="row" align="center">
        <b><h3><center>BOOTS & SHOCKS</center></b></h3>
        <hr color="black" width=90% align=center>
            <div class="col-md-6"  >
            <img src="img/football/boot3.jpg" class="image">
            <p align="center" > Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/boot2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6"  >
            <img src="img/football/boot1.jpg" class="image">
            <p align="center" > Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6"  >
            <img src="img/football/boot4.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/boot5.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6" >
            <img src="img/football/shocks1.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/shocks2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6" >
            <img src="img/football/shocks3.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        </div>

        <div class="row" align="center">
        <b><h3><center>OTHER SPORT MATERIALS</center></b></h3>
        <hr color="black" width=90% align=center>

            <div class="col-md-6"  >
            <img src="img/football/pads1.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6"  >
            <img src="img/football/pads2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>

            <div class="col-md-6">
            <img src="img/football/cone1.jpg"\ class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6" >
            <img src="img/football/cone2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div> 

            <div class="col-md-6">
            <img src="img/football/net1.jpg"\ class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div>
        
            <div class="col-md-6" >
            <img src="img/football/net2.jpg" class="image">
            <p align="center"> Brand - XXXX<br> Price - XXXX</p></div> 
 
        </div>

    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>

<button class="down">3.BIG PARKING</button>
<div class="panel panel-primary">
<p class="text-info">Parking system is Good in here and it is for <code>FREE</code>.</p>
    <img src="img/parking.jpg">
<br><br>
</div>

<button class="down">4.FREE WIFI</button>
<div class="panel panel-primary">
    <p class="text-info"> <code>FREE</code> WIFI for all who visit our futsal pitch.</p>
<img src="img/wifi.png">
    </div>
<button class="down">5. CAFE</button>
<div class="panel">
    <p class="text-info"> The Cafe with the best service is running since we established.</p>
    <img src="img/cafe.jpg">
    <br><br>
</div>
    </div>
<script>
var acc = document.getElementsByClassName("down");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php include"footer.php";?>