<!---------FOR REGISTRATION PAGE TEMPLATE (CHANGE SOME VALUES)-------->

<?php

include 'config.php';

if (isset($_POST['submit'])) {
    // Sanitize and validate input data
    $emp_username = mysqli_real_escape_string($conn, $_POST['emp_username']);
    $emp_pass = mysqli_real_escape_string($conn, $_POST['emp_pass']); // Hash the password
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = $_POST['mobile'];
    $emp_type = $_POST['emp_type'];
    $joining_date = $_POST['joining_date'];
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $usertype = $_POST['usertype'];

    // Check if a file has been uploaded
    if (isset($_FILES['photo'])) {
        // File upload path
        $targetDir = "uploads/";
        $photoName = basename($_FILES["photo"]["name"]);
        $targetFilePath = $targetDir . $photoName;

        // Move the uploaded file to the specified location
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Insert the file path into the database
            $insert = "INSERT INTO login_users(emp_username, emp_pass, first_name, last_name, dob, gender, status, nationality, 
                address, city, state, country, email, mobile, emp_type, joining_date, department, photo, created, usertype) 
                VALUES ('$emp_username', '$emp_pass', '$first_name', '$last_name', '$dob', '$gender', '$status', '$nationality',
                '$address', '$city', '$state', '$country', '$email', '$mobile', '$emp_type', '$joining_date', '$department',
                '$targetFilePath', NOW() , '$usertype')";

            // Execute the query
            mysqli_query($conn, $insert);

            // Show success message with JavaScript
            echo '<script>alert("Account created successfully!");</script>';

            // Redirect to login page after a short delay
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 2000); // 2000 milliseconds (2 seconds)
                  </script>';
        } else {
            // Error handling if file upload fails
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Error handling if no file is uploaded
        echo "No file uploaded.";
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
    <link rel="stylesheet" href="css/register.css">
    <script src="https://kit.fontawesome.com/92cde7fc6f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-md main-container">
        <div class="logo-container">
            <img src="images/task-icon.png" class="tskm-logo" alt="">
            <h1><strong>REGISTRATION PAGE</strong></h1>
        </div>

        <div class="container form-container">
            <form action="#" class="form-login" method="POST" enctype="multipart/form-data">
                <div class="row gx-3">
                    <div class="col">
                        <label for="Username">Username:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="emp_username" placeholder="E.g: TSKM-001" autofocus required>
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                    </div>
                    <div class="col">
                        <label for="Email">Email:</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" autofocus required>
                            <span class="input-group-text">@gmail.com</i></span>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="FirstName">First Name:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="first_name" placeholder="E.g: Juan" autofocus required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="LastName">Last Name:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="last_name" placeholder="E.g: Dela Cruz" autofocus required>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="Gender">Gender:</label>
                        <select class="form-select" aria-label="Default select example" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Status">Status:</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Nationality">Nationality:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nationality" autofocus required>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="DateOfBirth">Date of Birth:</label>
                        <input type="date" name="dob" class="form-control" autofocus required>
                    </div>
                    <div class="col">
                        <label for="Password">Password:</label>
                        <div class="input-group">
                            <input type="password" name="emp_pass" class="form-control" autofocus required>
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>

                    </div>
                    <div class="col">
                        <label for="ConfirmPassword">Confirm Password:</label>
                        <div class="input-group">
                            <input type="password" name="emp_pass" class="form-control" autofocus required>
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="Address">Address:</label>
                        <input type="text" name="address" class="form-control" autofocus required>
                    </div>
                    <div class="col">
                        <label for="City">City:</label>
                        <div class="input-group">
                            <input type="text" name="city" class="form-control" autofocus required>
                        </div>

                    </div>
                    <div class="col">
                        <label for="State">State:</label>
                        <div class="input-group">
                            <input type="text" name="state" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="Country">Country:</label>
                        <input type="text" name="country" class="form-control" autofocus required>
                    </div>

                    <div class="col">
                        <label for="Mobile">Mobile:</label>
                        <div class="input-group">
                            <input type="text" name="mobile" class="form-control" autofocus required>
                        </div>

                    </div>
                    <div class="col">
                        <label for="EmployeeType">Employee Type:</label>
                        <select name="emp_type" class="form-select">
                            <option value="Part Time Employee">Part-time Employee</option>
                            <option value="Intern">Intern</option>
                            <option value="Holiday Worker">Holiday Worker</option>
                            <option value="Permanent Position">Permanent Position</option>
                        </select>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="JoiningData">Data Joined:</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="joining_date" autofocus required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="Department">Department:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="department" autofocus required>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <div class="row gx-3">
                    <div class="col">
                        <label for="Photo">Photo Upload:</label>
                        <div class="input-group">
                            <input type="file" name="photo" class="form-control" accept="image/*" autofocus required>
                            <span class="input-group-text"><i class="fa-solid fa-camera"></i></span>
                        </div>
                    </div>

                    <div class="col">
                        <label for="AccountType">Account Type:</label>
                        <select name="usertype" class="form-select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3"></div>
                </div>

                <hr>
                <div class="text-center">
                    <p>Already have an account? <a href="index.php" class="reg-link">Login now!</a> </p>
                </div>
                <div class="user-btn mx-2">
                    <button class="btn-login" name="submit" type="submit">REGISTER</button>
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