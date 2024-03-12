<?php
include "config.php";


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_task'])) {
    // Retrieve data from the form
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_site = $_POST['task_site'];

    // Prepare update query
    $update_query = "UPDATE task_list SET task_name = '$task_name', task_site = '$task_site' WHERE task_id = '$task_id'";

    // Execute the update query
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Task updated successfully!')</script>";
        // Reload the page to reflect the changes
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
        
<!-- Modal -->
<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Task and Site</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="task_id" value="<?php echo $row['task_id']; ?>">
                    <div class="col">
                        <label for="task_name">Task Name:</label>
                        <input type="text" class="form-control " name="task_name" value="<?php echo $row['task_name']; ?>">
                        <div class="mb-3"></div>
                    </div>
                    <div class="col">
                        <label for="task_site">Task Site:</label>
                        <input type="text" class="form-control " name="task_site" value="<?php echo $row['task_site']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="update_task">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>