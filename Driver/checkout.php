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
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/checkout.css">
    <!-- <link rel="stylesheet" href="../Admin/css/main.css"> -->
    <title>Home</title>
</head>

<body>
    <div class="wrapper">
        <form id="car" class="checkout">

            <div class="greet">
                <!-- <?php print_r($_SESSION); ?> -->
                <h4>Greetings, <?php echo $_SESSION['fullname']; ?></h4>
            </div>

            <div class="text">
                <p class="para">Click here to Check Out</p>
            </div>

            <div class="butbor">
                <div class="input-group">
                    <button class="button-1" id="submit2" name="btn">Check Out</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="../Driver/js/checks.js"></script>
<script>
    $(document).ready(function(){
        Swal.fire({
            title: 'Happy Journey ☺',
            text: "It's great to see you again.",
            icon: 'success',
            timer: 2000, // Automatically close after 2 seconds
            timerProgressBar: true,
        });
    });
</script>

</html>