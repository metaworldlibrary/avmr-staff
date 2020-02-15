<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// sql to create tables
$sql = "CREATE TABLE GuestInfo (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name_first VARCHAR(30) NOT NULL,
    name_last VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    no_mobile INT(11) NOT NULL,
    no_landline INT(8)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table GuestInfo created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
$sql = "CREATE TABLE CompanyInfo (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(30) NOT NULL,
    company_rep_name_first VARCHAR(30) NOT NULL,
    company_rep_name_last VARCHAR(30) NOT NULL,
    company_email VARCHAR(50) NOT NULL,
    company_no_mobile INT(11) NOT NULL,
    company_no_landline INT(8)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table CompanyInfo created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }   
$sql = "CREATE TABLE ReservationQueue (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    guest_id INT(6),
    company_id INT(6),
    date_in TIMESTAMP NOT NULL,
    date_out TIMESTAMP NOT NULL,
    status INT(3) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table ReservationQueue created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }   



$conn->close();
?>