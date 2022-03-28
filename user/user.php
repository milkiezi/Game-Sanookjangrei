<?php
 include("../login/connect.php");
 session_start(); 
 $username = $_SESSION['user'];
 $query = mysqli_query($con,"SELECT AVG(rating) as AVGRATE from rating_data WHERE username='$username'");
 $row = mysqli_fetch_array($query);
 $AVGRATE=$row['AVGRATE'];
 $query = mysqli_query($con,"SELECT count(rating) as Total from rating_data WHERE username='$username'");
 $row = mysqli_fetch_array($query);
 $Total=$row['Total'];
 $review = mysqli_query($con,"SELECT rating,username,page_id from rating_data WHERE username='$username'");
 $rating = mysqli_query($con,"SELECT count(*) as Total,rating from rating_data group by rating order by rating desc");
 ?> 

<html>

<head>
    <title>User</title>
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

    <link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include("../css/style.css");?>
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
        
        .container {
            border-radius: 5px;
            background-color: #b888e7;
            padding: 10px;
            padding-bottom: 20px;
            margin-bottom: 60px;
            margin-top: 30px;
            color: black;
        }
        
        .container a {
            color: black;
        }
        .btn-group .button {
  background-color: #4CAF50; /* Green */
  border: 1px solid green;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  float: left;
}


.btn-group .button:hover {
  background-color: #3e8e41;
}
.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.buttonlg {
    background-color: #f44336;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navtop">
        <a class="navbar-brand" href="../index.php">Home</a>
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
                            <a class="dropdown-item" href="../typegame.php?typegame=adventure">Adventure</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=fantasy">Fantasy</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=horror">Horror</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=survival">Survival</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=fps">Fps</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=battleroyale">Battle royale</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=fighting">Fighting</a>
                            <a class="dropdown-item" href="../typegame.php?typegame=rhythm">Rhythm</a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../webboard.php">เว็บบอร์ด</a>
                </li>
            </ul>
            <h3><i class="fas fa-user" style="width:50px;"></i></h3>
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
                <a href="../signin.php"><button  class="signinbtn">Register</button></a>
                </div>
                </div>

        </div>
    </nav><br> &nbsp;
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div>
                    <img id="mypic" src="../icon/profile/<?php echo $_SESSION['uimg'] ?>" class="rounded-circle" width="200" height="200" style="margin-left: 10%;margin-top: 6%;">
                </div>
            </div>
            <div class="col-sm-8 ">
                <h2>Username:&nbsp&nbsp&nbsp<?php echo $_SESSION['user'] ?></h2>
                <h4>Email:&nbsp&nbsp&nbsp<?php echo $_SESSION['email'] ?></h4>
                <h4>Phone Number:&nbsp&nbsp&nbsp0<?php echo $_SESSION['phone'] ?></h4>
                <ul>
                    <h4>Your rate:</h4>
                    <?php
			while($db_review= mysqli_fetch_array($review)){
		?>
				<h4><?//$db_review['rating'];?> 
				<?php
				if($db_review['rating']==5){
				?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
                <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<?php
				}
				elseif($db_review['rating']==4){
                ?>
                 <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_review['rating']==3){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_review['rating']==2){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				elseif($db_review['rating']==1){
                ?>
				<i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<i class="fa fa-star-o" data-rating="2" style="font-size:20px;"></i>
				<?php
				}
				?>

                 <?php if($db_review['page_id']==1){
                     ?>
                        Tom and Jerry : Chase
                  <?php   
                 }
                 elseif($db_review['page_id']==2){
                    ?>
                        Marvel's Spider-Man Miles Morales
                    <?php  
                 }
                 elseif($db_review['page_id']==3){
                    ?>
                        Amongus
                    <?php  
                 }
                 elseif($db_review['page_id']==4){
                    ?>
                        Final Fantasy 7 Remake
                    <?php  
                 }
                 elseif($db_review['page_id']==5){
                    ?>
                        Resident Evil 7 Remake
                    <?php  
                 }
                 elseif($db_review['page_id']==6){
                    ?>
                        Shadow of the Tomb Raider
                    <?php  
                 }
                 elseif($db_review['page_id']==7){
                    ?>
                        Apex Legend
                    <?php  
                 }
                 elseif($db_review['page_id']==0){
                    ?>
                        Tekken 7
                    <?php  
                 }
                 elseif($db_review['page_id']==9){
                    ?>
                        Osu!
                    <?php  
                 }
                 ?>


				<hr>
		<?php	
			}
				
		?>
                </ul>

                <div class="btn-group" style="margin-left:480px;">
                <button class="button"><a href="editdata.php" tite="edit">Edit</a></button>
                <button class="button" style="margin-left:20px; background-color:red;"><a href="../login/logout.php" tite="Logout">Logout</a></button>
                </div>

            </div>
        </div>
    </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- footer -->
    <div class="footer "><br>
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

        <div class="nav-footer ">
            <a href="../index.php" style="color:beige ">Home</a>&nbsp;
        </div>

        <div class="copyright ">
            <p style="font-size: 13px;color: #BEBEBE; ">&copy; 2020 Game sanookjangrei</p>
        </div>
    </div>
</body>
<script>
var $star_rating = $('.star-rating .fa');
var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});

$(".selected").click(function() {
	    var selected = $(this).hasClass("highlight");
		$(".selected").removeClass("highlight");
		if(!selected){
		   $(this).addClass("highlight");
		}
	
});

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