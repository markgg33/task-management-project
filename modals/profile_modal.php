<?php

// Retrieve user's profile information from session variables
$user_emp_username = $_SESSION['user_emp_username'];
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_dob = $_SESSION['user_dob'];
$user_gender = $_SESSION['user_gender'];
$user_status = $_SESSION['user_status'];
$user_nationality = $_SESSION['user_nationality'];
$user_address = $_SESSION['user_address'];
$user_city = $_SESSION['user_city'];
$user_state = $_SESSION['user_state'];
$user_country = $_SESSION['user_country'];
$user_email = $_SESSION['user_email'];
$user_mobile = $_SESSION['user_mobile'];
$user_emp_type = $_SESSION['user_emp_type'];
$user_joining_date = $_SESSION['user_joining_date'];
$user_department = $_SESSION['user_department'];
$user_usertype = $_SESSION['user_usertype'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {

    if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $photoName = basename($_FILES["new_photo"]["name"]);
        $targetFilePath = $targetDir . $photoName;

        // Move the uploaded file to the specified location
        if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $targetFilePath)) {
            // Update the photo field in the database
            $update_photo_query = "UPDATE login_users SET photo = '$targetFilePath' WHERE emp_username = '$user_emp_username'";
            mysqli_query($conn, $update_photo_query);

            // Update the session variable with the new photo path
            $_SESSION['user_photo'] = $targetFilePath;
        }
    }

    // Retrieve updated profile information from the form
    $new_first_name = mysqli_real_escape_string($conn, $_POST['new_first_name']);
    $new_last_name = mysqli_real_escape_string($conn, $_POST['new_last_name']);
    $new_emp_pass = mysqli_real_escape_string($conn, $_POST['new_emp_pass']);
    $confirm_new_emp_pass = mysqli_real_escape_string($conn, $_POST['confirm_new_emp_pass']);
    $new_dob = mysqli_real_escape_string($conn, $_POST['new_dob']);
    $new_gender = mysqli_real_escape_string($conn, $_POST['new_gender']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
    $new_nationality = mysqli_real_escape_string($conn, $_POST['new_nationality']);
    $new_address = mysqli_real_escape_string($conn, $_POST['new_address']);
    $new_city = mysqli_real_escape_string($conn, $_POST['new_city']);
    $new_state = mysqli_real_escape_string($conn, $_POST['new_state']);
    $new_country = mysqli_real_escape_string($conn, $_POST['new_country']);
    $new_email = mysqli_real_escape_string($conn, $_POST['new_email']);
    $new_mobile = mysqli_real_escape_string($conn, $_POST['new_mobile']);
    $new_emp_type = mysqli_real_escape_string($conn, $_POST['new_emp_type']);
    $new_department = mysqli_real_escape_string($conn, $_POST['new_department']);
    $new_usertype = mysqli_real_escape_string($conn, $_POST['new_usertype']);
    // Add other profile fields as needed

    // Prepare update query
    $update_query = "UPDATE login_users SET first_name = '$new_first_name', last_name = '$new_last_name', emp_pass = '$new_emp_pass', 
    dob = '$new_dob', gender = '$new_gender' , status = '$new_status' , nationality = '$new_nationality', address = '$new_address', 
    city = '$new_city', state = '$new_state',  country = '$new_country',  email = '$new_email', mobile = '$new_mobile' , 
    emp_type = '$new_emp_type', department = '$new_department', usertype = '$new_usertype' WHERE emp_username = '$user_emp_username'";

    // Validate if password and confirm password match
    if ($new_emp_pass !== $confirm_new_emp_pass) {
        echo '<script>alert("New password and confirm password do not match.");</script>';
        echo "<script>window.location.href = 'users.php';</script>"; // or handle the error in another way
    }

    // Execute the update query
    if (mysqli_query($conn, $update_query)) {
        // Update session variables with the new profile information
        $_SESSION['user_first_name'] = $new_first_name;
        $_SESSION['user_last_name'] = $new_last_name;
        $_SESSION['user_dob'] = $new_dob;
        $_SESSION['user_gender'] = $new_gender;
        $_SESSION['user_status'] = $new_status;
        $_SESSION['user_nationality'] = $new_nationality;
        $_SESSION['user_address'] = $new_address;
        $_SESSION['user_city'] = $new_city;
        $_SESSION['user_state'] = $new_state;
        $_SESSION['user_country'] = $new_country;
        $_SESSION['user_email'] = $new_email;
        $_SESSION['user_mobile'] = $new_mobile;
        $_SESSION['user_emp_type'] = $new_emp_type;
        $_SESSION['user_department'] = $new_department;
        $_SESSION['user_usertype'] = $new_usertype;

        // Add other session variables as needed

        // Provide feedback to the user
        echo "<script>alert('Profile updated successfully!')</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!-- Modal -->
<div class="modal fade" id="updateProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateProfileModalLabel">Update Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row gx-3">
                            <div class="col">
                                <label for="Username">Username:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="new_emp_username" value="<?php echo $_SESSION['user_emp_username']; ?>" disabled>
                                    <span class=" input-group-text"><i class="fa-solid fa-user"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <label for="Email">Email:</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="new_email" value="<?php echo $_SESSION['user_email']; ?>" autofocus required>
                                    <span class="input-group-text">@gmail.com</i></span>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                <label for="FirstName">First Name:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="new_first_name" value="<?php echo $_SESSION['user_first_name']; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="LastName">Last Name:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="new_last_name" value="<?php echo $_SESSION['user_last_name']; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                <label for="AccountType">Account Type:</label>
                                <select name="new_gender" class="form-select">
                                    <option value="male" <?php echo ($_SESSION['user_gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="female" <?php echo ($_SESSION['user_gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="preferNTS" <?php echo ($_SESSION['user_gender'] == 'preferNTS') ? 'selected' : ''; ?>>Prefer not to say</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="Status">Status:</label>
                                <select class="form-select" aria-label="Default select example" name="new_status">
                                    <option value="Single" <?php echo ($_SESSION['user_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                                    <option value="Married" <?php echo ($_SESSION['user_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                                    <option value="Widowed" <?php echo ($_SESSION['user_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                    <option value="Separated" <?php echo ($_SESSION['user_status'] == 'Seperated') ? 'selected' : ''; ?>>Separated</option>
                                    <option value="Divorced" <?php echo ($_SESSION['user_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="Nationality">Nationality:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="new_nationality" value="<?php echo $_SESSION['user_nationality']; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                <label for="DateOfBirth">Date of Birth:</label>
                                <input type="date" name="new_dob" class="form-control" value="<?php echo $_SESSION['user_dob']; ?>" autofocus required>
                            </div>
                            <div class="col">
                                <label for="Password">Password:</label>
                                <div class="input-group">
                                    <input type="password" name="new_emp_pass" class="form-control" placeholder="Enter New Password" autofocus required>
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <label for="ConfirmPassword">Confirm Password:</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_new_emp_pass" class="form-control" placeholder="Confirm New Password" autofocus required>
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                <label for="Address">Address:</label>
                                <input type="text" name="new_address" class="form-control" value="<?php echo $_SESSION['user_address']; ?>" autofocus required>
                            </div>
                            <div class="col">
                                <label for="City">City:</label>
                                <div class="input-group">
                                    <input type="text" name="new_city" class="form-control" value="<?php echo $_SESSION['user_city']; ?>" autofocus required>
                                </div>

                            </div>
                            <div class="col">
                                <label for="State">State:</label>
                                <div class="input-group">
                                    <input type="text" name="new_state" class="form-control" value="<?php echo $_SESSION['user_state']; ?>">
                                </div>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                <label for="Country">Country:</label>
                                <input type="text" name="new_country" class="form-control" value="<?php echo $_SESSION['user_country']; ?>" autofocus required>
                            </div>

                            <div class="col">
                                <label for="Mobile">Mobile:</label>
                                <div class="input-group">
                                    <input type="text" name="new_mobile" class="form-control" value="<?php echo $_SESSION['user_mobile']; ?>" autofocus required>
                                </div>

                            </div>
                            <div class="col">
                                <label for="EmployeeType">Employee Type:</label>
                                <select name="new_emp_type" class="form-select">
                                    <option value="Part Time Employee" <?php echo ($_SESSION['user_emp_type'] == 'Part Time Employee') ? 'selected' : ''; ?>>Part-time Employee</option>
                                    <option value="Intern" <?php echo ($_SESSION['user_emp_type'] == 'Intern') ? 'selected' : ''; ?>>Intern</option>
                                    <option value="Holiday Worker" <?php echo ($_SESSION['user_emp_type'] == 'Holiday Worker') ? 'selected' : ''; ?>>Holiday Worker</option>
                                    <option value="Permanent Position" <?php echo ($_SESSION['user_emp_type'] == 'Permanent Position') ? 'selected' : ''; ?>>Permanent Position</option>
                                </select>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                <label for="JoiningData">Data Joined:</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="joining_date" value="<?php echo $_SESSION['user_joining_date']; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="Department">Department:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="new_department" value="<?php echo $_SESSION['user_department']; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                        </div>

                        <div class="row gx-3">
                            <div class="col">
                                
                            </div>
                            <div class="col">
                                <label for="AccountType">Account Type:</label>
                                <select name="new_usertype" class="form-select">
                                    <option value="user" <?php echo ($_SESSION['user_usertype'] == 'user') ? 'selected' : ''; ?>>User</option>
                                    <option value="admin" <?php echo ($_SESSION['user_usertype'] == 'admin') ? 'selected' : ''; ?> disabled>Admin</option>
                                </select>
                            </div>
                            <div class="mb-3"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="update_profile">Update Profile</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>