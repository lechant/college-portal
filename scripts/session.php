<?php
	function startSession(){
		session_start();
	}

	function setSession($id){
		$_SESSION["loginID"] = $id;
	}

	function getSessionId(){
		echo $_SESSION["loginID"];
	}

	startSession();
	getSessionId();
?>