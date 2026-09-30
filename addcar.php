
<?php
include 'db.php';

if(isset($_POST['save'])){

    $car_type = $_POST['car_type'];
    $parkinghour = $_POST['parkinghour'];
    $parkingfee = $_POST['parkingfee'];

    $conn->query("INSERT INTO parkingfees (car_type, parkinghour, parkingfee) VALUES ('$car_type', '$parkinghour', '$parkingfee')");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Parking Fee</title>

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

        <h2 class="title">Add Parking Fee</h2>

        <form method="post">

            <div class="form-group">
                <label for="car_type">Car Type</label>
                <input type="text" id="car_type" name="car_type" placeholder="Enter car type" required>
            </div>

            <div class="form-group">
                <label for="parkinghour">Hours</label>
                <input type="number" id="parkinghour" name="parkinghour" placeholder="Enter parking hours" min="1" required>
            </div>

            <div class="form-group">
                <label for="parkingfee">Parking Fee (RM)</label>
                <input type="text" id="parkingfee" name="parkingfee" placeholder="Enter parking fee" required>
            </div>

            <div class="button-group">

                <a href="index.php" class="btn btn-back">
                    Back
                </a>

                <button type="submit" name="save" class="btn btn-save">
                    Save Parking Fee
                </button>

            </div>

        </form>

    </div>

</body>
</html>