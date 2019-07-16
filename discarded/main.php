<?php
	/*require_once "databaseConfig.php";
	
	$username = 'user1';
	
	$getterSql = "SELECT login FROM users WHERE username = '$username'";
	$setterSqlTrue = "UPDATE users SET login=true WHERE username = '$username'";
	$setterSqlFalse = "UPDATE users SET login=false WHERE username = '$username'";
	
	$res = $conn->query($getterSql);
	if ($res->num_rows > 0) {
		$row = $res->fetch_assoc();
		echo $row["login"];
	} else {
		echo "0 results";
	}
	
	if(!$row["login"]){
		$conn->query($setterSqlTrue);
		echo "login is false";
	}else{
		$conn->query($setterSqlFalse);
		echo "login is true";
	}*/
	require("scripts/loginCheck.php");
	
	if(isset($_POST["set"])){
		if($_POST["username"] and $_POST["password"]){
			if(loginCheck($_POST["username"]) == 1){
				header('location: home.html');
			}else if(loginCheck($_POST["username"]) == 0){
				header('location: home.html');
			}else if(loginCheck($_POST["username"]) === 404){
				require("login.html");
				echo "<script>popUp('username does not exist');</script>";
			}else{
				echo "error";
			}
		}
	}else{
		require("login.html");
		//echo "<script>alert();</script>";
	}
	//https://steamuserimages-a.akamaihd.net/ugc/30720726060880529/B90FF2DA78411563F2A784D5B67E1BE18C01B3B6/
?>