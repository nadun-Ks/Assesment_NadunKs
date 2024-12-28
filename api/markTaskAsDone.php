<?php
require '../dbconnection.php';

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $completed_datetime = date('Y-m-d H:i:s');

    $query = "UPDATE task SET is_completed = 1, completed_datetime = ? WHERE id = ?";

    if ($stmt = $connect->prepare($query)) {
        $stmt->bind_param("si", $completed_datetime, $task_id);

        if ($stmt->execute()) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Task marked as completed successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to mark task as completed'
            ]);
        }

        $stmt->close();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Error in preparing SQL query'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Task ID is required'
    ]);
}

$connect->close();
?>
