<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "TestApp"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database Connection Failed: " . $conn->connect_error]));
}
?>
