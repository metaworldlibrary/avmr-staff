<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$results = update_user_info($_POST["user_id"], $_POST["first_name"], $_POST["last_name"], $_POST["landline"], $_POST["mobile"]);
	if ($results===1){
		echo 1;
	}
	else{
		echo 0;
	}
	//closing database connection
	$mysqli -> close();
?>
