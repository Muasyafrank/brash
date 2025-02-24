<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Testapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Retrieve and sanitize input values
$data = json_decode(file_get_contents('php://input'), true); // Parse JSON input

// Initialize variables with default values
$first_name = isset($data['first_name']) ? trim($data['first_name']) : '';
$last_name = isset($data['last_name']) ? trim($data['last_name']) : '';
$address = isset($data['address']) ? trim($data['address']) : '';
$phone = isset($data['phone']) ? trim($data['phone']) : '';

// Basic validation: Ensure all required fields are provided
if (empty($first_name) || empty($last_name) || empty($address) || empty($phone)) {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    $conn->close();
    exit;
}

// Prepare the SQL statement to insert appointment details
$sql = "INSERT INTO appointments (first_name, last_name, reason, phone) VALUES (?, ?, ?, ?)";
$stmt = null; // Initialize $stmt as null

try {
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error preparing the query: " . $conn->error);
    }

    $stmt->bind_param("ssss", $first_name, $last_name, $address, $phone); // Bind parameters
    $stmt->execute(); // Execute the query

    if ($stmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Appointment booked successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to book appointment."]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
} finally {
    // Close the statement and connection only if they were initialized
    if ($stmt !== null) {
        $stmt->close();
    }
    $conn->close();
}
?>