<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Home - Lab 6a</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="form dashboard">
        <h1>Welcome Home</h1>
        <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
        <p>This is a secure area accessible only after login.</p>
        
        <div class="dashboard-links">
            <p><a href="dashboard.php">Dashboard</a></p>
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>