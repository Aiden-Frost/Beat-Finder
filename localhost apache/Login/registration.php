<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'users');

$name = $_POST['username_2'];
$pass_1 = $_POST['password_2'];
$pass_2 = $_POST['password_3'];
$email = $_POST['email'];
$s = "SELECT * FROM usertable WHERE name = '$name'";
$result = mysqli_query($con,$s);
$num =  mysqli_num_rows($result);

if($num==1){
    echo "<script type='text/javascript'>alert('username already taken.');</script>";
    header("refresh:1; url=Login.php");
}
elseif($pass_1 != $pass_2){
    echo "<script type='text/javascript'>alert('password do not match');</script>";
    header("refresh:1; url=Login.php");
}
else{
    $reg = "INSERT into usertable (name,password,email) values ('$name','$pass_1','$email')";
    mysqli_query($con,$reg);
    $_SESSION['username'] = $name;
    header('location:../MusicPlayer/MusicPlayer.php');
}