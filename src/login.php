<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done
	$results= userlogin($_POST["login_username"], $_POST["login_password"]);
	if (count($results)>0){
		$_SESSION["user_id"] = $results["ID"]; //creates SESSION variable with the ID.
		$_SESSION["name"] = $results["name_first"]; //creates SESSION variable with the name in it.
		$_SESSION["last_name"] = $results["name_last"]; //creates SESSION variable with the last name in it.
		$_SESSION["email"] = $results["email"]; //creates SESSION variable with the last name in it.
		echo json_encode($results, JSON_FORCE_OBJECT);
	}
	else {
		echo 0;
	}
	//closing database connection
	$mysqli -> close();
?>
