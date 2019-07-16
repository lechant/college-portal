<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="stylesignup.css">
<body>
    <div class="loginbox">
    <img src="img/avatar.png" class="avatar">
        <h1>Sign Up</h1>
		<?php
			require('scripts/databaseConfig.php');
			require('scripts/loginCheck.php');
			require('scripts/signupSet.php');
			
			if(isset($_POST['submit'])){
				if(!empty($_POST["username"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["comfirm_password"])){
					echo "<script>console.log('check');</script>";
					if(loginCheck($_POST["email"])["email"]==404){
						echo "<script>console.log(".loginCheck($_POST["email"])['email']."+ ' available'".")</script>";
						signupSet($_POST["username"],true,$_POST["password"],$_POST["email"]);
						header("location: https://www.youtube.com/watch?v=0ZGqgtZk0Bw");
					}else if(loginCheck($_POST["email"])["email"]==1){
						echo "<script>console.log(".loginCheck($_POST["email"])['email']."+ ' taken'".")</script>";
					}
				}
			}
		?>
        <form action="signup.php" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" autocomplete="off" autofocus required pattern="[a-zA-Z0-9]{4,30}">
			<div class="input_underline"></div>
			<p>Email</p>
			<input type="email" name="email" placeholder="Enter Email" required>
			<div class="input_underline"></div>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" id="password" required pattern="[a-z0-9]{4,30}">
			<div class="input_underline"></div>
			<p>Confirm Password</p>
			<input type="password" name="comfirm_password" placeholder="Enter Confirm Password" id="comfirm_password" required pattern="[a-z0-9]{6,30}">
			<div class="input_underline"></div>
            <input type="submit" name="submit" value="Sign up now">
        </form>
        
    </div>
<script>
var inputs = document.getElementsByTagName("input");
var inputUnderlines = document.getElementsByClassName("input_underline");
for(let i=0;i<inputs.length-1;i++){
	inputs[i].addEventListener("focus",function(){
		inputUnderlines[i].style.width = "90%";
		inputUnderlines[i].style.transition = "width 1.5s";
		inputUnderlineClear(i);
	});
	/*inputs[i].addEventListener("blur",function(){
		inputUnderlines[i].style.width = "0%";
	});*/
}
function inputUnderlineClear(index){
	for(let increment=0;increment < inputs.length -1;increment++){
		if(increment != index){
			inputUnderlines[increment].style.width = "0%";
			inputUnderlines[increment].style.transition = "width 0.2s";
		}
	}
}
//comfirm password
document.getElementById("comfirm_password").addEventListener("keyup",function(e){
	if(document.getElementById("password").value != document.getElementById("comfirm_password").value){
		comfirm_password.setCustomValidity("password dont match");
	}else{
		comfirm_password.setCustomValidity("");
	}
});
</script>
</body>
</head>
</html>