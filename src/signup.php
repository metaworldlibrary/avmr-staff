<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$results = create_user($_POST["signup_firstname"], $_POST["signup_lastname"], $_POST["signup_email"], $_POST["signup_username"], $_POST["signup_password"], $_POST["signup_mobile"], $_POST["signup_landline"]);
	if ($results===1){
		echo 1;
	}
	else{
		echo 0;
	}
	//closing database connection
	$mysqli -> close();
?>
