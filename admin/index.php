<?php 
require_once '../load.php';
confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the admin panel</title>
</head>
<body>
    <h2>Welcome to the dashboard page, <?php echo $_SESSION['user_name']; ?></h2>

    <a href="admin_createuser.php">Create User</a>
    <a href="admin_logout.php">Sign Out</a>
</body>
</html>