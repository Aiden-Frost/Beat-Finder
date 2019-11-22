<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'users');

$name = $_POST['username_1'];
$pass = $_POST['password_1'];
$s = "SELECT * FROM usertable WHERE name = '$name' && password = '$pass'";
$result = mysqli_query($con,$s);
$num =  mysqli_num_rows($result);

if($num==1){
    $_SESSION['username'] = $name;
    header('location:../MusicPlayer/MusicPlayer.php');
}else{
    echo "<script type='text/javascript'>alert('Incorrect username or password');</script>";
    header("refresh:1; url=Login.php");
}