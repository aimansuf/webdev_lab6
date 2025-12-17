<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>ShoutBox Setup</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .success { color: green; background: #d4edda; padding: 10px; border-radius: 5px; }
        .error { color: red; background: #f8d7da; padding: 10px; border-radius: 5px; }
        .btn { padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>ShoutBox Database Setup</h2>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Connect to MySQL
        $conn = mysqli_connect('localhost', 'root', '');
        if (!$conn) {
            echo "<div class='error'>Failed to connect to MySQL: " . mysqli_connect_error() . "</div>";
            exit;
        }
        
        echo "<div class='success'>✓ Connected to MySQL server</div>";
        
        // Create database
        if (mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS shoutbox")) {
            echo "<div class='success'>✓ Database 'shoutbox' created/verified</div>";
        } else {
            echo "<div class='error'>Error creating database: " . mysqli_error($conn) . "</div>";
        }
        
        // Select database
        mysqli_select_db($conn, "shoutbox");
        
        // Create table
        $sql = "CREATE TABLE IF NOT EXISTS shouts (
            shout_id INT AUTO_INCREMENT PRIMARY KEY,
            shout_text TEXT NOT NULL,
            shout_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if (mysqli_query($conn, $sql)) {
            echo "<div class='success'>✓ Table 'shouts' created/verified</div>";
        } else {
            echo "<div class='error'>Error creating table: " . mysqli_error($conn) . "</div>";
        }
        
        // Insert sample data
        $check = mysqli_query($conn, "SELECT COUNT(*) as count FROM shouts");
        $row = mysqli_fetch_assoc($check);
        
        if ($row['count'] == 0) {
            $sql = "INSERT INTO shouts (shout_text) VALUES 
                ('Welcome to ShoutBox!'),
                ('Post your messages here!')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<div class='success'>✓ Sample data inserted</div>";
            }
        } else {
            echo "<div class='success'>✓ Database already has data (" . $row['count'] . " shouts)</div>";
        }
        
        mysqli_close($conn);
        
        echo "<hr>";
        echo "<h3>Setup Complete!</h3>";
        echo "<p><a href='index.php' class='btn'>Open ShoutBox</a></p>";
        
    } else {
        ?>
        <p>Click the button below to set up the ShoutBox database and table:</p>
        <form method="POST">
            <button type="submit" class="btn">Setup Database</button>
        </form>
        <p><a href="../index.php">← Back to Lab 6a</a></p>
        <?php
    }
    ?>
</body>
</html>