<?php

session_start();
require_once '../config/DBconnect.php';

header('Content-Type: application/json');

$query = "SELECT id, title, category, description, created_at FROM member_d_features ORDER BY id DESC";
$result = $conn->query($query);

$features = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $features[] = $row;
    }
}

echo json_encode($features);
exit();
?>