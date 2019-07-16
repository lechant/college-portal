<?php
	//form sql query based off parameters
	function searchSort($sortBy,$name = "",$location = ""){
		$sortSql = "SELECT * FROM `colleges`";
		if(!empty($location)){
			$sortSql .= (" WHERE location = \"" . $location . "\"");
			if(!empty($name)){
				$sortSql .= (",Name = \"" . $name . "\"");
			}
		}else if(!empty($name)){
			$sortSql .= (" WHERE Name = \"" . $name . "\"");
		}
		if($sortBy == "rating"){
			$sortSql .= " ORDER BY ratingAVG DESC";
		}
		if($sortBy == "name"){
			$sortSql .=  " ORDER BY name DESC";
		}
		if($sortBy == "location"){
			$sortSql .=  " ORDER BY location DESC";
		}
		if($sortBy == "none"){
			
		}

		$res = $GLOBALS['conn']->query($sortSql);
		if($res -> num_rows > 0){
			while($row = $res->fetch_assoc()){
				echo "
					<a href='profile.php?id=". $row['ID']."'><div>
					<p>
					<img src=\"" . $row['Images'] . "\"  width=\"300\" height=\"250\" style=\"float: left\">
					Name: " .$row['Name'] . "<br>
					Location: " . $row['location'] . "<br>
					Rating:";

					for($i=0;$i<getRatingAverage($row["ID"])["rounded"];$i++){
						echo "<span class=\"fa fa-star checked\"></span>";
					}

				echo "
					</p>
					</div></a>
				";
			}
		}
		//echo $sortSql;
	}

	/*function queryModify($query,$location){
		return $query .= ("WHERE location = " . $location);  
	}*/
?>