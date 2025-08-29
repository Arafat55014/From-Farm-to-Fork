<?php
include 'db_connection.php';

header('Content-Type: application/json');

$sql = "SELECT d.*, p.name as product_name 
        FROM demand_supply d 
        JOIN products p ON d.product_id = p.id 
        ORDER BY d.record_date DESC";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>