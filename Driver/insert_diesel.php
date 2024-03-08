<?php
require_once './login_check.php';
require_once './navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dieselLiter = $_POST['diesel-liter'];
    $dieselAmt = $_POST['diesel-amt'];

    $companyId = $_SESSION['companyId'];
    $subCompanyId = $_SESSION['subCompanyId'];
    $driverId = $_SESSION['driverId'];

    $target_dir = "../Admin/diesel bill/"; // Directory where the files will be uploaded

    //<=========Drive Image Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_1 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["billUpload"]["name"]);
    $target_file = "diesel bill/" . $current_date_time . "_" . $random_string . "_" . basename($_FILES["billUpload"]["name"]);
    $uploadOk1 = 1;
    $imageFileType1 = strtolower(pathinfo($target_file_1, PATHINFO_EXTENSION));

    // Allow certain file formats (in this case, only PDF and images)
    if ($imageFileType1 != "pdf" && !in_array($imageFileType1, array("jpg", "png", "jpeg", "gif"))) {
        // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk1 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk1 == 1) {
        //Here i leave one 😅BUG😅
        move_uploaded_file($_FILES["billUpload"]["tmp_name"], $target_file_1); //this function return true or false
        try {
            $stmt = $conn->prepare("INSERT INTO `diesel_report` (`company_id`, `sub_company_id`, `driver_id`, `diesel_liters`, `diesel_amount`, `diesel_bill`) VALUES (:companyId, :subCompanyId, :driverId, :dieselLiter, :dieselAmt, :bill)");

            $stmt->bindParam(':companyId', $companyId);
            $stmt->bindParam(':subCompanyId', $subCompanyId);
            $stmt->bindParam(':driverId', $driverId);
            $stmt->bindParam(':dieselLiter', $dieselLiter);
            $stmt->bindParam(':dieselAmt', $dieselAmt);
            $stmt->bindParam(':bill', $target_file);

            $stmt->execute();
            echo '
            <script>
                Swal.fire({
                    title: "Success",
                    text: "Diesel details have been successfully uploaded.",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "home.php";
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
                            window.location.href = "diesel.php";
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
                    text: "Something went wrong! Please try again.",
                    icon: "error"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "diesel.php";
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
                        window.location.href = "diesel.php";
                    }
                });
            </script>
        ';
}