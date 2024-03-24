<?php
require_once './login_check.php';
require_once './navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maintenance_fault = $_POST['maintenance-fault'];
    $maintenance_repair = $_POST['maintenance-repair'];
    $repair_shop = $_POST['repair-shop'];
    $repair_desc = $_POST['repair-desc'];
    $maintenance_amt = $_POST['maintenance-amt'];

    $companyId = $_SESSION['companyId'];
    $subCompanyId = $_SESSION['subCompanyId'];
    $driverId = $_SESSION['driverId'];

    $target_dir = "../Admin/maintenance bill/"; // Directory where the files will be uploaded

    //<=========Drive Image Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_1 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["billUpload"]["name"]);
    $target_file = "maintenance bill/" . $current_date_time . "_" . $random_string . "_" . basename($_FILES["billUpload"]["name"]);
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
            $stmt = $conn->prepare("INSERT INTO `maintenance_report` (`company_id`, `sub_company_id`, `driver_id`, `maintenance_fault`, `maintenance_repair`, `repair_shop`, `repair_desc`, `maintenance_amt`, `maintenance_bill`) VALUES (:companyId, :subCompanyId, :driverId, :maintenance_fault, :maintenance_repair, :repair_shop, :repair_desc, :maintenance_amt, :bill)");

            $stmt->bindParam(':companyId', $companyId);
            $stmt->bindParam(':subCompanyId', $subCompanyId);
            $stmt->bindParam(':driverId', $driverId);
            $stmt->bindParam(':maintenance_fault', $maintenance_fault);
            $stmt->bindParam(':maintenance_repair', $maintenance_repair);
            $stmt->bindParam(':repair_shop', $repair_shop);
            $stmt->bindParam(':repair_desc', $repair_desc);
            $stmt->bindParam(':maintenance_amt', $maintenance_amt);
            $stmt->bindParam(':bill', $target_file);

            $stmt->execute();
            echo '
            <script>
                Swal.fire({
                    title: "Success",
                    text: "Maintenance details have been successfully uploaded.",
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
                            window.location.href = "maintenance.php";
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
                        window.location.href = "maintenance.php";
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
                        window.location.href = "maintenance.php";
                    }
                });
            </script>
        ';
}