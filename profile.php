<html>
<head>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<style>
		body{
			margin:0;
			padding:0;
			font-size:1.2vw;
		}
		nav{
			width: 100%;
			height:4vw;
			background:black;
			display: grid;
			grid-template:100%/70% repeat(3,1fr);
		}
		nav a{
			color:white;
			display: block;
			align-self: center;
			justfy-self:center;
		}
		nav a:hover{
			color:dodgerblue;
			font-weight:bold;
			font-size: 1.3vw;
			text-decoration: none;
		}
		#header-section{
			display: grid;
			grid-template:repeat(7,1fr)/30% 20% auto;
			grid-template-areas: "img name ."
								 "img location map"
								 "img rating ."
								 "img . . "
								 "img . . "
								 "img . . "
								 "img . . ";
			width:100%;
			height:20vw;
		}
		p,h3{
			margin:0;
			padding:0;
		}
		#header-section img{
			width:60%;
			max-height:95%;
			justify-self:center;
			align-self: center;
		}
		#header-section a{
			color:#333;
		}
		#header-section a:hover{
			color:#bbb;
		}
		.divider-line{
			width:100%;
			height:0.2vw;
			background:black;
		}
		#img-section{
			width:100%;
			height:20vw;
			background:rgb(230,230,230);
			display: grid;
			grid-template:100%/repeat(3,1fr);
			overflow-y: scroll;
		}
		.title{
			width:8%;
			height:2vw;
			background:black;
			color:white;
			margin-top:5vw;
		}
		#img-section img{
			float:left;	
			display:block;
			width:90%;
		}
		#img-section::-webkit-scrollbar { 
    		display: none; 
		}
		#display-section p{
			width:80%;
			margin: 1vw auto;
			background:rgb(230,230,230);
		}
		#contact-section{
			width:100%;
			height:15vw;
			background:black;
			display:grid;
			color:white;
			grid-template:repeat(5,1fr)/repeat(3,1fr);
			grid-template-areas: "telT mailT ."
								 "tel mail ."
								 ". . ."
								 ". . ."
								 ". . .";
		}
		#contact-section a{
			color:white;
		}
		.subtitle1{
			color:orange;
			font-weight:bold;
			grid-area:telT;
		}
		.subtitle2{
			color:dodgerblue;
			font-weight:bold;
			grid-area:mailT;
		}
		#comment-section{
			width:100%
		}
		#comment-input{
			width:100%;
			height:4vw;
			display: grid;
			grid-template:100%/30% 10% auto;
			grid-column-gap: 4%;
			background:#ccc;
			align-items: center;
		}
		.comment{
			width:70%;
			min-height:6vw;
			margin:1.2vw 0.5vw;
			background:#ddd;
			box-shadow:0.1vw 0.1vw 0.3vw black;
			display: grid;
			grid-template:20% auto/10% 90% auto;
			grid-template-areas: "username date rating"
								 "content content content";
		}
		.checked{
			color:yellow;
		}
		.doot{
			display: inline;
		}
	</style>
</head>
<body>
	<?php
		require 'scripts/databaseConfig.php';
		require 'scripts/loginCheck.php';
		require 'scripts/profilePageModule.php';
		require 'scripts/profileRebound.php';
		session_start();
	?>
	<nav>
		<div></div>
		<a href="index.php">home </a>
		<?php
		    //login
		    if($_SESSION['loginID']){
		    //check user login status
		        if(getLoginById($_SESSION['loginID']) == 1){
		            echo "<li><a href='#'><i class='fa fa-fw fa-user'></i>" . getUsernameById($_SESSION['loginID']) . "</a></li>";
		        }else{
		            echo "<li><a href='login.php'><i class='fa fa-fw fa-user'></i>Login</a></li>";
		        }
		    }
		?>
		<?php
		    //signup
		    if($_SESSION['loginID']){
		    //check user login status
		        if(getLoginById($_SESSION['loginID']) == 1){
		            echo "<li><a href= './scripts/loginSet.php?id=" . $_SESSION['loginID'] ."'><i class='fa fa-fw fa-user'></i>logout</a></li>";
		        }else{
		            echo "<li><a href='signUp.php'><i class='fa fa-fw fa-user'></i>Sign up</a></li>";
		        }
		    }
  		?> 
<!-- 		<a href="index.php">sign in</a>
		<a href="index.php">sign up</a> -->
	</nav>
	<div id="header-section">
		<?php
			echo "
				<img style=\"grid-area: img\" src=\"".splitIntoArray(getCollegeDataById($_GET['id'])['images'])[0]."\">
				<h3 style=\"grid-area: name\">".getCollegeDataById($_GET['id'])['name']."</h3>
				<p style=\"grid-area: location\">".getCollegeDataById($_GET['id'])['location']."</p>
				<div style=\"grid-area: rating\">
			";
			for($i=0;$i<getRatingAverage($_GET['id'])["rounded"];$i++){
			    echo "<span class=\"fa fa-star checked\"></span>";
			}
			echo "</div>
				<a style=\"grid-area: map\" href=\"".getCollegeDataById($_GET['id'])['map']."\">View map</a>
			";
		?>
	</div>
	<div class="title">Gallery</div>
	<div class="divider-line"></div>
	<div id="img-section">
	<?php
		if(sizeof(splitIntoArray(splitIntoArray(getCollegeDataById($_GET['id'])['images'])[0]))>1){
			for($i=0;$i<sizeof(splitIntoArray(getCollegeDataById($_GET['id'])['images'])[0]);$i++){
				echo "<img src=\"".splitIntoArray(getCollegeDataById($_GET['id'])['images'])[i]."\">";
			}
		}
	?>
	</div>
	<div class="title">About</div>
	<div class="divider-line"></div>
	<div id="display-section">
		<p>
			<?php
				echo getCollegeDataById($_GET['id'])['description'];
			?>
		</p>
	</div>
	<div class="title">Contact</div>
	<div class="divider-line"></div>
	<div id="Contact-section">
		<div class="subtitle1">Telephone</div>
		<?php
			echo "<a style=\"grid-area: tel\" href=\"tel:". getCollegeDataById($_GET['id'])['phone'] ."\">".getCollegeDataById($_GET['id'])['phone']."</a>";
		?>
		<div class="subtitle2">Email</div>
		<?php
			echo "<a style=\"grid-area: mail\" href=\"mailTo:". getCollegeDataById($_GET['id'])['email'] ."\">".getCollegeDataById($_GET['id'])['email']."</a>";
		?>
	</div>
	<div class="title">Comments</div>
	<div class="divider-line"></div>
	<div id="comment-section">
		<?php
			if(isset($_POST['submit'])){
				if(!empty($_POST['content'])){
					setComment($_SESSION['loginID'],$_GET['id'],$_POST['content']);
					createRating($_SESSION['loginID'],$_GET['id'],$_POST['rating']);
					setRatingAverage($_GET['id']);
					echo "<script>
						window.location.assign('./profile.php?id=". $_GET['id']."');
					</script>";
				}
			}
		?>
		<form id="comment-input" method="post" action="#">
			<textarea row="8" cols="50" name="content"></textarea>
			<input id="ratings_input_field"  type="hidden" name="rating">
			<input value="submit" type="submit" name="submit">
			<div id="rating">
				<div class="doot"><span class="fa fa-star"></span></div>
				<div class="doot"><span class="fa fa-star"></span></div>
				<div class="doot"><span class="fa fa-star"></span></div>
				<div class="doot"><span class="fa fa-star"></span></div>
				<div class="doot"><span class="fa fa-star"></span></div>
			</div>
		</form>
		<?php
			loadComments($_GET['id']);
		?>
	</div>
<script>
	document.getElementsByClassName("doot")[0].addEventListener("click",function(){
		for(let i=0;i<1;i++){
			document.getElementsByClassName("doot")[i].style.color = "yellow";
		}
		for(let i=1;i<5;i++){
			document.getElementsByClassName("doot")[i].style.color = "black";
		}
		setRatingValue(1);
	});
	document.getElementsByClassName("doot")[1].addEventListener("click",function(){
		for(let i=0;i<2;i++){
			document.getElementsByClassName("doot")[i].style.color = "yellow";
		}
		for(let i=2;i<5;i++){
			document.getElementsByClassName("doot")[i].style.color = "black";
		}
		setRatingValue(2);
	});
	document.getElementsByClassName("doot")[2].addEventListener("click",function(){
		for(let i=0;i<3;i++){
			document.getElementsByClassName("doot")[i].style.color = "yellow";
		}
		for(let i=3;i<5;i++){
			document.getElementsByClassName("doot")[i].style.color = "black";
		}
		setRatingValue(3);
	});
	document.getElementsByClassName("doot")[3].addEventListener("click",function(){
		for(let i=0;i<4;i++){
			document.getElementsByClassName("doot")[i].style.color = "yellow";
		}
		for(let i=4;i<5;i++){
			document.getElementsByClassName("doot")[i].style.color = "black";
		}
		setRatingValue(4);
	});
	document.getElementsByClassName("doot")[4].addEventListener("click",function(){
		for(let i=0;i<5;i++){
			document.getElementsByClassName("doot")[i].style.color = "yellow";
		}
		for(let i=5;i<5;i++){
			document.getElementsByClassName("doot")[i].style.color = "black";
		}
		setRatingValue(5);
	});
	function setRatingValue(val){
		document.getElementById("ratings_input_field").value=val;
	}
</script>
</body>
</html>