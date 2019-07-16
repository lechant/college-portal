<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>	
<body>
    <div class="loginbox">
    <img src="img/avatar.png" class="avatar">
        <h1>Log In</h1>
		<?php
			require("scripts/databaseConfig.php");
			require("scripts/loginCheck.php");
			require("scripts/loginSet.php");
			
			if(isset($_POST["set"])){
				if($_POST["email"] and $_POST["password"]){
					if(loginCheck($_POST["email"],$_POST["password"])['email'] == 1 and loginCheck($_POST["email"],$_POST["password"])['password']==1){
						echo "<script>console.log('correct')</script>";
						loginSet($_POST["email"],true);

						session_start();
						$_SESSION['loginID'] = getUserID($_POST["email"]);
						//redirect to index
						header("location: index.php");
					}else if(loginCheck($_POST["email"],$_POST["password"])['email'] == 1 and loginCheck($_POST["email"],$_POST["password"])['password']==0){
						echo "<script>console.log('wrong password')</script>";
					}else if(loginCheck($_POST["email"],$_POST["password"])['email'] == 404){
						echo "<script>console.log('account doesnt exist')</script>";
					}
					if(loginCheck($_POST["email"],$_POST["password"])['email'] == 1){
						echo "<script>console.log('". loginCheck($_POST["email"],$_POST["password"])['email'] . loginCheck($_POST["email"],$_POST["password"])['password'] ."')</script>";
					}
					
					//$stat = loginCheck($_POST["email"]);
					//echo "<script>console.log($stat)</script>";
					//loginSet($_POST["email"],false);
				}
			}
		?>
        <form method="post" action="login.php">
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter email" autocomplete="off" autofocus required>
			<div class="input_underline"></div>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required pattern="[a-z0-9]{4,30}">
			<div class="input_underline"></div>
			<input type="hidden" name="set" value="set">
            <input type="submit" name="submit" value="Log In">
        </form>
    </div>
	<div class="pop_up_box">
		<div class="message">
			<p>nope</p>
		</div>
		<div class="pop_up_close">Got It</div>
	</div>
<script>
var inputs = document.getElementsByTagName("input");
var inputUnderlines = document.getElementsByClassName("input_underline");
for(let i=0;i<inputUnderlines.length;i++){
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
	for(let increment=0;increment<inputUnderlines.length;increment++){
		if(increment != index){
			inputUnderlines[increment].style.width = "0%";
			inputUnderlines[increment].style.transition = "width 0.2s";
		}
	}
}
function popUp(msg){
	document.getElementsByClassName("pop_up_box")[0].style.opacity = "1";
	document.getElementsByClassName("message")[0].innerHTML = '<p>'+ msg +'<p>';
	document.getElementsByClassName("pop_up_close")[0].addEventListener("click",function(){
		document.getElementsByClassName("pop_up_box")[0].style.opacity = "0";
	});
}
</script>
</body>
</html>