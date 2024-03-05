<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
            <form action="#" class="form-login">
                <div class="user-container mx-2">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="E.g: TSKM-001" autofocus required>
                </div>
                <div class="mb-3"></div>
                <div class="user-container mx-2">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" autofocus required>
                    <div class="mb-3"></div>
                </div>
                <div class="mb-3"></div>
                <hr>
                <div class="text-center">
                    <p>Don't have an account? <a href="#" class="reg-link">Create one now!</a> </p>
                </div>
                <div class="user-btn mx-2">
                    <button class="btn-login">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
    <footer class="my-footer">&copy; 2024 Copyright<strong>Cat Dumpling Productions</strong></footer>

</body>

</html>