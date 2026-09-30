<?php include 'db.php'; ?>
<!--
  index.php — READ (the "R" in CRUD)
  Lists every driver from the database in a table.
  The line above runs db.php first, so $conn (our database
  connection) already exists and is ready to use here.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver List</title>
    <!-- FontAwesome for action icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url('https://transpark.my/wp-content/uploads/2019/12/TransPark-Site-1-1-1536x864.jpg');
            background-size: cover;
                }

        .container {
            max-width: 1050px;
            margin: 0 auto;
            background: #222a51;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
            border: 1px solid #e1eeef;
        }


        /* 2. Centered "Driver List" Title */
        .title {
            text-align: center;
            font-size: 28px;
            color: #ffffff; /* Dark Blue Text */
            margin-bottom: 20px;
        }

        /* 3. Top-Right "+ Add Driver" Button (from Storyboard) */
        .table-controls {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 12px;
        }

        .btn-add {
            background-color: rgb(233, 243, 255); /* Primary Light Blue Button */
            color: #222a51;
            padding: 9px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
            transition: all 0.2s ease-in-out;
        }

        .btn-add:hover {
            background-color: #0056b3; /* Darker Blue on Hover */
        }

        /* 4. Styled Table */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            background-color: #e2f6ff;
            border-radius: 3px;
            overflow: hidden; 
        }

        .styled-table thead tr {
            background-color: #132e4a;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th, 
        .styled-table td {
            padding: 12px 15px;
            border: 1px solid #e2f6ff;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #e2f6ff;
        }

        /* Alternating row colors for better reading */
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #e2f6ff
        }

        .styled-table tbody tr:hover {
            background-color: rgb(137, 194, 255); /* Hover effect */
        }

        /* 5. Actions Icons (Pencil & Trash Bin from Storyboard) */
        .action-icon {
            color: #007bff;
            margin-right: 12px;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.2s;
        }

        .action-icon.delete {
            color: #dc3545; /* Red trash icon */
        }

        .action-icon:hover {
            opacity: 0.75;
        }
    </style>
</head>
<body>
<br><br>
<div class="container">
    <!-- 2. Centered Page Title -->
    <h2 class="title">Driver List</h2>


    <!-- 4. Driver Table -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Password</th>
                <th>Car Plate Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Sends SQL command to database and fetches all users
            $result = $conn->query("SELECT * FROM users");

            // Loops through each record in the database
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['phone_num']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['carplate_num']."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."' class='action-icon' title='Edit'>
                            <i class='fa-solid fa-pen'></i>
                        </a>
                        <a href='delete.php?id=".$row['id']."' class='action-icon delete' title='Delete' onclick=\"return confirm('Are you sure you want to delete this driver?');\">
                            <i class='fa-solid fa-trash'></i>
                        </a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <!-- 3. Top-Right Add Button -->
    <div class="table-controls">
        <a href="add.php" class="btn-add">
            <i class="fa-solid fa-plus"></i> Add Driver
        </a>
    </div>
<br><br><br>
        <!-- 2. Centered Page Title -->
    <h2 class="title">Parking Fees</h2>
    <!-- 4. Driver Table -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hours</th>
                <th>Car Type</th> 
                <th>Parking Fee</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Sends SQL command to database and fetches all users
            $result = $conn->query("SELECT * FROM parkingfees");

            // Loops through each record in the database
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['parkinghour']."</td>
                    <td>".$row['car_type']."</td>
                    <td>".$row['parkingfee']."</td>
                    <td>
                        <a href='editcar.php?id=".$row['id']."' class='action-icon' title='Edit'>
                            <i class='fa-solid fa-pen'></i>
                        </a>
                        <a href='delete.php?id=".$row['id']."' class='action-icon delete' title='Delete' onclick=\"return confirm('Are you sure you want to delete this parking fee?');\">
                            <i class='fa-solid fa-trash'></i>
                        </a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
        <!-- 3. Top-Right Add Button -->
    <div class="table-controls">
        <a href="addcar.php" class="btn-add">
            <i class="fa-solid fa-plus"></i> Add Parking Fee
        </a>
    </div>
</div>

</body>
</html>