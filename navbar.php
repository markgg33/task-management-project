
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
            <div class="btn-group">
                <button type="button" class="btn-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                <ul class="dropdown-menu dropdown-menu-end" style="margin-top: 30px;">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    .btn-dropdown {
        margin-left: 10px;
        padding: 0 10px;
        border: 1px solid #a5ccd1;
        border-radius: 5px;
        background-color: transparent;
        color: white;
        transition: color 100ms, background-color 100ms;
    }

    .btn-dropdown:hover {
        color: black;
        background-color: #a5ccd1;
    }
</style>