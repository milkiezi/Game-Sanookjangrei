<?php
    include('login/connect.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Topics </title>
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

        <hr class="w3-border-grey " style="margin:auto;width:95% ">
        <div class="container w3-large"> <br>

    <?php
        $questionID = $_GET["questionID"];
        if(isset($_REQUEST['txtdetails'])) {
            //*** Insert Reply ***//
            $queryID = "SELECT * FROM reply";
            $resultID = mysqli_query($con, $queryID);
            $rowsid = mysqli_num_rows($resultID);
            $newid = $rowsid+1;
            $date = date("Y-m-d");
            $txtdetails = $_POST["txtdetails"];
            $username = $_SESSION['user'];
            $txtname = $username;
            $strSQLI = "INSERT INTO reply (replyID, questionID, createDate, details, name) VALUES ('$newid', '$questionID', '$date', '$txtdetails', '$username')";
            $objQueryI = mysqli_query($con, $strSQLI);
            //*** Update Reply ***//
            $strSQLU = "UPDATE webboard SET reply = reply + 1 WHERE questionID = '$questionID'";
            $objQueryU = mysqli_query($con, $strSQLU);   
        }
        //*** Select Question ***//
        $strSQLS = "SELECT * FROM webboard  WHERE questionID = '$questionID' ";
        $objQueryS = mysqli_query($con, $strSQLS) or die (mysqli_error());
        $objResultS = mysqli_fetch_array($objQueryS);
        //*** Delete question ***///
        if (isset($_GET['deleteq'])) {
            $questiond = $_GET['deleteq'];
            $queryd = "DELETE FROM webboard WHERE questionID = '$questiond' ";
            $resultd = mysqli_query($con, $queryd);
            $querydr = "DELETE FROM reply WHERE questionID = '$questiond' ";
            $resultdr = mysqli_query($con, $querydr);
            header("location:webboard.php");
        }
        //*** Delete reply ***///
        if (isset($_GET['deleter'])) {
            $questionID = $_SESSION['questionID'];
            $replyd = $_GET['deleter'];
            $querydr = "DELETE FROM reply WHERE replyID = '$replyd' ";
            $resultdr = mysqli_query($con, $querydr);
            $strSQLU = "UPDATE webboard SET reply = reply - 1 WHERE questionID = '$questionID'";
            $objQueryU = mysqli_query($con, $strSQLU);
            header("location:viewwebboard.php?questionID=".$questionID);
        }
    ?>
    <!-- show question -->
    <table width="100%" border="1" cellpadding="1" cellspacing="1">
        <tr>
            <td colspan="3"><center><h2> <?php echo $objResultS["question"];?> </h2></center></td>
        </tr>
        <tr>
            <td height="53" colspan="3"><?php echo ($objResultS["details"]);?> </td>
        </tr>
        <tr>
            <td width="217"> Name : <?php echo $objResultS["name"];?> </td> 
            <td width="216"> Create Date : <?php echo $objResultS["createDate"];?> </td>
            <td width="217"> Reply : <?php echo $objResultS["reply"];?> </td>
        </tr>
    </table> <br> 
        <a href="webboard.php" class="btn btn-secondary  w3-xlarge"> Back to Webboard </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br>
    <!-- show reply -->
    <?php
        $intRows = 0;
        $strSQLS2 = "SELECT * FROM reply  WHERE questionID = '$questionID' ";
        $objQueryS2 = mysqli_query($con, $strSQLS2) or die (mysqli_error());
        while($objResultS2 = mysqli_fetch_array($objQueryS2)) {
            $intRows++;
    ?> 
        Reply No : <?php echo $intRows;?>
        <table width="100%" border="1" cellpadding="1" cellspacing="1">
        <tr>
            <td height="53" colspan="3"> <?php echo($objResultS2["details"]);?> </td>
        </tr>
        <tr>
            <td width="270"> Name : <?php echo $objResultS2["name"];?> </td>
            <td width="215"> Create Date : <?php echo $objResultS2["createDate"];?> </td>
        </tr>
        </table> <br>
    <?php } ?>
    <br>
    <form action="" method="post" name="frmMain" id="frmMain">
        <table width="100%" cellpadding="1" cellspacing="1">
        <tr>
            <th><h3> Reply </h3></th>
        </tr>
        <tr>
            <td><textarea name="txtdetails" cols="130" rows="5" id="txtdetails"></textarea></td>
        </tr>
        </table> <br>
        <div style='text-align:right;'>
            <input name="btnSave" type="submit" id="btnSave" value="Submit" class='btn btn-success w3-xlarge'>
        </div>
    </form>
    </div> </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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