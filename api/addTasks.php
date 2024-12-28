<?php
require '../dbconnection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? mysqli_real_escape_string($connect, $_POST['title']) : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($connect, $_POST['description']) : '';

    if (empty($title) || empty($description)) {
        http_response_code(400);
        echo json_encode(['error' => 'Title and Description are required']);
        exit;
    }

    $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')";
    
    if (mysqli_query($connect, $query)) {
        echo json_encode(['message' => 'Task added successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to add task: ' . mysqli_error($connect)]);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

?>
