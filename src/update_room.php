<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$results = update_room($_POST["name"], $_POST["accomodations"], $_POST["price"], $_POST["desc"], $_POST["roomnum"], $_POST["status"], $_POST["id"]);
	if ($results==1){
		echo 1; //converts the result from array to JSON
	}
	else{
		echo 0;
	}

//var_dump($_POST);
	function update_room($name, $accomodation, $price, $desc, $roomnum, $status, $id) {
		//Getting the connection from above
		global $mysqli;
		//preparing the query and executing the query, first line is the template and the ? will be replaced
		$stmt = $mysqli->prepare ("UPDATE accommodationinfo SET room_name = ?, room_accommodation_num = ?, price = ?, room_desc = ?, room_num = ?, accommodationinfo.status = ? WHERE ID = ?");
	  $stmt->bind_param("siisiii", $name, $accomodation, $price, $desc, $roomnum, $status, $id);
		$stmt->execute(); //executing the query

		if ($stmt->affected_rows>0){
			$mysqli -> close();//closing database connection
			return 1;
		}
		else {
			$mysqli -> close();//closing database connection
			return 0;
		}
	}
?>
