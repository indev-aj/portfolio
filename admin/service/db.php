<?php

$servername ="localhost";
$username = "indevtec_amrin";
$password = "aj_120478_Zero";
$dbname = "indevtec_personal_portfolio";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}