<?php include 'db.php';
// edit.php — UPDATE (the "U" in CRUD)
// Loads one driver's current details into a form, then saves the changes.

// $_GET is a built-in PHP array that holds values coming from the URL.
// The list page links here as edit.php?id=3 , so here $_GET['id'] would be 3.
$id = $_GET['id'];

// Fetch just that one driver. "WHERE id=$id" limits the result to the matching row.
$result = $conn->query("SELECT * FROM users WHERE id=$id");

// fetch_assoc() reads the single row we found into $row (values read by column name).
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Driver</title>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f0f8ff; /* Alice Blue Light Background */
            padding: 30px 15px;
        }

        .container {
            max-width: 550px;
            margin: 0 auto;
            background: #ffffff; /* White Container */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
            border: 1px solid #e1eeef;
        }

        /* Top Banner Section */
        .banner-container {
            width: 100%;
            height: 140px;
            background-color: #e6f2ff; /* Soft Light Blue Placeholder */
            border: 2px dashed #99c2ff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0056b3;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .banner-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Centered Page Title */
        .title {
            text-align: center;
            font-size: 26px;
            color: #004085; /* Dark Blue Text */
            margin-bottom: 25px;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #b8daff;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #fcfdfe;
        }

        .form-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.15);
            background-color: #ffffff;
        }

        /* Action Buttons */
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-submit {
            flex: 1;
            background-color: #007bff; /* Primary Light Blue Button */
            color: white;
            border: none;
            padding: 11px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            flex: 1;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 11px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Top Image Header Banner -->
    <div class="banner-container">
        <!-- Replace text with <img src="banner.jpg" alt="Header Image"> if needed -->
        Image
    </div>

    <!-- Centered Page Title -->
    <h2 class="title"><i class="fa-solid fa-user-pen"></i> Edit Driver</h2>

    <!-- Form -->
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="phone_num">Phone Number</label>
            <input type="text" id="phone_num" name="phone_num" value="<?php echo htmlspecialchars($row['phone_num']); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
        </div>

        <div class="form-group">
            <label for="carplate_num">Car Plate Number</label>
            <input type="text" id="carplate_num" name="carplate_num" value="<?php echo htmlspecialchars($row['carplate_num']); ?>" required>
        </div>

        <div class="button-group">
            <button type="submit" name="update" class="btn-submit">
                <i class="fa-solid fa-floppy-disk"></i> Update
            </button>
            <a href="index.php" class="btn-cancel">
                <i class="fa-solid fa-xmark"></i> Cancel
            </a>
        </div>
    </form>
</div>

</body>
</html>

<?php
// IF the Update button was clicked (its name is "update")...
if(isset($_POST['update'])){
    // ...read the new values the user typed.
    $name         = $_POST['name'];
    $phone_num    = $_POST['phone_num'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $carplate_num = $_POST['carplate_num'];

    // UPDATE ... SET ... WHERE id=$id changes the existing row — only the one with this id.
    $conn->query("UPDATE users SET name='$name', phone_num='$phone_num', email='$email', password='$password', carplate_num='$carplate_num' WHERE id=$id");

    // Redirect back to the list to see the updated user.
    echo "<script>window.location.href='index.php';</script>";
}
?>