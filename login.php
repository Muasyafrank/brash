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
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

// Retrieve and sanitize input values
$data = json_decode(file_get_contents('php://input'), true); // Parse JSON input

$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? trim($data['password']) : '';

// Validate input
if (empty($email) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Email and password are required."]);
    $conn->close();
    exit;
}

// Query the database
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = null; // Initialize $stmt as null

try {
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error preparing the query: " . $conn->error);
    }

    $stmt->bind_param("s", $email); // Bind parameters
    $stmt->execute(); // Execute the query
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Fetch user data

        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo json_encode(["status" => "success", "message" => "Login successful."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid email or password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid email or password."]);
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