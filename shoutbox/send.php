<?php
require_once("connection.php");

if (isset($_POST['shout']) && trim($_POST['shout']) != "") {
    $shout_text = mysqli_real_escape_string($link, trim($_POST['shout']));
    
    $query = "INSERT INTO shouts (shout_text, shout_date) 
              VALUES ('$shout_text', NOW())";
    
    $result = mysqli_query($link, $query);
    
    if (!$result) {
        die("Error: " . mysqli_error($link));
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="2;url=index.php">
    <title>Redirecting... - ShoutBox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        
        .redirect-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        h2 {
            color: #333;
            margin-bottom: 15px;
        }
        
        p {
            color: #666;
            margin-bottom: 10px;
        }
        
        .success {
            color: #28a745;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="redirect-container">
        <div class="spinner"></div>
        <?php if (isset($_POST['shout']) && trim($_POST['shout']) != ""): ?>
            <div class="success">✓ Shout posted successfully!</div>
        <?php else: ?>
            <div style="color: #dc3545;">⚠️ Message cannot be empty!</div>
        <?php endif; ?>
        <h2>Redirecting...</h2>
        <p>You will be redirected back to ShoutBox in 2 seconds.</p>
        <p>If not redirected, <a href="index.php">click here</a>.</p>
    </div>
</body>
</html>