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
    <title>Home</title>
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <div class="wrapper">
        <form id="car" class="car" action="checkout.php" method="post">

            <div class="text">
                <?php print_r($_SESSION); ?>
                <p class="para">Check On the Odometer Reading:</p>
            </div>    

            <div class="input-group">
                <input type="number" id="skm" name="input" class="input-field" placeholder="KM in Car" required>
                <span class="error-message" id="username-error"></span>
            </div>


            <div class="input-group">
                <button class="button-1" id="submit" name="btn" onclick="submit()">Check In</button>
            </div>
        </form>
    </div>
</body>

<script src="../Driver/js/checks.js"></script>

</html>