<?php
require('db.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Lab 6a</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="form dashboard">
        <h1>Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <p>This is another secured page in your application.</p>
        
        <div class="dashboard-info">
            <h3>Your Account Information</h3>
            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Session Started:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
        
        <div class="dashboard-links">
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>