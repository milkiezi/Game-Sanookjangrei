<?php
    include('login/connect.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Webboard </title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
    <?php include("css/bootstrap.min.css");?>
    <?php include("css/style");?>
    </style>
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

        <h1 class="text-center"><b>Webboard </b></h1>
        <hr class="w3-border-grey " style="margin:auto;width:95% ">

    <div class="container w3-large"> <br>
    <?php 
    if(isset($_SESSION['user']))  
                {  
                ?>  
                <a href="newtopic.php" class="btn btn-info w3-xlarge"> Make New Topic </a> 
                <br><br>
                <?php 
                }
                else{
                ?>
                <h2 class="text-center"> กรุณาล็อกอินเพื่อพูดคุย </h2>

                <?php
                }
                ?>
                 
    
    <?php
        $query = "SELECT * FROM webboard ";
        $result = mysqli_query($con, $query) or die (mysqli_error());
        $Num_Rows = mysqli_num_rows($result);


        $Per_Page = 10;
        $Page = 1;
        if(isset($_GET["Page"])) {
            $Page = $_GET["Page"];
        } 
        $Prev_Page = $Page-1;
        $Next_Page = $Page+1;
        $Page_Start = (($Per_Page*$Page)-$Per_Page);
        if($Num_Rows<=$Per_Page) {
            $Num_Pages =1;
        } else if(($Num_Rows % $Per_Page)==0){
            $Num_Pages =($Num_Rows/$Per_Page) ;
        } else {
            $Num_Pages =($Num_Rows/$Per_Page)+1;
            $Num_Pages = (int)$Num_Pages;
        }
        $strSQL = " order  by questionID DESC LIMIT $Page_Start , $Per_Page";
        $objQuery  = mysqli_query($con, $strSQL);
    ?>

    <table width="100%" border="1">
        <tr>
            <th width="99"> <div align="center"> TopicID </div></th>
            <th width="458"> <div align="center"> Topic </div></th>
            <th width="90"> <div align="center"> Name </div></th>
            <th width="130"> <div align="center"> CreateDate </div></th>
            <th width="47"> <div align="center"> Reply </div></th>
        </tr>
        <?php while($objResult = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><div align="center"><?php echo $objResult["questionID"];?></div></td>
            <td><a href="viewwebboard.php?questionID=<?php echo $objResult["questionID"];?>"><?php echo $objResult["question"];?></a></td>
            <td align="center"><?php echo $objResult["name"];?></td>
            <td><div align="center"><?php echo $objResult["createDate"];?></div></td>
            <td align="center"><?php echo $objResult["reply"];?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
    <?php
    if($Prev_Page) {
        echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
    }
    for($i=1; $i<=$Num_Pages; $i++) {
        if($i != $Page) {
            echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
        } else {
            echo "<b> $i </b>";
        }
    }
    if($Page!=$Num_Pages) {
        echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
    } ?>
    </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
</body>
</html>