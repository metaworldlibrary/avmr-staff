<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$results= userlogin($_POST["login_username"], $_POST["login_password"]);
	if (count($results)>0){
		$_SESSION["staff_id"] = $results["ID"]; //creates SESSION variable with the ID.
		$_SESSION["staff_name"] = $results["staff_name_first"]; //creates SESSION variable with the name in it.
		$_SESSION["staff_lastname"] = $results["staff_name_last"]; //creates SESSION variable with the last name in it.
		$_SESSION["staff_position"] = $results["staff_position"]; //creates SESSION variable with the last name in it.
		echo json_encode($results, JSON_FORCE_OBJECT);
	}
	else {
		echo 0;
	}

	//Login function
	function userlogin($login, $password) {
		//Getting the connection from above
		global $mysqli;
		//preparing the query and executing the query, first line is the template and the ? will be replaced
		$stmt = $mysqli->prepare ("SELECT * FROM avmr_staffinfo WHERE ID= ?");
	  $stmt->bind_param("i", $login);  //replacing the ? in the query, first param are the type (s for string)
		$stmt->execute(); //executing the query

	  $result = $stmt->get_result(); //getting results
		if ($result->num_rows === 0) //no results means not registered
	    exit("username"); //exit the script and sends a message

		$row = $result->fetch_assoc();//converts result into an associative array
		if (!($row["staff_pass"] === $password))//compares the passwords
	    exit("password");//exit the script and sends a message

		$mysqli -> close(); //closing database connection
	  return $row; //returning 1 since everything was successful
	}
?>
