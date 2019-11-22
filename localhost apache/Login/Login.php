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
	<link href="style.css" rel="stylesheet">
    <style>

    .change{
      color: #FF6700;
    }

    .change:hover{
      color: red;
    }

  </style>
</head>

<body>
    
    <nav class= "navbar navbar-expand-md navbar-expand-sm" >
    <div class="container-fluid" align="center">
        <a class = "navbar-brand text" href = "#"  style="color:#FF6700; ">
            <img src="img/logo.png" width="120px" height="60px"><br>BEATFINDER
        </a>
        <button class="navbar-toggler navbar-light" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id = "navbarResponsive">
            <ul class = "navbar-nav ml-auto" >
                <li class = "nav-item">
                    <a class = "nav-link change" href = "../Home/home.html">HOME</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link change" href = "../premium/premium.html" >PREMIUM</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link change" href = "../preference/about.html"  >ABOUT US</a>
                </li>
            </ul>
            <P></P><P></P>
        </div>
    </div>
  </nav>   
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-12 col-lg-6">
                <div class="login-wrap">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                        <div class="login-form">
                            <div class="sign-in-htm">
                            <form action="validation.php" method="POST">
                                <div class="group">
                                    <label for="user" class="label">Username</label>
                                    <input id="user" type="text" class="input" name="username_1">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password_1">
                                </div>
                                <div class="group">
                                    <input id="check" type="checkbox" class="check" checked>
                                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign In">
                                </div>
                            </form>
                            </div>
                            <div class="sign-up-htm">
                            <form action="registration.php" method="POST">
                                <div class="group">
                                    <label for="user" class="label">Username</label>
                                    <input id="user" type="text" class="input" name="username_2">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password_2" onkeyup='passwordcheck();'>
                                    <label class="label" id="password_strength"></label>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Repeat Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password_3" onkeyup='check();'>
                                    <label class="label" id="message"></label>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Email Address</label>
                                    <input id="pass" type="email" class="input" name="email" onkeyup='emailvalidate();'>
                                    <label class="label" id="message1"></label>
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign Up">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<script>
var check = function() {
  if (document.getElementsByName('password_2')[0].value ==
    document.getElementsByName('password_3')[0].value) {
    document.getElementById('message').style.color = 'darkgreen';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'yellow';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

var emailvalidate =  function()
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(document.getElementsByName('email')[0].value.match(mailformat))
{
    document.getElementById('message1').style.color = 'darkgreen';
    document.getElementById('message1').innerHTML = 'valid';
  } else {
    document.getElementById('message1').style.color = 'yellow';
    document.getElementById('message1').innerHTML = 'invalid email-id';
  }
}

var passwordcheck = function()
{
var password = document.getElementsByName('password_2')[0].value
var password_strength = document.getElementById("password_strength");
 var regex = new Array();
 regex.push("[A-Z]"); 
 regex.push("[a-z]"); 
 regex.push("[0-9]"); 
 regex.push("[$@$!%*#?&]"); 

 var passed = 0;

 for (var i = 0; i < regex.length; i++) {
     if (new RegExp(regex[i]).test(password)) {
         passed++;
     }
 }


 if (passed > 2 && password.length > 8) {
     passed++;
 }


 var color = "";
 var strength = "";
 switch (passed) {
     case 0:
     case 1:
         strength = "Weak";
         color = "red";
         break;
     case 2:
         strength = "Good";
         color = "darkorange";
         break;
     case 3:
     case 4:
         strength = "Strong";
         color = "green";
         break;
     case 5:
         strength = "Very Strong";
         color = "darkgreen";
         break;
 }
 password_strength.innerHTML = strength;
 password_strength.style.color = color;
 check();
}

</script>