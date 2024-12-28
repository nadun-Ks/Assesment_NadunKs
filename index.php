<?php

require 'dbconnection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
<main>

    <!-- <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1></h1>
    </div> -->

    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="display-4">ToDo App</h1>
        </div>
    </header>

    <div class="container mt-4 mb-4">        
        <div class="row">
            <div class="col-sm-6 p-3 pe-4 formcard">
                <!-- <div class="card"> -->
                        <div class="card-body">
                            <div id="responseMessage">
                                <!-- <div class="alert alert-danger">
                                    Something went wrong. Please try again later.
                                </div> -->
                            </div>
                            <h5 class="card-title">Add a Task</h5>
                            <form id="taskForm" class="" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                                    <label for="floatingInput">Title</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="description" name="description" placeholder="Description" style="height: 150px" required></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                                <div class="form-floating pt-3 pb-3 ps-3">
                                    <button type="submit" class="btn btn-primary" style="width: 100px; float:right">
                                        <i class="bi bi-plus-circle me-2"></i> Add
                                    </button>
                                </div>
                            </form>
                        </div>
                <!-- </div> -->
            </div>
            <div class="col-sm-6 p-3 ps-4" id="taskContainer">
                <!-- <div class="card p-2"> -->
                    <?php
                        // $query = "SELECT * FROM task LIMIT 5";

                        // $response = mysqli_query($connect, $query);

                        // if ($response) {
                        //     if (mysqli_num_rows($response) > 0) {
                        //         while ($i = mysqli_fetch_assoc($response)) {
                        //             // echo "<div class='card-body'>";
                        //             // echo "<p>".$i['title']."</p>";
                        //             // echo "<p>".$i['description']."</p>";
                        //             // echo "<p>".$i['created_datetime']."</p>";
                        //             // echo "</div>";
                        //             echo '
                        //                 <div class="card mt-3">
                        //                 <div class="card text-left">
                        //                     <div class="card-body">
                        //                         <div class="row">
                        //                             <div class="col-md-8">
                        //                                 <h5 class="card-title">'.$i['title'].'</h5>
                        //                                 <p class="card-text">'.$i['description'].'</p>
                        //                             </div>
                        //                             <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                        //                                 <a href="#" style="width:100px" class="btn btn-success">
                        //                                     <i class="bi bi-check-circle me-2"></i> Done
                        //                                 </a>
                        //                             </div>
                        //                         </div>
                        //                     </div>
                        //                 </div>
                        //                 </div>
                        //                 ';
                        //         }
                        //     } else {
                        //         echo "<div class='card'><div class='card-body'><b>No tasks found</div><b></div>";
                        //     }
                        // } else {
                        //     echo "Error: " . mysqli_error($connect);
                        // }
                    ?>
                <!-- </div> -->

               
            </div>
        </div>
    </div>
    </main>

    <footer class="text-center py-3 mt-auto">
        <p>&copy; ToDo Web Application. Nadun Ks.</p>
    </footer>
</body>


<script src="script.js"></script>

</html>