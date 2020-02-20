<?php
//connection string credentials
$servername = "localhost";
$username = "avmr";
$password = "xZMALC9baTIsSzFs";
$dbname = "avmr_db";

/*$servername = "148.72.232.175:3306";
$username = "avmr";
$password = "8Wewk9%1";
$dbname = "ph10760189362_";*/

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $mysqli = new mysqli("$servername", "$username", "$password", "$dbname");
  $mysqli->set_charset("utf8mb4");
}
catch(Exception $e) {
  error_log($e->getMessage());
  exit("Database connection issues");
}
?>
