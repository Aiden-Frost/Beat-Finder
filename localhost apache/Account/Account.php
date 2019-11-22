<?php
session_start();
if(!(isset($_SESSION['username']))){
    header('location:../Login/Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Join Beat-Finder</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style1.css" rel="stylesheet">
</head>
<body>
    <nav class= "navbar navbar-expand-md navbar-light  sticky-top">
        <div class="container-fluid">
        <a class = "navbar-brand text" href = "#"  style="color:#FFBB00">
	          <img src="img/logo.png" width="120px" height="60px"><br>BEAT-FINDER
	      </a>
            <button class="navbar-toggler" type = "button" data-toggle = "collapse" data-target	= "#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id = "navbarResponsive">
                <ul class = "navbar-nav ml-auto">
                    <li class = "nav-item active">
                        <a class = "nav-link" href = "../Home/home.html">Home</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "../preference/pref.html">Preference</a>
					</li>
					<li class = "nav-item">
                        <a class = "nav-link" href = "../Sort/sort.html">Search</a>
					</li>
					<li class = "nav-item">
                        <a class = "nav-link" href = "../premium/premium.html">Premium</a>
					</li>
					<li class = "nav-item">
                        <a class = "nav-link" href = "../MusicPlayer/MusicPlayer.php">Find-Beat</a>
					</li>
                </ul>
            </div>
        </div>
    </nav>
<br><br><br>
</body>
</html>
<?php

$con = mysqli_connect('localhost','root','');
$name =$_SESSION['username'];
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'users');

$s = "SELECT * FROM usertable WHERE name = '$name'";
$result = mysqli_query($con,$s);

while($row = mysqli_fetch_assoc($result)) {
    $email = $row["email"];
    $pass = $row["password"];
}
echo ' <div class="container-fluid padding">
<div class="row padding">
    <div class="col-md-12 col-lg-6">
        
            <div class="account">
                <input id="tab-1" type="radio" name="tab" class="ac-ov" checked><label for="tab-1" class="tab">Account Overview</label>
                <input id="tab-2" type="radio" name="tab" class="ed-pr"><label for="tab-2" class="tab">Edit Profile</label>
                <div class="account-form">
                    <div class="ac-ov-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input" value='.$name.' readonly id="name">
                        </div>
                        <div class = "group">
                            <label for="pass" class="label">Email ID</label>
                            <input id="pass" type="text" class="input" value='.$email.' readonly>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">DOB</label>
                            <input id="pass" type="date" class="input" readonly>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Gender</label>
                            <input id="pass" type="text" class="input" value="M" readonly>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Country</label>
                            <input id="pass" type="text" class="input" value="India" readonly>
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-2" id="edit" style="color:white;">Edit Profile</a>
                        </div>
                    </div>
                    <form action="registration.php" method="POST">
                    <div class="ed-pr-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input" value='.$name.' readonly name="username_2">
                        </div>
                        <div class="group">
                            <label for="user" class="label">Email-ID</label>
                            <input id="user" type="text" class="input" value='.$email.' name ="email">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Old-Password</label>
                            <input id="pass" type="password" class="input" data-type="password" name="password_2">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">New-Password</label>
                            <input id="pass" type="password" class="input" data-type="password" name="password_3">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>

                        <div class="group">
                            <label for="pass" class="label">DOB</label>
                            <input id="pass" type="date" class="input"  >
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Gender</label>
                            <select class="input">

                                <option Value="Under 16">Male</option>
                                <option Value="16 to 25">Female</option>
                                <option Value="26 to 40">Non Binary</option>
                                
                                </select>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Country</label>
                            <input id="pass" type="text" class="input" value="India">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Make Changes" >
                        </div>
                    </div>
                </div>
                </form>
            
        
    </div>
</div>
</div>
';

?>
