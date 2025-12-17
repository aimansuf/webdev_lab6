<?php require('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration - Lab 6a</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="form">
        <h1>Registration</h1>
        
        <?php
        if (isset($_REQUEST['username'])) {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username);
            
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
            
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            
            $trn_date = date("Y-m-d H:i:s");
            
            $hashed_password = md5($password);
            
            $query = "INSERT INTO `users` (username, password, email, trn_date)
                     VALUES ('$username', '$hashed_password', '$email', '$trn_date')";
            
            $result = mysqli_query($con, $query);
            
            if ($result) {
                echo "<div class='success'>
                        <h3>You are registered successfully.</h3>
                        <br/>Click here to <a href='login.php'>Login</a>
                      </div>";
            } else {
                echo "<div class='error'>Registration failed. Please try again.</div>";
            }
        } else {
        ?>
        
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
        
        <p>Already have an account? <a href='login.php'>Login Here</a></p>
        
        <?php } ?>
    </div>
</body>
</html>