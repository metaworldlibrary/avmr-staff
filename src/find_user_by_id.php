<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done
	$results = find_user_by_id($_POST["user_id"]);
	if (count($results)>0){
		echo json_encode($results, JSON_FORCE_OBJECT);
	}
	else {
		echo 0;
	}
	//closing database connection
	$mysqli -> close();
?>
