<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require('db.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    
    echo "<!-- Debug: Username: $username -->";
    echo "<!-- Debug: Password (raw): " . $_POST['password'] . " -->";
    echo "<!-- Debug: Password (md5): " . md5($password) . " -->";
    
    $query = "SELECT * FROM `users` WHERE username='$username' 
              AND password='" . md5($password) . "'";
    
    $result = mysqli_query($con, $query);
    
    if (!$result) {
        $error = "Database error: " . mysqli_error($con);
    } else {
        $rows = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Username/password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Lab 6a</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="form">
        <h1>Log In</h1>
        
        <?php if (!empty($error)): ?>
            <div style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <strong>Error:</strong> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required 
                   value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            <input type="password" name="password" placeholder="Password" required>
            <input name="submit" type="submit" value="Login">
        </form>
        
        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
        <p><a href='../index.php'>← Back to Lab 6a Home</a></p>
    </div>
</body>
</html>