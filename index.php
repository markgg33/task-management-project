<?php

include "config.php";

session_start();


//reference submit
if (isset($_POST['submit'])) {

    $emp_username = mysqli_real_escape_string($conn, $_POST['emp_username']);
    $emp_pass = $_POST['emp_pass'];

    $select = "SELECT * FROM login_users WHERE emp_username = '$emp_username' && emp_pass = '$emp_pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['usertype'] == 'admin') {
            $_SESSION['admin_emp_username'] = $row['emp_username'];
            $_SESSION['admin_first_name'] = $row['first_name'];
            $_SESSION['admin_last_name'] = $row['last_name'];
            $_SESSION['admin_dob'] = $row['dob'];
            $_SESSION['admin_gender'] = $row['gender'];
            $_SESSION['admin_status'] = $row['status'];
            $_SESSION['admin_nationality'] = $row['nationality'];
            $_SESSION['admin_address'] = $row['address'];
            $_SESSION['admin_city'] = $row['city'];
            $_SESSION['admin_state'] = $row['state'];
            $_SESSION['admin_country'] = $row['country'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_mobile'] = $row['mobile'];
            $_SESSION['admin_emp_type'] = $row['emp_type'];
            $_SESSION['admin_joining_date'] = $row['joining_date'];
            $_SESSION['admin_department'] = $row['department'];
            $_SESSION['admin_photo'] = $row['photo'];
            $_SESSION['admin_created'] = $row['email'];
            $_SESSION['admin_usertype'] = $row['usertype'];
            header('location: admin.php');
        } else if ($row['usertype'] == 'user') {
            $_SESSION['user_emp_username'] = $row['emp_username'];
            $_SESSION['user_first_name'] = $row['first_name'];
            $_SESSION['user_last_name'] = $row['last_name'];
            $_SESSION['user_dob'] = $row['dob'];
            $_SESSION['user_gender'] = $row['gender'];
            $_SESSION['user_status'] = $row['status'];
            $_SESSION['user_nationality'] = $row['nationality'];
            $_SESSION['user_address'] = $row['address'];
            $_SESSION['user_city'] = $row['city'];
            $_SESSION['user_state'] = $row['state'];
            $_SESSION['user_country'] = $row['country'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_mobile'] = $row['mobile'];
            $_SESSION['user_emp_type'] = $row['emp_type'];
            $_SESSION['user_joining_date'] = $row['joining_date'];
            $_SESSION['user_department'] = $row['department'];
            $_SESSION['user_photo'] = $row['photo'];
            $_SESSION['user_created'] = $row['email'];
            $_SESSION['user_usertype'] = $row['usertype'];
            header('location: users.php');
        } else {
            $error[] = "Incorrect Credentials. Please try again.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/92cde7fc6f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-md main-container">
        <div class="logo-container">
            <img src="images/task-icon.png" class="tskm-logo" alt="">
            <h1><strong>TASK MANAGEMENT SYSTEM</strong></h1>
        </div>

        <div class="form-container ">
            <form action="#" class="form-login" method="POST">
                <div class="user-container mx-2">
                    <label for="username">Username:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="emp_username" placeholder="E.g: TSKM-001" autofocus required>
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    </div>

                </div>
                <div class="mb-3"></div>
                <div class="user-container mx-2">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="emp_pass" autofocus required>
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>

                    <div class="mb-3"></div>
                </div>
                <div class="mb-3"></div>
                <hr>
                <div class="text-center">
                    <p>Don't have an account? <a href="registration.php" class="reg-link">Create one now!</a> </p>
                </div>
                <div class="user-btn mx-2">
                    <button class="btn-login" name="submit" type="submit">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="my-footer">
        <div class="footer-content">
            &copy; 2024 Copyright<strong> Cat Dumpling Productions</strong>
        </div>
    </footer>

</body>

</html>