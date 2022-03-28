<html>
<?php
session_start();
include("../login/connect.php");
if(isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $img = $_POST['logimg'];
    $id = $_SESSION['id'];
    $strSQL = "UPDATE login SET username = '$username', email = '$email', phone = '$phone',
     image = '$img' WHERE id = '$id'";
	$objQuery = mysqli_query($con,$strSQL);
        
    $str="SELECT * FROM login WHERE id='$id'";
    $ret=mysqli_query($con,$str);
    $num=mysqli_fetch_array($ret);
    $_SESSION['user'] = $num['username'];
    $_SESSION['email'] = $num['email'];
    $_SESSION['phone'] = $num['phone'];
    $_SESSION['uimg'] = $num['image'];

	echo "<script type='text/javascript'>alert('Update Completed!');</script>";
    echo "<script> location.href='user.php'; </script>";
    echo "<script> location.reload(); </script>";
    
    exit();
	

}

?>

<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-------------- css for font itim -------------->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Itim">
    <!-------------- css for log in form  -------------->
    <link href="../css/register.css" type="text/css" rel="stylesheet" />
    <!-------------- css for default --------------->
    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <!-------------- img picker --------------->
    <link href="../image-picker/image-picker.css" type="text/css" rel="stylesheet" />
    <script src="../image-picker/image-picker.js"></script>
    <script src="../image-picker/image-picker.min.js"></script>
    <style>
    <?php include("../image-picker/image-picker.css");?>
    <?php include("../image-picker/image-picker.js");?>
    <?php include("../image-picker/image-picker.min.js");?>
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
        
        #form input[type=text],
        #form input[type=password],
        #form input[type=tel] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        
        #form input[type=text]:focus,
        #form input[type=password]:focus,
        #form input[type=tel]:focus {
            background-color: #ddd;
            outline: none;
        }
        
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
        /* Set a style for all buttons */
        
        #form button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        
        button:hover {
            opacity: 1;
        }
        /* Extra styles for the cancel button */
        /* Float cancel and signup buttons and add an equal width */
        
        #form .signupbtn {
            float: left;
            width: 50%;
        }
        /* Add padding to container elements */
        
        .container {
            padding: 16px;
        }
        /* Clear floats */
        
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        /* Change styles for cancel button and signup button on extra small screens */
        
        @media screen and (max-width: 300px) {
            .signupbtn {
                width: 100%;
            }
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
                            <a class="dropdown-item" href="../action.php">Action</a>
                            <a class="dropdown-item" href="../adventure.php">Adventure</a>
                            <a class="dropdown-item" href="../fantasy.php">Fantasy</a>
                            <a class="dropdown-item" href="../horror.php">Horror</a>
                            <a class="dropdown-item" href="../survival.php">Survival</a>
                            <a class="dropdown-item" href="../fps.php">Fps</a>
                            <a class="dropdown-item" href="../br.php">Battle royale</a>
                            <a class="dropdown-item" href="../fight.php">Fighting</a>
                            <a class="dropdown-item" href="../rhythm.php">Rhythm</a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../webboard.php">เว็บบอร์ด</a>
                </li>
            </ul>
            <?php  
                if(isset($_SESSION['user']))  
                {  
                ?>  
                <a onclick="href='user.php'">
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
<br><br><br><br>
                <!-------------- form log-in -------------->
                <div id="id01" class="modal">

                <form class="modal-content animate" action="../login/checklogin.php" method="post">
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
                <a href="../signin.php"><button  class="signinbtn">Register</button></a>
                </div>
                </div>


    <form method="POST" action="" style="border:1px solid #ccc">
        <div class="container" id="form">
            <h1>Update your info</h1>
            <hr>
            <label for="username"><b>Username</b></label>
            <input type="text" value="<?php echo $_SESSION['user'] ?>" id="username"name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="text" value="<?php echo $_SESSION['email'] ?>" id="email" name="email" required>

            <label for="phone"><b>Phone Number</b></label>
            <input type="tel" value="0<?php echo $_SESSION['phone'] ?>" id="phone" name="phone" required>

            <label for="imgicon"><b>Select icon</b></label>
            <select class="image-picker show-html" id="logimg" name="logimg">
                <option value=""></option>
                <option data-img-src="../icon/profile/usagyu.jpg" value="usagyu.jpg">usagyu</option>
                <option data-img-src="../icon/profile/jerryic.jpg" value="jerryic.jpg">jerry</option>
                <option data-img-src="../icon/profile/tomic.png" value="tomic.png">tomic</option>
                <option data-img-src="../icon/profile/blossom.jpg" value="blossom.jpg">blossom</option>
                <option data-img-src="../icon/profile/bubble.jpg" value="bubble.jpg">bubble</option>
                <option data-img-src="../icon/profile/kurumi.jpg" value="kurumi.jpg">kurumi</option>
                <option data-img-src="../icon/profile/pikachu.jpg" value="pikachu.jpg">pikachu</option>
            </select>

            <div class="clearfix">
                <!-- <button type="button" class="cancelbtn">Cancel</button> -->
                <button type="submit" name="update" class="updatebtn">Update</button>
            </div>
        </div>
        </div>
    </form>


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
$("select").imagepicker()
</script>
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