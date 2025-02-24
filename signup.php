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

$name = isset($data['name']) ? trim($data['name']) : '';
$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? trim($data['password']) : '';

// Validate input
if (empty($name) || empty($email) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    $conn->close();
    exit;
}

// Check if the email already exists
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
        echo json_encode(["status" => "error", "message" => "Email already registered."]);
        exit;
    }

    // Insert the new user into the database
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
    $insertSql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    if (!$insertStmt) {
        throw new Exception("Error preparing the insert query: " . $conn->error);
    }

    $insertStmt->bind_param("sss", $name, $email, $hashedPassword); // Bind parameters
    $insertStmt->execute(); // Execute the query

    if ($insertStmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Signup successful."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to create account."]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
} finally {
    // Close the statements and connection only if they were initialized
    if ($stmt !== null) {
        $stmt->close();
    }
    if (isset($insertStmt)) {
        $insertStmt->close();
    }
    $conn->close();
}
?>