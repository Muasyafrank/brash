<?php
header("Content-Type: application/json");
include("db.php");

// Check if the connection was successful
if ($conn === null) {
    echo json_encode(["error" => "Database connection failed."]);
    exit();
}

$sql = "SELECT id,name,image FROM shops";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit();
}

$shops = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row["image"] = base64_encode($row["image"]); // Convert BLOB to Base64
        $shops[] = $row;
    }
}

echo json_encode($shops);
$conn->close();
?>
