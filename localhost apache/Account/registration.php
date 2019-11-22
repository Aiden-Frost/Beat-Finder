<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'users');

$name = $_POST['username_2'];
$pass_1 = $_POST['password_2'];
$pass_2 = $_POST['password_3'];
$email = $_POST['email'];
echo $name;
$s = "SELECT * FROM usertable WHERE name = '$name' && password = '$pass_1'";
$result = mysqli_query($con,$s);
$num =  mysqli_num_rows($result);

if($num==1){
    $reg = "UPDATE usertable SET password = '$pass_2',email = '$email' WHERE name='$name'";
    mysqli_query($con,$reg);
    $_SESSION['username_2'] = $name;
    header('location:Account.php');
}else{
    echo "<script type='text/javascript'>alert('Invalid password');</script>";
    header("refresh:1; url=Account.php");
}