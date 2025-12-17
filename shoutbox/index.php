<html>
<head>
    <title>ShoutBox - Lab 6a</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2em;
            margin-bottom: 5px;
        }
        
        .shout-form {
            padding: 20px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        
        textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            resize: vertical;
            min-height: 100px;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .shouts-container {
            padding: 20px;
            max-height: 500px;
            overflow-y: auto;
        }
        
        .shout-item {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            animation: fadeIn 0.5s ease;
        }
        
        .shout-text {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            line-height: 1.5;
        }
        
        .shout-date {
            font-size: 12px;
            color: #6c757d;
            text-align: right;
        }
        
        .no-shouts {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 10px;
            color: #667eea;
            text-decoration: none;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📢 ShoutBox</h1>
            <p>Share your thoughts with everyone!</p>
        </div>
        
        <div class="shout-form">
            <form action="send.php" method="post">
                <textarea name="shout" placeholder="Type your message here... (Max 300 characters)" 
                          maxlength="300" required></textarea>
                <div style="text-align: right;">
                    <input type="submit" value="Post Shout!" class="submit-btn">
                </div>
            </form>
        </div>
        
        <div class="shouts-container">
            <h3 style="margin-bottom: 15px; color: #495057;">Recent Shouts</h3>
            
            <?php
            require_once("connection.php");
            
            $result = mysqli_query($link, "SELECT * FROM shouts ORDER BY shout_date DESC")
                or die(mysqli_error($link));
            
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
                    $shout_text = htmlspecialchars($data['shout_text']);
                    $shout_date = date('M j, Y g:i A', strtotime($data['shout_date']));
                    
                    echo "<div class='shout-item'>";
                    echo "<div class='shout-text'>" . nl2br($shout_text) . "</div>";
                    echo "<div class='shout-date'>Posted on: " . $shout_date . "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='no-shouts'>";
                echo "<p>No shouts yet. Be the first to post!</p>";
                echo "</div>";
            }
            
            mysqli_close($link);
            ?>
        </div>
        
        <div style="padding: 15px 20px; background: #f8f9fa; border-top: 1px solid #dee2e6;">
            <a href="../index.php" class="back-link">← Back to Lab 6a Home</a>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.shouts-container');
            container.scrollTop = 0;
            
            setInterval(function() {
                location.reload();
            }, 30000);
        });
    </script>
</body>
</html>