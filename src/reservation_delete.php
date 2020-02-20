<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$results = delete_reservation($_POST["res_id"]);
	if ($results===1){
		echo 1;
	}
	else{
		echo 0;
	}

	function delete_reservation($res_id) {
		//Getting the connection from above
		global $mysqli;
		//preparing the query and executing the query, first line is the template and the ? will be replaced
		$stmt = $mysqli->prepare ("DELETE FROM reservationqueue WHERE ID = ?");
	  $stmt->bind_param("i", $res_id);  //replacing the ? in the query, first param are the type (s for string)
		$stmt->execute(); //executing the query
		$mysqli -> close();//closing database connection
	  return 1;
	}
?>
