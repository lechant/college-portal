<?php
	function collegeFind($name){
		$sql = "SELECT * From `colleges` WHERE name = '$name'";
		$res = $GLOBALS['conn']->query($sql);
		if($res -> num_rows > 0){
			$row = $res->fetch_assoc();
			$statusArr["status"] = true;
			$statusArr["id"] = $row["ID"];
		}else{
			//return 404;
			$statusArr["status"] = false;
		}
		return $statusArr;
	}
	function collegeAdd($name,$description,$subject,$images,$map,$ratingAVG,$phone,$email,$location){
		$sql = "INSERT INTO `colleges` (Name,Description,Subjects,Images,Map,ratingAVG,phone,email,location) VALUES ('$name','$description','$subject','$images','$map','$ratingAVG','$phone','$email','$location')";
		if(!collegeFind($name)["status"]){
			$res = $GLOBALS['conn']->query($sql);
		}
	}
	function collegeUpdate($name,$description,$subject,$images,$map,$ratingAVG,$phone,$email,$location){
		$sql = "UPDATE `colleges` SET Name ='$name',Description = '$description',Subjects ='$subject',Images ='$images',Map='$map', ratingAvg = '$ratingAVG',phone = '$phone',email = '$email',location = '$location' WHERE Name = '$name'";
		if(collegeFind($name)["status"]){
			$res = $GLOBALS['conn']->query($sql);
		}
	}
	function collegeRemove($name){
		$sql = "DELETE FROM colleges WHERE Name = '$name'";
		if(collegeFind($name)["status"]){
			$res = $GLOBALS['conn']->query($sql);
		}
	}

	/*collegeAdd('test4','another one','bites the dust','https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Ash_Tree_-_geograph.org.uk_-_590710.jpg/220px-Ash_Tree_-_geograph.org.uk_-_590710.jpg','none','4','1234567890','beep@gmail.com','johor');*/
?>