<?php   
include("login/connect.php");
 session_start(); 
 $typegame = $_GET["typegame"]; 

 $data = mysqli_query($con,"SELECT * from games_data WHERE type1 = '$typegame' or type2 = '$typegame' or type3 = '$typegame'") or die (mysqli_error());
 $num = mysqli_num_rows($data);
//  for($i=0;$i<$num;$i++){
//  $gamedata = mysqli_fetch_array($data);
 
//  }

 ?> 
<html>

<head>
    <title><?php echo $typegame; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-------------- css for font itim -------------->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Itim">
    <!-------------- css for log in form  -------------->
    <link href="css/register.css" type="text/css" rel="stylesheet" />
    <!-------------- css for default --------------->
    <link href="css/style.css" type="text/css" rel="stylesheet" />



    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            background-color: #dcc4f3;
        }
        /* Full-width input fields */
        
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a,
        button,
        nav {
            font-family: 'Itim';
        }
        
        p {
            font-size: 20px;
            font-family: 'Itim';
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navtop">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar4">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsingNavbar4">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      ประเภท
                    </a>
                    <div class="dropdown-menu">
                            <a class="dropdown-item" href="typegame.php?typegame=action">Action</a>
                            <a class="dropdown-item" href="typegame.php?typegame=adventure">Adventure</a>
                            <a class="dropdown-item" href="typegame.php?typegame=fantasy">Fantasy</a>
                            <a class="dropdown-item" href="typegame.php?typegame=horror">Horror</a>
                            <a class="dropdown-item" href="typegame.php?typegame=survival">Survival</a>
                            <a class="dropdown-item" href="typegame.php?typegame=fps">Fps</a>
                            <a class="dropdown-item" href="typegame.php?typegame=battleroyale">Battle royale</a>
                            <a class="dropdown-item" href="typegame.php?typegame=fighting">Fighting</a>
                            <a class="dropdown-item" href="typegame.php?typegame=rhythm">Rhythm</a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="webboard.php">เว็บบอร์ด</a>
                </li>
            </ul>
            <?php  
                if(isset($_SESSION['user']))  
                {  
                ?>  
                <a onclick="href='user/user.php'">
                    <h3><i class="fas fa-user" style="width:50px;"></i></h3>
                </a>
                 
                 <?php  
                }  
                else  
                {  
                ?> 
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="navbar-nav" href="#">
                    <h3><i class="fas fa-user" style="width:50px;"></i></h3>
                </a>
                <?php  
                }  
                ?> 
                <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item" style="list-style: none;">
                    <form style="padding-right:18px;">
                    <input class="form-control mr-sm-2" id="search" type="text" placeholder="Search.." onkeyup="showResult(this.value)">
                    <div id="livesearch"></div>
                    </form>
                </li>
                </ul>
            </div>
        </nav><br> &nbsp;

                <!-------------- form log-in -------------->
                <div id="id01" class="modal">

                <form class="modal-content animate" action="login/checklogin.php" method="post">
                <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <h1 style="font-size:50px">Log in</h1>
                </div>

                <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" name="login">Login</button>
                <label>
                </label>
                </div>
                </form>


                <div class="animate con-content" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <a href="signin.php"><button  class="signinbtn">Register</button></a>
                </div>
                </div>


    <div class="container-fluid " style="background: lavenderblush; padding-left: 7%;">
        <h1 style="padding-top: 2%; padding-bottom: 2%; text-transform:uppercase"><?php echo $typegame; ?></h1>
    </div>
    <center>
        <div class="container " style="margin-top:30px ">
            <div class="row ">
                <div class="col-sm-12 ">
                    <div class="card-columns ">
<?php
                    for($i=0;$i<$num;$i++){
                        $gamedata = mysqli_fetch_array($data);
 ?>
                        <div class="card " style="width:250px">
                            <a href="game.php?page_id=<?php echo $gamedata["page_id"];?>"><img class="card-img-top " src="<?php echo $gamedata["icon"];?>" alt="Card image "></a>
                            <div class="card-body ">
                                <a href="game.php?page_id=<?php echo $gamedata["page_id"];?>">
                                    <h4 class="card-title "><?php echo $gamedata["names"];?></h4>
                                </a>
                            </div>
                        </div>
 <?php } ?>
                        

                    </div>
                </div>
    </center>

    <br><br><br><br><br>
    <!-- footer -->
    <div class="footer"><br>
    <a href="https://www.facebook.com/lumineux.beam"target='_blank'><span class="fa-stack fa-sm" style="color:beige">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x " style="color:#2e104c"></i>
            </span></a>&ensp;

        <a href="https://www.instagram.com/chichi.ps/" target='_blank'><span class="fa-stack fa-sm" style="color:beige">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x " style="color:#2e104c"></i>
            </span></a> &ensp;

        <a href="mailto:sakunit@g.swu.ac.th"><span class="fa-stack fa-sm" style="color:beige">
                     <i class="fas fa-circle fa-stack-2x"></i> 
                    <i class="fas fa-mail-bulk fa-stack-1x " style="color:#2e104c;"></i>
                </span></a>

        <div class="nav-footer">
            <a href="index.php" style="color:beige">Home</a>&nbsp;
        </div>

        <div class="copyright">
            <p style="font-size: 13px;color: #BEBEBE;">&copy; 2020 Game sanookjangrei</p>
        </div>
    </div>
</body>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      document.getElementById("livesearch").style.position="absolute";
      document.getElementById("livesearch").style.backgroundColor = "#333333";
    }
  }
  xmlhttp.open("GET","livesearch/livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</html>