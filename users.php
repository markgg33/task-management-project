<?php

include "config.php";

session_start();


if (isset($_SESSION['user_emp_username'])) {
    $emp_username = $_SESSION['user_emp_username'];
    // Fetch data
    $task_query = "SELECT * FROM task_list WHERE emp_username = '$emp_username'";
    $result = mysqli_query($conn, $task_query);
} else {
    // Handle the case when the session variable is not set
    echo "User emp_username is not set in the session.";
}

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
                    echo '<img src="' . $photoPath . '" alt="User Photo" class ="user-photo">';
                }else {
                    echo 'No photo available!';
                }
                ?>
                <div class="btn-group">
                    <button type="button" class="btn-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu dropdown-menu-end" style="margin-top: 30px;">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="container-lg td-box">
        <div class="mb-3"></div>
        <h1 class="text-center"><strong>TASK MANAGEMENT SYSTEM PROJECT</strong></h1>
        <div class="mb-3"></div>
        <div class="container todoContainer">
            <button class="btn-buttons" type="button" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
            </button>

            <button class="btn-buttons" type="button" data-bs-toggle="modal" data-bs-target="#taskModal">
                <i class="fa-solid fa-add"></i>
                <span>Add Task</span>
            </button>
        </div>

        <?php
        /*TASK MODAL */
        include "modals/task_modal.php";
        ?>

        <?php

        /*UPDATE PROFILE MODAL*/
        include "modals/profile_modal.php";
        ?>

    </section>

    <section class="container-lg">
        <div class="mb-5"></div>
        <h2><strong>LIST OF TASKS</strong></h2>

        <?php
        // Check if there are no tasks in the database
        if (mysqli_num_rows($result) == 0) {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'No tasks found in the database.';
            echo '</div>';
        }
        ?>

        <?php

        /*DELETE MODAL */
        include "modals/delete_modal.php";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='mb-3'></div>";
                echo "<div class='container-lg todoContainer-content'>";
                //Column Container Start
                echo "<div class='col col-container'>";
                echo "<label for='nameLabel'>Task ID:</label>";
                echo "<input type='text' class='form-control' placeholder='" . $row['task_id'] . "' disabled>";
                echo "<div class='mb-3'></div>";
                echo "<label for='nameLabel'>Task Name:</label>";
                echo "<input type='text' class='form-control' placeholder='" . $row['task_name'] . "' disabled>";
                echo "<div class='mb-3'></div>";
                echo "<label for='nameLabel'>Task Site:</label>";
                echo "<input type='text' class='form-control' placeholder='" . $row['task_site'] . "' disabled>";
                echo "<div class='mb-3'></div>";
                echo "</div>";
                //Column Container End
                echo "<div class='mb-5'></div>";
                echo "<div class='action-container'>";
                echo "<button type='button' class='btn btn-primary btn-choices' data-bs-toggle='modal' data-bs-target='#updateModal'>";
                echo "<i class='fas fa-pen'></i>";
                echo "</button>";
                // Delete button triggering modal
                echo "<button type='button' class='btn btn-danger btn-choices' data-bs-toggle='modal' data-bs-target='#deleteModal" . $row['task_id'] . "'>";
                echo "<i class='fas fa-trash'></i>";
                echo "</button>";
                echo "</div>";
                echo "</div>";

                // Delete confirmation modal
                echo '<div class="modal fade" id="deleteModal' . $row['task_id'] . '" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">';
                echo '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo 'Are you sure you want to delete this task?';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
                echo '<form action="" method="post">';
                echo '<input type="hidden" name="task_id" value="' . $row['task_id'] . '">';
                echo '<button type="submit" class="btn btn-danger" name="delete_task">Delete</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                include "modals/update_modal.php";
            }
        }
        ?>

    </section>

</body>

</html>