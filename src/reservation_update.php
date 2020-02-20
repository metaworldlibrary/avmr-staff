<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$sqldatein=date('Ymd',strtotime($_POST["date_in"]));
	$sqldateout=date('Ymd',strtotime($_POST["date_out"]));

	$results = update_reservation($_POST["room_id"], $sqldatein, $sqldateout, $_POST["reservation_id"]);
	if ($results===1){
		echo 1;
	}
	else{
		echo 0;
	}

	function update_reservation($room_id, $datein, $dateout, $reservationID) {
		//Getting the connection from above
		global $mysqli;
		//preparing the query and executing the query, first line is the template and the ? will be replaced
		$stmt = $mysqli->prepare ("UPDATE reservationqueue SET room_id=?, date_in=?, date_out=? WHERE ID = ?");
	  $stmt->bind_param("iiss", $room_id, $datein, $dateout, $reservationID);  //replacing the ? in the query, first param are the type (s for string)
		$stmt->execute(); //executing the query
		$mysqli -> close();	//closing database connection
	  return 1;
	}
?>
