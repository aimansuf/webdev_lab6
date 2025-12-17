<?php
include "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Records - Lab 6a</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.2em;
            margin-bottom: 10px;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 1.1em;
        }
        
        .nav {
            background: #f8f9fa;
            padding: 15px 25px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .data-container {
            padding: 25px;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        thead {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
        }
        
        tbody tr {
            border-bottom: 1px solid #dee2e6;
            transition: background-color 0.2s ease;
        }
        
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        td {
            padding: 15px;
            color: #333;
            font-size: 14px;
        }
        
        .person-id {
            font-weight: bold;
            color: #007bff;
        }
        
        .person-name {
            color: #28a745;
            font-weight: 600;
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }
        
        .stats {
            background: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
        
        .stats span {
            font-weight: bold;
            color: #28a745;
        }
        
        .footer {
            background: #f8f9fa;
            padding: 15px 25px;
            border-top: 1px solid #dee2e6;
            text-align: center;
            color: #6c757d;
        }
        
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                text-align: center;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Person Records Database</h1>
            <p>Displaying data from MySQL database table</p>
        </div>
        
        <div class="nav">
            <div>
                <a href="add_person.php" class="btn btn-success">➕ Add New Person</a>
                <a href="../index.php" class="btn btn-secondary">← Back to Lab</a>
            </div>
            <div>
                <a href="db_connect.php" class="btn btn-primary">Test Connection</a>
            </div>
        </div>
        
        <div class="data-container">
            <h3 style="margin-bottom: 20px; color: #495057;">Person Records List</h3>
            
            <?php
            $sql = "SELECT * FROM persons";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Address</th>";
                echo "<th>City</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='person-id'>" . $row["ID"] . "</td>";
                    echo "<td class='person-name'>" . htmlspecialchars($row["FirstName"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["LastName"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Address"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["City"]) . "</td>";
                    echo "<td>
                            <a href='edit_person.php?id=" . $row["ID"] . "' class='btn' style='background: #ffc107; padding: 5px 10px; margin-right: 5px;'>Edit</a>
                            <a href='delete_person.php?id=" . $row["ID"] . "' class='btn' style='background: #dc3545; padding: 5px 10px;' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                
                echo "</tbody>";
                echo "</table>";
                
                $count_query = "SELECT COUNT(*) as total FROM persons";
                $count_result = mysqli_query($conn, $count_query);
                $count_row = mysqli_fetch_assoc($count_result);
                
                echo "<div class='stats'>";
                echo "Total Records: <span>" . $count_row['total'] . "</span> persons found in database.";
                echo "</div>";
            } else {
                echo "<div class='no-data'>";
                echo "<h3>No records found</h3>";
                echo "<p>The 'persons' table is empty.</p>";
                echo "<a href='add_person.php' class='btn btn-success' style='margin-top: 10px;'>Add First Person</a>";
                echo "</div>";
            }
            
            mysqli_close($conn);
            ?>
        </div>
        
        <div class="footer">
            <p>Database: <strong>mydb</strong> | Table: <strong>persons</strong></p>
            <p>Showing all person records from the database</p>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                if (index % 2 === 0) {
                    row.style.backgroundColor = '#f8f9fa';
                }
            });
        });
    </script>
</body>
</html>