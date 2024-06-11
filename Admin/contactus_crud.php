<?php

require_once './login_check.php';
require_once './navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyId = $_SESSION['companyId'];
    $help_name = $_POST['help-name'];
    $help_phone = $_POST['help-phone'];
    $help_message = $_POST['help-message'];

    if ($help_name != "" && $help_phone != "" && $help_message != "") {
        try {
            $stmt = $conn->prepare("INSERT INTO `help` (`company_id`, `help_name`, `help_phone`, `help_message`) VALUES (:companyId, :help_name, :help_phone, :help_message)");

            $stmt->bindParam(':companyId', $companyId);
            $stmt->bindParam(':help_name', $help_name);
            $stmt->bindParam(':help_phone', $help_phone);
            $stmt->bindParam(':help_message', $help_message);


            $stmt->execute();

            echo '
            <script>
                Swal.fire({
                    title: "Success",
                    text: "Our Supporting team will Call you as soon as possible",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "contactus.php";
                    }
                });
            </script>
        ';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            echo '
                <script>
                    Swal.fire({
                        title: "Error",
                        text: "Something went wrong! Please try again.",
                        icon: "error"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "contactus.php";
                        }
                    });
                </script>
            ';
        }
    }else {
        echo '
                <script>
                    Swal.fire({
                        title: "Alert",
                        text: "Fill Out all fields.",
                        icon: "warning"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "contactus.php";
                        }
                    });
                </script>
            ';
    }
    


} else {
    echo '
            <script>
                Swal.fire({
                    title: "Error",
                    text: "Invalid request! Please try again.",
                    icon: "error"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "contactus.php";
                    }
                });
            </script>
        ';
}

