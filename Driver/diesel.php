<?php
include "./navbar.php";
require_once './login_check.php';
// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Admin/css/main.css">
    <link rel="stylesheet" href="../Driver/css/diesel.css">
    <title>Diesel</title>

</head>

<body>
    <div class="container mt-5">

        <div class="center">

            <form method="post" class="form-cent" enctype="multipart/form-data">

                <div class="text">
                    <h5>Diesel Information Form</h5>
                </div>

                <div class="input-group">
                    <input type="number" id="dielit" name="diesel-lit" class="input-field" placeholder="Total Liters" required>
                    <span class="error-message" id="dielit-error"></span>
                </div>


                <div class="input-group">
                    <input type="number" id="dieamt" name="diesel-amt" class="input-field" placeholder="Total Amount" required>
                    <span class="error-message" id="dieamt-error"></span>
                </div>


                <div class="form-group align">
                    <label for="dieselImage" class="bil-tex">Bill:</label>
                    <input type="file" class="bill" id="bilimg" name="bills" accept="image/*" required placeholder="Bill Image">
                </div>

                <div class="btn">
                    <button type="submit" class="btn button-1">Submit</button>
                </div>
            </form>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>

</html>