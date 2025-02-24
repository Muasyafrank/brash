<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Testapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Get form data
$hostelName = $_POST['hostelName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert data into database
$sql = "INSERT INTO bookings (hostel_name, email, phone) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $hostelName, $email, $phone);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Booking successful!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>