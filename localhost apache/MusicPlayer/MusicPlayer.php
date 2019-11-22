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
	<title>Music Player</title>

	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="player_style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		body {
      background-image: url('images/bg.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
  }
  .padding{
    padding-left: 20px;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
  }


.bord {
  border: 2px solid #292929;  
  outline: 2px solid #505050;
}

.clickable-row :hover{
	color:green;
}

.box{
  background-color: gray;
  opacity: .85;
  }

img.zoom {
  padding: 50px;
  transition: transform .2s; /* Animation */
  width: 300px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.15); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

body{
    overflow-x: hidden;
}
.zoom1:hover {
  transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
.zoom2:hover {
  transform: scale(1.15); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

.change{
  color: #FFBB00;
}

.change:hover{
  color: #FF6700;
}
	</style>

</head>

<body>
    
	<nav class= "navbar navbar-expand-md" >
	  <div class="container-fluid" align="center">
	      <a class = "navbar-brand text" href = "#"  style="color:#FFBB00">
	          <img src="images/logo.png" width="120px" height="60px"><br>BEATFINDER
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
					<a class = "nav-link change" href = "../Sort/sort.html" >SEARCH</a>
				</li>
				<li class = "nav-item">
					<a class = "nav-link change" href = "../preference/pref.html" >PREFERENCE</a>
				</li>
	              <li class = "nav-item">
	                  <a class = "nav-link change" href = "../Account/Account.php" >PROFILE</a>
				  </li>
	              <li class = "nav-item">
	                  <a class = "nav-link change" href = "../preference/about.html"  >ABOUT US</a>
				  </li>
				  <li class = "nav-item">
	                  <a class = "nav-link change" href = "../event/event.html"  >EVENT</a>
				  </li>
				  <li class = "nav-item">
					<a class = "nav-link change" href = "logout.php"  >LOG OUT</a>
				</li>
	          </ul>
	          <P></P><P></P>
	      </div>
	  </div>
	</nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-5 col-sm-6">
						<iframe width="525" height="335" id="1"
						src="https://www.youtube.com/embed/tgbNymZ7vqY" style="border-color: black;  border-width: 2px">
						</iframe>
				<div class="ad_cover">
					<div class="advertisement">
						<img src="images/pes_pessat_logo.png" class="img">
					</div>
				</div>
			</div>
			<div class="d-none d-lg-block">
				<div class="suggestions">
					<div class="container">
						<h3 class="table1">Songs</h3>
						<div id="Suggested">
						</div>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-block">
				<div class="recently_played">
					<div class="container">
						<h3 class="table1">Suggested Songs</h3><br/>
						<p class="table1">Based on your likes</p>
						<div id="sugg">
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    
</body>
</html>
<script>


  $.ajax({
    type:"GET",
    url:"../dataset/music_data.csv",
   dataType:"text",
   success:function(data)
   {
    var music_data = data.split(/\r?\n|\r/);
    var table_data = '<table class="table table1 table-hover"><tbody class="table1 tbody">';
    var count=0;
    for(var count = 0; count<music_data.length; count++)
    {
     var cell_data = music_data[count].split(",");
     table_data += '<tr class="clickable-row" data-href='+cell_data[3]+'>';
     for(var cell_count=0; cell_count<3; cell_count++)
     {
      if(count === 0)
      {
       table_data += '<th>'+cell_data[cell_count]+'</th>';
      }
      else
      {
       table_data += '<td>'+cell_data[cell_count]+'</td>';
      }
     }
     table_data += '</tr>';
    }
    table_data += '</tbody></table>';
    $('#Suggested').html(table_data);
	activate_fn();
   }
  });

</script>
<script>

function activate_fn()
{

		$(".clickable-row").click(function() {
			var a = $(this).data("href");
			//alert($(this).data("href"));
			next($(this).find("td").eq(1).html(),$(this).find("td").eq(2).html());
			$("iframe").attr("src","https://www.youtube.com/embed/"+a);
		})

}

</script>
<script>

function next(artist,genre){
	$.ajax({
	  type:"GET",
	  url:"../dataset/music_data.csv",
	 dataType:"text",
	 success:function(data)
	 {
	  var music_data = data.split(/\r?\n|\r/);
	  var table_data = '<table class="table table1 table-hover"><tbody class="table1 tbody"style="width:100%">';
	  var count=0;
	  for(var count = 0; count<music_data.length; count++)
	  {
	   var cell_data = music_data[count].split(",");
	   table_data += '<tr class="clickable-row-1" data-href='+cell_data[3]+'>';
	   if(cell_data[1]==artist || cell_data[2]==genre){
	   for(var cell_count=0; cell_count<1; cell_count++)
	   {
		 table_data += '<td>'+cell_data[cell_count].substring(0,20)+'</td>';
	   }
	   table_data += '</tr>';
	  }
	  }
	  table_data += '</tbody></table>';
	  $('#sugg').html(table_data);
	  activate();
	 }
	});
}
  </script>
<script>

function activate()
{
		$(".clickable-row-1").click(function() {
			var a = $(this).data("href");
			//alert($(this).data("href"));
			$("iframe").attr("src","https://www.youtube.com/embed/"+a);
		})

}

</script>