<?php
	function rebound($id){
		header_remove("location"); 
		header("location: ../profile.php?id=$id");
	}
?>