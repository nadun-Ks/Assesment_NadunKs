<?php

require '../dbconnection.php';

header('Content-Type: application/json');

$query = "SELECT * FROM task WHERE is_completed = 0 ORDER BY ID ASC LIMIT 5";
$response = mysqli_query($connect, $query);

if ($response) {
    $tasks = [];
    while ($row = mysqli_fetch_assoc($response)) {
        $tasks[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'description' => $row['description'],
            'is_completed' => $row['is_completed'],
            'created_datetime' => $row['created_datetime']
        ];
    }

    echo json_encode(['tasks' => $tasks], JSON_PRETTY_PRINT);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($connect)]);
}

?>
