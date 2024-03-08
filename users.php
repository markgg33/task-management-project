<?php

include "config.php";

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link rel="stylesheet" href="css/users.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/92cde7fc6f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg py-3 navigation-bar">
        <div class="container-lg nav-content">
            <div class="title-box">
                <a href="">
                    <h2><strong class="text-warning">CD</strong> Productions</h2>
                </a>
            </div>
            <div class="profile-box">
                <p>Welcome, <?php echo $_SESSION['user_first_name'] ?></p>
                <?php
                //Check if the photo path is available in the session
                if (isset($_SESSION['user_photo'])) {
                    $photoPath = $_SESSION['user_photo'];
                    // Display the photo using the retrieved path
                    echo '<img src="' . $photoPath . '" alt="User Photo" class = "user-photo">';
                } else {
                    echo "No photo available";
                }
                ?>
            </div>
        </div>
    </nav>


    <section class="container-lg td-box">
        <div class="mb-3"></div>
        <h2><strong>TASK MANAGEMENT SYSTEM PROJECT</strong></h2>
        <div class="mb-3"></div>
        <div class="container todoContainer">
            <form action="#" method="" class="form-todo">
                <div class="mb-3">
                    <label for="ToDoList">To Do List:</label>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <button class="btn btn-success">ADD TASK</button>
                    </div>

                    <div class="form-text text-light">Please insert a Task.</div>
                </div>
            </form>
        </div>

    </section>

    <div class="container-md bot-nav-container fixed-bottom">
        <div class="btn-choice">
            <button class="btn-buttons">
                <a href="user-profile.php"><i class="fa-solid fa-user"></i>Profile</a>
            </button>
            <button class="btn-buttons">
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </button>
        </div>
    </div>

</body>

</html>