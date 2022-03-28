</html>
<?php   
include("login/connect.php");
 session_start(); 
 $id = $_GET["page_id"];
//  $id = 1;
 $query = mysqli_query($con,"SELECT AVG(rating) as AVGRATE from rating_data WHERE page_id = $id");
 $row = mysqli_fetch_array($query);
 $AVGRATE=$row['AVGRATE'];
 $query = mysqli_query($con,"SELECT count(rating) as Total from rating_data WHERE page_id = $id");
 $row = mysqli_fetch_array($query);
 $Total=$row['Total'];
 $review = mysqli_query($con,"SELECT rating,username from rating_data WHERE page_id= $id");
 $rating = mysqli_query($con,"SELECT count(*) as Total,rating from rating_data group by rating order by rating desc");
 
 $data = mysqli_query($con,"SELECT * from games_data WHERE page_id = $id") or die (mysqli_error());
 $gamedata = mysqli_fetch_array($data);

 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $gamedata["names"]; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css for default -->
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Itim">
    <!-- icon facebook ig -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- css for login -->
    <link href="css/register.css" type="text/css" rel="stylesheet" />

    <link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include("css/style.css");?>
    </style>

    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            background-color: #dcc4f3;
        }
        /* Style the top navigation bar */
        
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a,
        button {
            font-family: 'Itim';
        }
        
        p {
            font-size: 20px;
            font-family: 'Itim';
        }
        
        .footer {
            background-color: blueviolet;
            padding: 5px;
            text-align: center;
        }


        /*************** login form css **************************/
        /* Full-width input fields */
    </style>
</head>

<body>
    <!-- nav -->
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


    <!-- body -->

    <div class="container">
        <div class="row">
            <!-- body left -->
            <div class="col-sm-4">
                <img src=<?php echo($gamedata["icon"]);?> style="width:100%;height:100%px;"><br><br>
                <h3>ประเภท:
                <a type="button" class="badge badge-pill badge-dark" href="typegame.php?typegame=<?php echo $gamedata["type1"];?>"><?php echo $gamedata["type1"];?></a>
                <a type="button" class="badge badge-pill badge-dark" href="typegame.php?typegame=<?php echo $gamedata["type2"];?>"><?php echo $gamedata["type2"];?></a>
                <a type="button" class="badge badge-pill badge-dark" href="typegame.php?typegame=<?php echo $gamedata["type3"];?>"><?php echo $gamedata["type3"];?></a>
                </h3>  <br><br>
                <h3>เล่นใน:
                    <span class="badge badge-pill badge-dark"><?php if($gamedata["playin1"] != null){echo($gamedata["playin1"]);}?> </span>
					<?php if($gamedata["playin2"] != null){ ?>
						<span class="badge badge-pill badge-dark"><?php echo($gamedata["playin2"]);?> </span>
						<?php }?>
                    <?php if($gamedata["playin3"] != null){ ?>
						<span class="badge badge-pill badge-dark"><?php echo($gamedata["playin3"]);?> </span>
						<?php }?>
						</h3><br><br>

                <?php
                    if(isset($_SESSION['user']))  
                {  
                ?>  
                <div id="rating_div">
				<div class="star-rating">
                <h2> ให้คะแนนเกมนี้ </h2>
                <span class="fa divya fa-star-o" data-rating="1" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>
					<input type="hidden" name="whatever3" class="rating-value" value="0">
				</div>
			    </div>
                <br>
                    <input type="hidden" name="page_id" id="page_id" value="<?php echo $id ?>">
                    <p><button  class="btn btn-default btn-sm btn-info" id="srr_rating">Submit</button></p>
                 
                 <?php  
                }  
                else  
                {  
                ?> 
                <div id="rating_div">
				<div class="star-rating">
                <h2> กรุณาล็อกอินเพื่อให้คะแนน </h2>
                <span class="fa divya fa-star-o" data-rating="1" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>
					<input type="hidden" name="whatever4" class="rating-value" value="1">
				</div>
			    </div>

                <?php  
                }  
                ?> 
                    

                    

            </div>
            <!-- body right -->
            <div class="col-sm-8">
                <h1><?php echo($gamedata["names"]);?></h1>
                <h1>คะแนน : <b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;">(<?=$Total;?> reviews)</i> 
                </h1>
                <hr style="color: blueviolet;">

                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'ประวัติเกม')">ประวัติเกม</button>
                    <?php if ($gamedata["story"] != null){ ?>
                    <button class="tablinks" onclick="openCity(event, 'เรื่องย่อ')">เรื่องย่อ</button>
                    <?php } ?>
                    <button class="tablinks" onclick="openCity(event, 'gameplay')">รูปแบบการเล่น</button>
                    <button class="tablinks" onclick="openCity(event, 'รีวิว')">รีวิว</button>

                </div>

                <div id="ประวัติเกม" class="tabcontent">
                    <h1>ประวัติเกม</h1>
                    <p><?php echo($gamedata["history"]);?></p>
                </div>

                <div id="เรื่องย่อ" class="tabcontent">
                    <h1>เรื่องย่อ</h1>
                    <p><?php if($gamedata["story"] != null){echo($gamedata["story"]);}?></p>
                </div>
                <div id="gameplay" class="tabcontent">
                    <h1>รูปแบบการเล่น</h1>
                    <p><?php echo($gamedata["gameplay"]);?>
                    </p>
                </div>

                <div id="รีวิว" class="tabcontent">
                    <h1>รีวิว</h1>
                    <p><?php echo($gamedata["review"]);?>
                    </p>
                </div>
                <br>

                <!-- Container for the image gallery -->
                <div class="container">
                    <!-- Full-width images with number text -->

                    <div class="mySlides">
                        <img src="<?php echo($gamedata["img1"]);?>" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="<?php echo($gamedata["img2"]);?>" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="<?php echo($gamedata["img3"]);?>" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="<?php echo($gamedata["img4"]);?>" style="width:100%">
                    </div>
                    <?php if ($gamedata["img5"] != null){ ?>
                       <div class="mySlides">
                           <img src="<?php echo($gamedata["img5"]);?>" style="width:100%">
                      </div>
                    <?php } ?>
                    <?php if ($gamedata["img6"] != null){ ?>
                        <div class="mySlides">
                            <img src="<?php echo($gamedata["img6"]);?>" style="width:100%">
                        </div>
                    <?php } ?>
                    <!-- Next and previous buttons -->
                    <a style="color: #ddd;" class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a style="color: #ddd;" class="next" onclick="plusSlides(1)">&#10095;</a>
                    <br>
                </div>
                
                    
                    
            </div>
        </div>
    </div>
    <div class="footer"><br>
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
            <a href="#" style="color:white">Home</a>&nbsp;
        </div>

        <div class="copyright">
            <p style="font-size: 13px;color: #BEBEBE;">&copy; 2020 Game sanookjangrei</p>
        </div>
    </div>


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

$("#srr_rating").click(function() {
	var $star_rating = $('.star-rating .fa');
	var rating = parseInt($star_rating.siblings('input.rating-value').val());
	var username= "<?php echo $_SESSION['user'] ?>";
	var page_id= $('#page_id').val();
	console.log(username);
	console.log(rating);
	console.log(page_id);
	if(rating>0){
		
            $.ajax({
			url: "save_rating.php",
			type: "GET",

			data: {
			    rate: rating,
				username: username,
				page_id:page_id
				
			},
			success : function(data){
				location.reload();
			}
			});
	}
            
});

$(".selected").click(function() {
	    var selected = $(this).hasClass("highlight");
		$(".selected").removeClass("highlight");
		if(!selected){
		   $(this).addClass("highlight");
		}
	
});

</script>

</html>