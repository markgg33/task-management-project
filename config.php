<?php

$conn = mysqli_connect("localhost", "root", "P@ssword3309807", "task_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Manila');
