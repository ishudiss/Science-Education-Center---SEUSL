<!DOCTYPE html>
<html>
    <body>
<?php
// Database connection details
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = " "; // Change this to your database password
$dbname="seusl1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="CREATE DATABASE seusl1";
if ($conn->query($sql)===true){
	echo " Database is crated " ;} 
else{
echo "Error ". $conn->error;
}
$sql = "CREATE TABLE contact (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    number INT (10) ,
    message VARCHAR (255) 
)";	
if ($conn->query($sql)===true){
	echo " Table is crated " ;} 
else{
echo "Error ". $conn->error;
}


	$conn -> close ();
	?>