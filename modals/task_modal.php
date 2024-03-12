<?php



if (isset($_POST['submit'])) {
    $task_name = $_POST['task_name'];
    $task_site = $_POST['task_site'];

    $insert = "INSERT INTO task_list(emp_username, task_name, task_site)VALUES('$emp_username', '$task_name', '$task_site')";
    // Execute the query and handle errors
    if (mysqli_query($conn, $insert)) {
        // Success message if query executed successfully
        echo "<script>alert('Task added successfully!')</script>";
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        // Error message if query fails
        echo "Error: " . mysqli_error($conn);
    }
}


?>



<!-- Modal -->
<div class="modal fade" id="taskModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="taskModalLabel">Add a Task and Site</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                <input type="hidden" name="emp_username" value="<?php echo $_SESSION['user_emp_username']; ?>">
                    <div class="col">
                        <label for="taskName">Task Name:</label>
                        <input type="text" class="form-control" name="task_name" autofocus required>
                        <div class="mb-3"></div>
                    </div>
                    <div class="col">
                        <label for="taskSite">Task Site:</label>
                        <input type="text" class="form-control" name="task_site" autofocus required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="submit">Insert Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>