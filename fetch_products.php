<?php
header("Content-Type: application/json");
// include("db.php");
include("data.php");

$shop_id = $_GET["shop_id"];
$sql = "SELECT id, name, price,description FROM products WHERE shop_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $shop_id);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    // $row["image"] = base64_encode($row["image"]); // Convert BLOB to Base64
    $products[] = $row;
}

echo json_encode($products);
$stmt->close();
// $conn->close();
?>
