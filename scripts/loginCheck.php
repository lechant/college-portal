<?php
	//require('databaseConfig.php');
	function loginCheck($email,$password = ""){
		$getSql = "SELECT login,admin,password FROM users WHERE email = '".trim($email) ."'";
		$statusArr = array();
		
		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			//return $row["login"];
			$statusArr["email"] = 1;
			$statusArr["login"] = $row["login"];
			$statusArr["admin"] = $row["admin"];
			if($row['password'] === $password){
				$statusArr["password"] = 1;
			}else{
				$statusArr["password"] = 0;
			}
		}else{
			//return 404;
			$statusArr["email"] = 404;
		}
		
		return $statusArr;
		//echo implode("",$statusArr);
	}
	//loginCheck("admin" , "admin");

	function getUserID($email){
		$getSql = "SELECT id,login FROM users WHERE email = '".trim($email) ."'";

		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			//return $row["login"];
			return $row['id'];
		}
	}

	function getLoginById($id){
		$getSql = "SELECT login FROM users WHERE id = $id";

		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			//return $row["login"];
			return $row['login'];
		}
	}

	function getUsernameById($id){
		$getSql = "SELECT username FROM users WHERE id = $id";

		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			//return $row["login"];
			return $row['username'];
		}
	}

	function getAdminById($id){
		$getSql = "SELECT admin FROM users WHERE id = $id";

		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			//return $row["login"];
			return $row['admin'];
		}
	}
?>