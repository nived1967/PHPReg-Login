<?php

$servername = "localhost";
$username = "root";
$password = "Project@2024";
$dbname="internship";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>