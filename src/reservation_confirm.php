<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$sqldatein=date('Ymd',strtotime($_POST["date_in"]));
	$sqldateout=date('Ymd',strtotime($_POST["date_out"]));

	$results = create_reservation($_POST["guest_id"], $_POST["room_id"], $sqldatein, $sqldateout);
	if ($results===1){
		echo 1;
	}
	else{
		echo 0;
	}

	function create_reservation($guest_id, $room_id, $datein, $dateout) {
		//Getting the connection from above
		global $mysqli;
		//preparing the query and executing the query, first line is the template and the ? will be replaced
		$stmt = $mysqli->prepare ("INSERT INTO reservationqueue (guest_id, room_id, date_in, date_out) VALUES (?,?,?,?)");
	  $stmt->bind_param("iiss", $guest_id, $room_id, $datein, $dateout);  //replacing the ? in the query, first param are the type (s for string)
		$stmt->execute(); //executing the query
		$mysqli -> close();
	  return 1;
	}
?>
