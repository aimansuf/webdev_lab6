<?php
// Database connection for Lab 6a
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lab6a";

// Create connection
$con = mysqli_connect($host, $user, $pass);

// Check if connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL server: " . mysqli_connect_error());
}

// Select database
if (!mysqli_select_db($con, $db)) {
    die("Database '$db' not found. Please run the setup.sql file first.");
}

// Optional: Set charset to UTF-8
mysqli_set_charset($con, "utf8");

// For debugging (remove in production)
// echo "<!-- Connected to database: $db -->";
?>