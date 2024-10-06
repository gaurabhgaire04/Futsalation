
<html>
    
        
    <head><title>About Futsal</title>
      <script src="javascript/jvs.js"></script>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


   <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
 
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">


    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
        <style>
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
    background-color: red ;
}
             
        .box{
            border-style:solid;
            border-color:navajowhite;
            border-width:2px;
            height:70px;
            width: 120px;
           
                 background-color: tan;
            color:white;
               box-shadow: 0px 0px 20px black;
                text-align: left;
                font-family: cursive;
            text-transform: uppercase;
            }
          .table1{
                
                background-image: transparent;
                 margin-top: 90px;
                 padding-bottom: 50px;
                padding-top: 50px
                     
                   
            }
            .tablehead{
                background-color: blue;
            }
            .blueColor{
                //background-color: blue;
                color:aqua;
                font-size: 16px;text-transform: uppercase; 
            }
            .redColor{
                color:orange;
                font-size: 16px;
                text-transform: uppercase; 
            }
            .vs{
                color: wheat;
                font-size: 20px;
            }
            </style>
        <script>
        function printContent(a){
            var restorepage=document.body.innerHTML;
            var printcontent=document.getElementById(a).innerHTML;
            document.body.innerHTML=printcontent;
            window.print();
            document.cody.innerHTML=restorepage;
            
        }
        </script>
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
                <a class="navbar-brand" href="index.php" style="background: linear-gradient(yellow,orangered);
                 font-family:abril fatface; font-size: 25px; color: #213e4a">
                &raquo; Khwopa Futsal &laquo;</a>
            </div>
      
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="services.php">Services</a>
                    </li>
                    <li>
                        <a href="contact_us.php">Contact</a>
                    </li>
                    <li class="active">
                        <a href="#">MyTiesheet</a>
                    </li>
                    <li >
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
        <?php
          $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
         require 'config.php';

         if(isset($_POST['tsubmit']))
         {
            $team = array($_POST['t1'],$_POST['t2'],$_POST['t3'],$_POST['t4'],$_POST['t5'],$_POST['t6'],$_POST['t7'],$_POST['t8']);
            for($i=0;  $i<8;  $i++) 
            {

                
                $connect->query ("INSERT INTO team_reg (`sn`,`team_name`) VALUES ('$i','$team[$i]')");
            }
         }
         $retval=$connect->query("SELECT * FROM team_reg ORDER BY RAND(10) LIMIT 8");
         $team=array();
         $i=0;

    while($que = $retval->fetch_assoc())
    {
        $team[$i]=$que['team_name'];
        $i++;  
    }
     
        ?>
    <div class="container-fluid">
        <div id="div1"> 
        <table style="background-color:white;" class="container">
             <tr ><td><a valign=top><img src="img/final_cup.png" width="200px" height=230px/></a></td><td><i><h1 style="font-family:fantasy ; font-size:43px; position:relaive float:right;"><center><u><p>FUTSAL TOURNAMENT</p></u> <br><u><p>TIE SHEET</p> </center></u></h1></i></td>
        </table><br><br>
             <table style="background-color: #333;" border=2 cellspacing=0 width=30% align="center" class="container" color="white">
                 <tr align='center'><th colspan=4 style=" color:cyan; font-size:30px;  "><center>Match Fixtures</center></th></tr>
                 <tr align='center'style=" color:white;"><td width=20%>Game No.</td><td width=60%>Matches</td></tr>
                 <tr align='center' ><td style=" color:white;">1</td><td >
                     <div><span class="redColor"><?php echo $team[0];?></span><span class=vs>- vs -</span>
                     <span class="blueColor"><?php echo $team[1];?></div></td></tr>
                 <tr align='center'><td style=" color:white;">2</td><td width=40%>
                     <div><span class="redColor"><?php echo $team[2];?></span><span class=vs>- vs -</span>
                     <span class="blueColor"><?php echo $team[3];?></span></div></td></tr>
                 <tr align='center'><td style=" color:white;">3</td><td width=40%>
                     <div ><span class="redColor"><?php echo $team[4];?></span><span class=vs>- vs -</span>
                     <span class="blueColor"><?php echo $team[5];?></span></div></td></tr>
                 <tr align='center'><td style=" color:white;">4</td><td width=40%>
                     <div ><span class="redColor"><?php echo $team[6];?></span><span class=vs>- vs -</span>
                     <span class="blueColor"><?php echo $team[7];?></span></div></td></tr>
            </table>
        </div>
         <button onClick="printContent('div1')"  style="float:right;margin:10px 20px ;" class="btn btn-info">print</button>
        <div id="div2">
         
        <table border="0" width=100% align="center" class="table1">>
            
        <!--  <tr><th colspan="8" style="font-size:20px;">
            </th></tr>-->

            <tr>
                <td valign="top"><div class=box><span class="redColor"><?php echo $team[0];?></span><br><br></div>    
                    <br><br><br><br><br><br><br>
                    <div class=box ><span class="blueColor"><?php echo $team[1];?></span><br><br></div></td>
                <td><img src="img/right.png"  height="200px" width="150px"></td>
                <td><br><div class=box><span class="redColor">Winner of game 1</span><br><br></div></td>
              
                <td rowspan="2"width=50%>
                    <img src="img/right.png" width="90" height="270"style="float:left; padding-top:20px;">
                    <div class=box style="float:left;padding:10px 10px;margin-top:110px;">
                        <span class="redColor">finalist 1</span><br><br></div>
                    <img src="img/cup.png" width="100" height="120"style="float:left;margin-top:70px">
                        <div class=box style="float:left;padding:0px 1px;margin-top:110px;">
                            <span class="blueColor">finalist 2</span><br><br></div>
                    <img src="img/left.png" width="105" height="270"style="float:left; padding-top:20px;">
                </td>
               
                
                <td><br><div class=box><span class="redColor">Winner of game 2</span><br><br></div></td>
                 <td><img src="img/left.png" width="150" height="200"></td>
                <td valign="top" ><div class=box><span class="redColor" ><?php echo $team[2];?></span><br><br></div><br><br><br><br><br><br><br>
                    <div class=box ><span class="blueColor"><?php echo $team[3];?></span><br><br></div></td>
               <br> 
            </tr>
           
            <tr><br><br><td valign="top" colpan="2"><br><div class=box><span class="redColor"><?php echo $team[4];?></span><br><br></div><br><br><br><br><br><br><br>
                <div class=box ><span class="blueColor"><?php echo $team[5];?></span><br><br></div></td>
                <td><img src="img/right.png" width="150" height="200"></td>
                <td><div class=box><span class="blueColor">Winner of game 3</span><br><br></div></td>
            
                <td><div class=box><span class="blueColor">Winner of game 4</span><br><br></div></td>
                <td><img src="img/left.png" width="150" height="200"></td>
                <td valign="top"><br><div class=box><span class="redColor"><?php echo $team[6];?></span><br><br></div><br><br><br><br><br><br><br>
                    <div class=box ><span class="blueColor"><?php echo $team[7];?></span><br><br></div></td>
       </tr>    
        
        </table>
            
            
        </div>
        <div class=container-fluid>
            <br>
        <form name="again" method = "POST" action="tournament.php">
            <input type="submit" class="btn btn-success"value="Generate again" name="again" style="float:right;margin:10px 20px ;">
        </form>
        </div>
        </div> 
    </body>
</html>
<?php
include"footer.php";
?>