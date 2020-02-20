<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	/*$_POST["room_checkindate"] and $_POST["room_checkoutdate"] were retrived from
	the POST request made in book_post.js. "select_room(datein, dateout, pax)" is a
	function from db_library, it returns an array with the available rooms or 0 if there is any.*/

	$results = reservation_list();
	if (count ($results)>0){
		echo json_encode($results, JSON_FORCE_OBJECT); //converts the result from array to JSON
	}
	else{
		echo 0;
	}

	function reservation_list() {
		//Getting the connection from above
		global $mysqli;
		//preparing the query and executing the query, first line is the template and the ? will be replaced
		$stmt = $mysqli->prepare ("SELECT * FROM reservationqueue");
		$stmt->execute(); //executing the query

	  $result = $stmt->get_result(); //getting results
		if ($result->num_rows === 0) //no results means not registered
	    exit("no_reservation"); //exit the script and sends a message

	  $row= $result->fetch_all(MYSQLI_ASSOC);
		$mysqli -> close();//closing database connection
	  return $row;
	}
?>
