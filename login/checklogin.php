<?php
session_start();
error_reporting(0);
include("connect.php");
if(isset($_POST['login'])) {
  $username=$_POST['username'];
  $pass=md5($_POST['psw']);
  $str="SELECT * FROM login WHERE username='$username' AND password='$pass'";
  $ret=mysqli_query($con,$str);
  $num=mysqli_fetch_array($ret);
  if($num>0) {
  $_SESSION['id'] = $num['id'];
  $_SESSION['user'] = $num['username'];
  $_SESSION['email'] = $num['email'];
  $_SESSION['phone'] = $num['phone'];
  $_SESSION['uimg'] = $num['image'];

  echo "<script type='text/javascript'>alert('login success');</script>";	
  echo "<script> window.history.go(-1); </script>";
  }
else {
  echo "<script type='text/javascript'>alert('Wrong username or password');</script>";	
  echo "<script> window.history.go(-1); </script>";
  exit();
  }
}

?>