
<?php
include 'db.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $carplate_num = $_POST['carplate_num'];

    $stmt = $conn->prepare("INSERT INTO users (name, phone_num, email, password, carplate_num) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone_num, $email, $password, $carplate_num);

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Driver</title>

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
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #222a51;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
            border: 1px solid #e1eeef;
        }

        .title {
            text-align: center;
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #e1eeef;
            border-radius: 6px;
            background-color: #e2f6ff;
            color: #222a51;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus {
            border: 2px solid #89c2ff;
            background-color: #ffffff;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            gap: 12px;
        }

        .btn {
            padding: 11px 20px;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .btn-save {
            background-color: rgb(233, 243, 255);
            color: #222a51;
        }

        .btn-save:hover {
            background-color: #89c2ff;
        }

        .btn-back {
            background-color: #e2f6ff;
            color: #222a51;
        }

        .btn-back:hover {
            background-color: #89c2ff;
        }

    </style>
</head>

<body>

    <div class="container">

        <h2 class="title">Add Driver</h2>

        <form method="post">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter driver name" required>
            </div>

            <div class="form-group">
                <label for="phone_num">Phone Number</label>
                <input type="text" id="phone_num" name="phone_num" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="carplate_num">Car Plate Number</label>
                <input type="text" id="carplate_num" name="carplate_num" placeholder="Enter car plate number" required>
            </div>

            <div class="button-group">

                <a href="index.php" class="btn btn-back">
                    Back
                </a>

                <button type="submit" name="save" class="btn btn-save">
                    Save Driver
                </button>

            </div>

        </form>

    </div>

</body>
</html>