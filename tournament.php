<?php
    
    if(isset($_POST['again']))
    {
        require("config.php");
        $connect->query("delete from team_reg where 1;");
        
    }
?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="js/jquery.js"></script>

    
    <script src="js/bootstrap.min.js"></script>
    <title>My tiesheet</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
     .navbar-default .navbar-toggle {
    border-color: transparent;
}

/* Dropdown */
.open .dropdown-toggle {
    color: #fff ;
    background-color: #555;
}

/* Dropdown links */
.dropdown-menu li a {
    color: #000 !;
}

/* On hover, the dropdown links will turn red */
.dropdown-menu li a:hover {
    background-color: red ;
}
    .panel-body{
        background-color: gray;
        box-shadow: 0px 0px 20px darkgray;
         box-sizing: content-box;
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
                    
                    <li>
                        <a href="services.php">Services</a>
                    </li>
                    <li >
                        <a href="contact_us.php">Contact</a>
                    </li>
                    <li class="active">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> 
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li >
                                <a href="login.html">LOG IN</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="signup.html">REGISTER</a>
                            </li>
                        </ul>
                      </li>';
                    else
                      echo '
                       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> '.$_SESSION['user'].'<b class="caret"></b> </a>
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
        <center><img src="img/cup.png" width="100px" height=100px style="float:left;padding-top:20px; z-index:-1;position:relative;"/></center>
        <h2 style="padding-top:20px; position:relative;"><u><center>Tie Sheet Generator</center></u></h2><br><br>
<div class="panel-group">
    <div class="panel panel-default">
    
      <div class="panel-body"><form action = "tiesheet.php" name = "generate" method = "POST">
            <div class="form-group">
            <table border = "0" cellpadding="20" style="position: relative; height: 90%;" align="center" ;>
                <tr>
                    <td>Team 1 : </td>
                    <td> <input type = "text" name = "t1"  class="form-control" placeholder = "team name 1" size="50" required></td>
                </tr>
                <tr>
                    <td>Team 2 : </td>
                    <td> <input type = "text" name = "t2"   class="form-control" placeholder = "team name 2" size="50" required></td>
                </tr>
                <tr>
                    <td>Team 3 : </td>
                    <td> <input type = "text" name = "t3"  class="form-control" placeholder = "team name 3" size="50" required></td>
                </tr>
                <tr>
                    <td>Team 4 : </td>
                    <td> <input type = "text" name = "t4"  class="form-control" placeholder = "team name 4" size="50" required ></td>
                </tr>
                <tr>
                    <td>Team 5 : </td>
                    <td> <input type = "text" name = "t5" class="form-control"  placeholder = "team name 5" size="50" required ></td>
                </tr>
                <tr>
                    <td>Team 6 : </td>
                    <td> <input type = "text" name = "t6"  class="form-control" placeholder = "team name 6" size="50" required></td>
                </tr>
                <tr>
                    <td>Team 7 : </td>
                    <td> <input type = "text" name = "t7"  class="form-control" placeholder = "team name 7" size="50" required></td>
                </tr>
                <tr>
                    <td>Team 8 : </td>
                    <td> <input type = "text" name = "t8"  class="form-control"  placeholder = "team name 8" size="50" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input size="100" type="submit" name="tsubmit" class="btn btn-success" value = "Generate"></td>
                </tr>
                </table>

          </div>
        </form></div>
    </div>

    
            </div>
        </div>
    </body>
</html>
<?php
    include"footer.php";
?>
