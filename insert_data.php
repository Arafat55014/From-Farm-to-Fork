<?php
include 'db_connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $demand = $_POST['demand'];
    $supply = $_POST['supply'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    
    $sql = "INSERT INTO demand_supply (product_id, demand_quantity, supply_quantity, price, record_date)
            VALUES ('$product_id', '$demand', '$supply', '$price', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data inserted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>