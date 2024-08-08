<?php 
$host = '127.0.0.1';
$username = "root";
$dbname = "webservice";
// $password = 'mysql@333$harbhajan';
$password = '8816839205';

// Establish the database connection
$connect = new mysqli($host, $username, $password, $dbname);
$limit=5;

// Check if the connection was successful
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
?>
