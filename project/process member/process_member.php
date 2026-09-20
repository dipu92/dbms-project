<?php

session_start();
require_once '../config/DBconnect.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: member_d_dashboard.php");
    exit();
}


$user_id     = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 1;
$title       = isset($_POST['title']) ? trim($_POST['title']) : '';
$category    = isset($_POST['category']) ? trim($_POST['category']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';


if (empty($title) || empty($category) || empty($description)) {
    header("Location: member_d_dashboard.php?error=" . urlencode("All mandatory fields must be completed."));
    exit();
}


try {
    $stmt = $conn->prepare("INSERT INTO member_d_features (user_id, title, category, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $category, $description);

    if ($stmt->execute()) {
        header("Location: member_d_dashboard.php?success=" . urlencode("Data submitted successfully."));
        exit();
    } else {
        header("Location: member_d_dashboard.php?error=" . urlencode("Failed to submit data."));
        exit();
    }
} catch (Exception $e) {
    header("Location: member_d_dashboard.php?error=" . urlencode("Database Error: " . $e->getMessage()));
    exit();
}
?>
