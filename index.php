<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6a - Client and Server-Side Scripting</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .header p {
            color: #666;
            font-size: 1.1em;
        }
        
        .student-info {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .student-info h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        
        .exercises {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .exercise-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .exercise-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .exercise-card h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.4em;
        }
        
        .exercise-card p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            text-decoration: none;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #218838 100%);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }
        
        .features {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .features h3 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        
        .features ul {
            list-style-type: none;
            padding-left: 0;
        }
        
        .features li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }
        
        .features li:last-child {
            border-bottom: none;
        }
        
        .features li:before {
            content: "✓";
            color: #28a745;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .footer {
            text-align: center;
            color: white;
            padding: 20px;
            margin-top: 30px;
        }
        
        .footer a {
            color: white;
            text-decoration: underline;
        }
        
        .instructions {
            background: #e8f4fc;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #3498db;
        }
        
        .instructions h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .database-info {
            background: #f0f8ff;
            padding: 15px;
            border-radius: 8px;
            font-family: monospace;
            margin: 10px 0;
            font-size: 14px;
        }
        
        @media (max-width: 768px) {
            .exercises {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Lab 6a - Client and Server-Side Scripting with Database</h1>
            <p>PHP Database Integration Exercises</p>
        </div>
        
        <div class="student-info">
            <h2>👤 Student Information</h2>
            <p><strong>Name:</strong> Muhammad Aiman Bin Sufian</p>
            <p><strong>Matric Number:</strong> CI230136</p>
            <p><strong>Course:</strong> Web Development</p>
            <p><strong>Date:</strong> <?php echo date('F j, Y'); ?></p>
        </div>
        
        <div class="exercises">
            <!-- Exercise 2: ShoutBox -->
            <div class="exercise-card">
                <h3>📢 Exercise 2: ShoutBox Application</h3>
                <p>A simple message board system where users can post shouts (messages) that are stored in a MySQL database and displayed in reverse chronological order.</p>
                <div class="database-info">
                    <strong>Database Table:</strong> shouts<br>
                    <strong>Columns:</strong> shout_id, shout_text, shout_date
                </div>
                <a href="shoutbox/" class="btn">Open ShoutBox</a>
            </div>
            
            <!-- Exercise 3: Data Display -->
            <div class="exercise-card">
                <h3>📊 Exercise 3: Data Display from Database</h3>
                <p>Display records from a "persons" table with options to add new records. Demonstrates basic CRUD operations with a clean interface.</p>
                <div class="database-info">
                    <strong>Database Table:</strong> persons<br>
                    <strong>Columns:</strong> ID, LastName, FirstName, Address, City
                </div>
                <a href="exercise3/fetch_data.php" class="btn">View Data Display</a>
            </div>
            
            <!-- Exercise 4: User Registration & Login -->
            <div class="exercise-card">
                <h3>🔐 Exercise 4: User Registration & Login System</h3>
                <p>Complete user authentication system with registration, login, session management, and a secured dashboard area.</p>
                <div class="database-info">
                    <strong>Database Table:</strong> users<br>
                    <strong>Columns:</strong> id, username, email, password, trn_date
                </div>
                <a href="exercise4/registration.php" class="btn btn-success">Register New User</a>
                <a href="exercise4/login.php" class="btn">Login</a>
            </div>
        </div>
        
        <div class="features">
            <h3>🎯 Lab Features</h3>
            <ul>
                <li>MySQL Database Integration</li>
                <li>PHP Session Management</li>
                <li>User Authentication System</li>
                <li>CRUD Operations (Create, Read, Update)</li>
                <li>Responsive Web Design</li>
                <li>Secure Password Hashing (MD5 as per lab requirement)</li>
                <li>Form Validation</li>
                <li>Database Connection Error Handling</li>
            </ul>
        </div>
        
        <div class="footer">
            <p>© <?php echo date('Y'); ?> Lab 6a - Web Development</p>
            <p>Access via: <strong>http://localhost:8080/lab_6a/</strong></p>
            <p>Matric: CI230136 | Name: Muhammad Aiman Bin Sufian</p>
        </div>
    </div>
    
    <script>
        // Simple JavaScript for interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Add click tracking for exercises
            const links = document.querySelectorAll('.btn');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    console.log('Navigating to: ' + this.href);
                });
            });
            
            // Display current time
            const timeElement = document.createElement('p');
            timeElement.style.textAlign = 'center';
            timeElement.style.color = 'white';
            timeElement.style.marginTop = '10px';
            timeElement.innerHTML = 'Current Time: ' + new Date().toLocaleTimeString();
            document.querySelector('.footer').appendChild(timeElement);
            
            // Update time every minute
            setInterval(() => {
                timeElement.innerHTML = 'Current Time: ' + new Date().toLocaleTimeString();
            }, 60000);
        });
    </script>
</body>
</html>