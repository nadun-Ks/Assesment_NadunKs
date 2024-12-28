<?php

$connect = mysqli_connect(
    'db',        
    'dbadmin',   
    '1234',      
    'todo_App'   
);


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
