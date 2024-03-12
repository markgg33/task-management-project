<?php



if (isset($_POST['delete_task'])) {
    $task_id = $_POST['task_id'];

    // Perform the delete operation
    $delete_query = "DELETE FROM task_list WHERE task_id = '$task_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Task deleted successfully!')</script>";
        // Reload the page to reflect the changes
        echo "<script>window.location.href = 'users.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

