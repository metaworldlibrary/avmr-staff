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
	//closing database connection
	$mysqli -> close();
?>
