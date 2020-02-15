<?php
	if(session_id() == ''){
			session_start();
	}
	require "db_library.php"; //PHP file where the database proccessing is actually done

	$results = update_user_password($_POST["user_id"], $_POST["currentpass"], $_POST["newpass"], $_POST["repassword"]);
	if ($results===1){
		echo 1;
	}
	else{
		echo 0;
	}
	//closing database connection
	$mysqli -> close();
?>
