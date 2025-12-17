<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<div style='color: red; padding: 20px; background: #f8d7da; border-radius: 5px;'>
            <h3>Connection Failed!</h3>
            <p>Error: " . mysqli_connect_error() . "</p>
            <p>Please make sure:</p>
            <ul>
                <li>XAMPP/WAMP server is running</li>
                <li>Database 'mydb' exists</li>
                <li>Table 'persons' is created</li>
            </ul>
         </div>");
}
?>