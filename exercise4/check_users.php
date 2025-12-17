<?php
$con = mysqli_connect("localhost", "root", "", "lab6a");

echo "<h2>Users in Database</h2>";

$result = mysqli_query($con, "SELECT * FROM users");
$count = mysqli_num_rows($result);

if ($count > 0) {
    echo "<p style='color:green;'>✓ Found $count user(s)</p>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password (MD5)</th><th>Date</th></tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['trn_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color:red;'>✗ No users found in database</p>";
    echo "<p><a href='registration.php'>Register a user first</a></p>";
}

mysqli_close($con);
?>