<?php
require_once './login_check.php';
require_once './navbar.php';

// print_r($_SESSION);
$view = "";
$companyId = $_SESSION['companyId'];
$driverId = $_SESSION['driverId'];
$subCompanyId = $_SESSION['subCompanyId'];
$currentDate = date('Y-m-d');
$flag = 0;

$stmt = $conn->prepare("SELECT * FROM `driver_daily_report` WHERE `company_id` = :companId AND `sub_company_id` = :subCompanyId AND `driver_id` = :driverId AND `check_in_date` = :currentDate AND `check_out_date` IS NULL AND `check_out_time` IS NULL AND `check_out_km` IS NULL AND `flag` = :flag ORDER BY `daily_report_id` DESC LIMIT 1");

$stmt->bindParam(':companId', $companyId);
$stmt->bindParam(':subCompanyId', $subCompanyId);
$stmt->bindParam(':driverId', $driverId);
$stmt->bindParam(':currentDate', $currentDate);
$stmt->bindParam('flag', $flag);

$stmt->execute();

$rows = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($rows)) {
    // $stmt2 = $conn->prepare("SELECT * FROM `driver_daily_report` WHERE `company_id` = :companId AND `sub_company_id` = :subCompanyId AND `driver_id` = :driverId AND `check_in_date` = :currentDate AND `flag` = :flag ORDER BY `daily_report_id` DESC LIMIT 1");

    // $stmt2->bindParam(':companId', $companyId);
    // $stmt2->bindParam(':subCompanyId', $subCompanyId);
    // $stmt2->bindParam(':driverId', $driverId);
    // $stmt2->bindParam(':currentDate', $currentDate);
    // $stmt2->bindParam('flag', $flag);

    // $stmt2->execute();

    // $rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    // if (empty($rows2)) {
    //     $view = "CHECK IN";
    // } else {
    //     $view = "TODAY WORK DONE";
    // }
    $view = "CHECK IN";
} else {
    $view = "CHECK OUT";
}
?>

<link rel="stylesheet" href="./css/home.css">
<?php

if ($view == "CHECK IN") {
    ?>
    <div class="wrapper center-div">
        <form id="check-in" class="car centered">
            <div class="container box-container w3-animate-bottom">
                <div class="row img-div">
                    <img src="./image/gas.png" alt="Odometer" class="odometer">
                </div>
                <div class="row">
                    <div class="text">
                        <p class="para">Hello, <span>
                                <?= $_SESSION['fullname'] ?>
                            </span>, please provide the odometer reading.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="number" id="checkin-km" name="input" class="input-field" placeholder="KM in Car"
                            oninput="validateCharInput(this)" required>
                        <span class="error-message" id="username-error"></span>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <button class="button-1" id="submit" name="btn">Check In</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
} else if ($view == "CHECK OUT") {
    ?>
        <div class="wrapper center-div">
            <form id="check-out" class="car centered-div">
                <div class="container box-container w3-animate-bottom">
                    <div class="row img-div">
                        <img src="./image/speedometer.png" alt="Odometer" class="odometer">
                    </div>
                    <div class="row">
                        <div class="text">
                            <p class="para">Hello, <span>
                                <?= $_SESSION['fullname'] ?>
                                </span>, please provide the odometer reading.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="number" id="checkout-km" name="input" class="input-field" placeholder="KM in Car"
                                required>
                            <span class="error-message" id="username-error"></span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <button class="button-1" id="submit" name="btn">Check OUT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            // Check Out Script
            $(document).ready(function () {
                $('#check-out').on('submit', function (event) {
                    event.preventDefault();
                    let checkOutKm = $('#checkout-km').val();
                    let checkInKm = <?= $rows['check_in_km'] ?>;
                    if (checkOutKm > checkInKm) {
                        let totalKM = checkOutKm - checkInKm;
                        var formData = {
                            checkOutKm: checkOutKm,
                            checkInKm: checkInKm
                        }

                        $.ajax({
                            type: 'POST',
                            url: 'check_out.php',
                            data: formData,
                            dataType: 'json',
                            success: function (response) {
                                console.log(response);
                                if (response.success) {
                                    document.getElementById('check-out').reset();
                                    Swal.fire({
                                        title: 'Great Work! Total Kilometers: <b>' + totalKM + '</b>',
                                        text: "It's family time. Go and enjoy it.",
                                        icon: 'success',
                                        timer: 6000, // Automatically close after 2 seconds
                                        timerProgressBar: true,
                                    }).then((result) => {
                                        window.location.href = 'home.php';
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Error",
                                        text: response.message,
                                        icon: "error"
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire({
                                    title: "Error",
                                    text: "Something went wrong. Please try again.",
                                    icon: "error"
                                });
                            }
                        })
                    }else{
                        Swal.fire({
                            title: "Alert",
                            text: "Please enter the correct Reading",
                            icon: "warning",
                            timer: 6000,
                            timerProgressBar: true
                        });
                    }
                })
            })

            $(document).ready(function () {
                const allowedChars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];  //These are the only inputs for the checkout kilometer

                $('#checkout-km').on('input', function () {
                    let inputVal = $(this).val();
                    let filteredVal = inputVal.split('').filter(char => allowedChars.includes(char)).join('');
                    $(this).val(filteredVal);
                });
            });

        </script>
        <!-- <?php
} else if ($view == "TODAY WORK DONE") {
    ?>
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
            <div class="work-done">
                <p>Today's work is done. See you tomorrow! ☺</p>
            </div>
            <dotlottie-player src="https://lottie.host/215ec661-b755-4a4f-9203-887359e6efc8/VwAZl3RRLr.json"
                background="transparent" speed="1" style="width: 100vw; height: 100vh;" loop autoplay></dotlottie-player>
    <?php
}

?> -->
<script>
    // Check In Script
    $(document).ready(function () {
        $('#check-in').on('submit', function (event) {
            event.preventDefault();
            let checkInKm = $('#checkin-km').val();

            var formData = {
                checkInKm: checkInKm
            }

            $.ajax({
                type: 'POST',
                url: 'check_in.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        document.getElementById('check-in').reset();
                        Swal.fire({
                            title: 'Happy Journey ☺',
                            text: "It's great to see you again.",
                            icon: 'success',
                            timer: 5000, // Automatically close after 2 seconds
                            timerProgressBar: true,
                        }).then((result) => {
                            window.location.href = 'home.php';
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: "Error",
                        text: "Something went wrong. Please try again.",
                        icon: "error"
                    });
                }
            })
        })
    })

    const allowedChars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']; //These are the only inputs for the Checkin kilometer

    function validateCharInput(input) {
        // Filter out characters that are not in the allowedChars array
        input.value = input.value.split('').filter(char => allowedChars.includes(char)).join('');
    }

</script>

<?php
require_once './footer.php';
?>