<?php
	//require("databaseConfig.php");
	function getCollegeDataById($id){
		$getSql = "SELECT * FROM `colleges` WHERE id = '$id'";
		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			$resultArr["status"] = true;
			$resultArr["id"] = $row["ID"];
			$resultArr["name"] = $row["Name"];
			$resultArr["description"] = $row["Description"];
			$resultArr["subject"] = $row["Subjects"];
			$resultArr["images"] = $row["Images"];
			$resultArr["map"] = $row["Map"];
			$resultArr["ratingAVG"] = $row["ratingAVG"];
			$resultArr["phone"] = $row["phone"];
			$resultArr["email"] = $row["email"];
			$resultArr["location"] = $row["location"];
		}else{
			//return 404;
			$resultArr["status"] = false;
		}
		return $resultArr;
	}
	
	function checkUserRating($userID,$collegeID){
		$getSql = "SELECT * FROM `ratings` WHERE userID = '$userID'  AND collegeID = '$collegeID'";
		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			$statusArr["status"] = true;
		}else{
			//return 404;
			$statusArr["status"] = false;
		}
		return $statusArr;
	}
	function createRating($userID,$collegeID,$rating){
		$setSql = "INSERT INTO `ratings` (userID,collegeID,rating) VALUES ('$userID','$collegeID','$rating')";
		if(!empty($userID) And !empty($collegeID) And !empty($rating) And !checkUserRating($userID,$collegeID)["status"]){
			$res = $GLOBALS['conn']->query($setSql);
			$status = true;
		}else{
			$status = false;
		}
		return $status;
	}
	function getRatingAverage($collegeID){
		$getSql = "SELECT * FROM `ratings` WHERE collegeID = '$collegeID'";
		$cummulative = 0;
		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			while($row = $res->fetch_assoc()){
				$cummulative += $row["rating"];
			}
			$statusArr["result"] = $cummulative/($res -> num_rows);
			$statusArr["rounded"] = round($cummulative/($res -> num_rows));
			$statusArr["num"] = ($res -> num_rows);
			return $statusArr;
		}
	}
	function setRatingAverage($collegeID){
		$setSql = "UPDATE `colleges` SET ratingAVG='". getRatingAverage($collegeID)["result"] ."' WHERE ID = '$collegeID'";
		$res = $GLOBALS['conn']->query($setSql);
	}

	function setComment($userID,$collegeID,$content){
		$setSql = "INSERT INTO `comments` (userID,collegeID,dateAndTime,content) VALUES ('$userID','$collegeID','". date("Y/m/d") ."','$content')";
		$res = $GLOBALS['conn']->query($setSql);
	}
	function loadComments($collegeID){
		$getSql = "SELECT * FROM `comments` WHERE collegeID ='$collegeID'";
		$res = $GLOBALS['conn']->query($getSql);
		if($res -> num_rows > 0){
			while($row = $res->fetch_assoc()){
				echo "
					<div class=\"comment\">
					<P style=\"grid-area: username\" class=\"comment-user\">".getUsernameById($row['userID'])."</P>
					<P style=\"grid-area: date\" class=\"comment-date\">". $row['dateAndTime'] ."</P>
					<P style=\"grid-area: content\" class=\"comment-content\">".$row['content']."</P>
					</div>
				";//output comments	
			}
		}
	}

	function splitIntoArray($str){
		return explode(",", $str);
	}
	
	
?>