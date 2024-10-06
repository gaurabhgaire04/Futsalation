<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
   <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">

 
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
          .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {

        width: 1400px;
          height: 400px;
       margin: 1;
          border: 20px
      /*margin: 1;*/
         }
        .carousel-indicators{
         position: relative;
           
            padding-left: 500px;
        }
        .carousel-caption a{
            background-color: aqua;
        
            text-decoration: none;
        }
        #Carouselbody{
            margin:-27px 25px 10px;
            width: 1100px
        }
        @media (max-width: 600px) {
    .carousel-caption {
        display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
}
        /* Remove border color from the collapsible button */
.navbar-default .navbar-toggle {
    border-color: transparent;
}

/* Dropdown */
.open .dropdown-toggle {
    color: #fff ;
    background-color: transparent!;
}

/* Dropdown links */
.dropdown-menu li a {
    color: #000;
}

/* On hover, the dropdown links will turn red */
.dropdown-menu li a:hover {
    background-color: red ;
}
     
        </style>


</head>

<body style=" background-image: url(img/backgr.jpg);">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#213e4a; font-family:impact; font-size:20px; ">
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
     <!-- Header Carousel -->
    <div class=row>
        <div id="Carouselbody">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <!--<div class="fill" style="background-image:url('img/car3.jpg');"></div>-->
                <img src="img\car3.jpg"  class="img-responsive"  >
                <div class="carousel-caption">
                    <h2>Skill</h2>
                </div>
            </div>
            <div class="item">
                <!--<div class="fill" style="background-image:url('img/car1.jpg');"></div>-->
                <img src="img\car1.jpg"  class="img-responsive" >
                <div class="carousel-caption">
                    <h2>Victory</h2>
                </div>
            </div>
            <div class="item">
              <!--  <div class="fill" style="background-image:url('img/car2.jpg');"></div>-->
                <img src="img\car2.jpg"  class="img-responsive">
                <div class="carousel-caption">
                    <h2>Team Spirit</h2>
                </div>
            </div>    
        </div>

        <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
          </a>
        
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" >
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
        </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header" align="center" style="background-color:#213e4a; color: #d9d9d9; position: relative;top: 2px; border-radius: 12px; border-color: #444; box-shadow: 2px 4px 5px #888;">
                    Welcome to Khwopa Futsal</h3>
            </div>
            <div class="col-md-4" >
                <div class="panel panel-default" style="background-color:#ffc0cb; color: #333; height: 250px;">
                    <div class="panel-body" style="">
                        <p align="justify">Khwopa Futsal is one of the fastest-growing futsal co. in Nepal and has been selected as the number one futsal for training and development by many players.This futsal recognizes that futsal is a stand-alone sport and an exciting game for players at all levels, but futsal is also an essential component of soccer development.</p>
                        <a href="booking.php" class="btn btn-info" style="background: green;">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" >
                <div class="panel panel-default" style="background-color:#87ceeb; color: #333; height: 250px;">
                    <div class="panel-body" style="">
                        <p align="justify">Futsal is an exciting, fast-paced small sided football game that originates from South America in the 1930s. It is widely played across the world, and is the small sided football format that is officially recognized by both UEFA and FIFA.</p>
                       <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" style="background: green;">Learn More</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Wel- Come to Khwopa Futsal</h4>
        </div>
        <div class="modal-body">
          <p align="justify">Futsal is an exciting, fast-paced small sided football game that originates from South America in the 1930s. It is widely played across the world, and is the small sided football format that is officially recognized by both UEFA and FIFA.
              <center> <img src="img/parking.jpg" height=240px weight=240px></center></p><p>In the context of Nepal, it is the one of fastest growing sports ,played by any levels.So , the development of this sports is important. "Futsal is an extremely important way for kids to develop their skills and understanding of the game. </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
     </div>
    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style=" background-color:#90ee90; color: #333;height: 250px;">
                    <div class="panel-body" style="">
                        <p align="justify">In the context of Nepal, it is the one of fastest growing sports ,played by any levels.So , the development of this sports is important. "Futsal is an extremely important way for kids to develop their skills and understanding of the game. <br>
                        "My touch and my dribbling have come from playing Futsal." -Neymar Jr.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        
        <hr>
        <!-- Footer -->
       
        <div class="container">
 <div class="col-lg-12">
                <h3 class="page-header" align="center" style="background-color:#213e4a; color: #d9d9d9; position: relative;top: 2px; border-radius: 12px; border-color: #444;padding:10px; box-shadow: 2px 4px 5px #888;">
                    Some of the World-class athletes says about the futsal</h3>
            </div>
      
       <br><br>
       <div class=row>
            <div class="col-md-4" >
                <div class="panel" style="  background-color:#87ceeb; height: 440px;">
                    <div class="panel-body" style="">
                        <div class="relative">
                        <img src="img/pele.png" class="img-circle"alt="" width="300" height="300"/>
              <p><img alt="" src="img/left_quote.png" height=20px>Futsal requires you to think and play fast. It makes everything easier when you later switch to football.<img alt="" src="img/right_quote.png"></p><h4>PELÉ</h4>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" >
                <div class="panel panel-default" style="  background-color:white; height: 440px;">
                    <div class="panel-body" style="">
                       <div class="relative">
                        <img src="img/messi.png" class="img-circle"alt="" width="300" height="300"/></div>
              <p><img alt="" src="img/left_quote.png"  height=20px>As a little boy in Argentina, I played futsal on the streets and for my club. It was tremendous fun, and it really helped me become who I am today.<img alt="" src="img/right_quote.png"></p><h4>MESSI</h4>
                    </div>
                    </div>
                </div>
            
            <div class="col-md-4">
                <div class="panel panel-default" style=" background-color:yellow;height: 450px;  ">
                    <div class="panel-body" style="">
                        
                        <img src="img/ronaldo.png" class="img-circle"alt="" width="300" height="300"/>
                       <p><img alt="" src="img/left_quote.png"  height=20px>During my childhood in Portugal, all we played was futsal. The small playing area helped me improve my close control, and whenever I played futsal I felt free. If it wasn't for futsal, I wouldn't be the player I am today. <img alt="" src="img/right_quote.png"></p><h4>RONALDO</h4>
                   
                        </div>
                </div>
            </div>
        </div>
    </div>
  
    </div>
     </div>
</body>
</html>

 <?php
include"footer.php";
?> 