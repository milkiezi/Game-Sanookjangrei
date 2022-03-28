<?php
error_reporting(0);
session_start();
include("login/connect.php");
	$rate=$_REQUEST['rate'];
	$username=$_REQUEST['username'];
	$page_id=$_REQUEST['page_id'];
	$status=1;
	//Check email id already exists or not
	$query = mysqli_query($con,"SELECT count(*) AS TOTAL FROM rating_data WHERE username='$username' and page_id='$page_id'");
	$row = mysqli_fetch_array($query);
	$TOTAL_COUNT=$row['TOTAL'];
	if($TOTAL_COUNT==0){
		$sql="INSERT INTO `rating_data`( `page_id`,`rating`,`username`,`status`) VALUES ('$page_id',$rate,'$username',$status)";
		mysqli_query($con,$sql);
		echo "Rating Added Successfully !";
	}
	else{
		$sql="UPDATE rating_data SET rating  = $rate WHERE username = '$username' and page_id ='$page_id'";
		mysqli_query($con,$sql);
		echo "Rating Added Successfully !";
	}
	?>

