<?php

require_once './login_check.php';
require_once './navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyId = $_SESSION['companyId'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $vehicleNo = $_POST['vehicle-no'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $pincode = $_POST['pincode'];
    $aadharNo = $_POST['aadhar-no'];
    $panNo = $_POST['pan-no'];
    $drivingLicenceNo = $_POST['driving-licence-no'];
    $licenceExpiry = $_POST['licence-expiry'];
    $insuranceNo = $_POST['insurance-no'];
    $insuranceExpiry = $_POST['insurance-expiry'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $target_dir = "driver document/"; // Directory where the files will be uploaded

    //<=========Drive Image Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_1 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["imageUpload"]["name"]);

    $uploadOk1 = 1;
    $imageFileType1 = strtolower(pathinfo($target_file_1, PATHINFO_EXTENSION));

    // Allow certain file formats (in this case, only PDF and images)
    if ($imageFileType1 != "pdf" && !in_array($imageFileType1, array("jpg", "png", "jpeg", "gif"))) {
        // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk1 = 0;
    }

    //<=========Drive Aadhar Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_2 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["aadhar-card"]["name"]);

    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file_2, PATHINFO_EXTENSION));

    // Allow certain file formats (in this case, only PDF and images)
    if ($imageFileType2 != "pdf" && !in_array($imageFileType2, array("jpg", "png", "jpeg", "gif"))) {
        // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk2 = 0;
    }

    //<=========Drive PAN Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_3 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["pan-card"]["name"]);

    $uploadOk3 = 1;
    $imageFileType3 = strtolower(pathinfo($target_file_3, PATHINFO_EXTENSION));

    // Allow certain file formats (in this case, only PDF and images)
    if ($imageFileType3 != "pdf" && !in_array($imageFileType3, array("jpg", "png", "jpeg", "gif"))) {
        // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk3 = 0;
    }

    //<=========Drive Driving Licence Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_4 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["driving-licence"]["name"]);

    $uploadOk4 = 1;
    $imageFileType4 = strtolower(pathinfo($target_file_4, PATHINFO_EXTENSION));

    // Allow certain file formats (in this case, only PDF and images)
    if ($imageFileType4 != "pdf" && !in_array($imageFileType4, array("jpg", "png", "jpeg", "gif"))) {
        // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk4 = 0;
    }

    //<=========Drive insurance Upload=========>
    $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    $current_date_time = date("YmdHis"); // Current date and time
    $target_file_5 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["insurance"]["name"]);

    $uploadOk5 = 1;
    $imageFileType5 = strtolower(pathinfo($target_file_5, PATHINFO_EXTENSION));

    // Allow certain file formats (in this case, only PDF and images)
    if ($imageFileType5 != "pdf" && !in_array($imageFileType5, array("jpg", "png", "jpeg", "gif"))) {
        // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk5 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk1 == 1 && $uploadOk2 == 1 && $uploadOk3 == 1 && $uploadOk4 == 1 && $uploadOk5 == 1) {
        //Here i leave one 😅BUG😅
        move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file_1); //this function return true or false
        move_uploaded_file($_FILES["aadhar-card"]["tmp_name"], $target_file_2);
        move_uploaded_file($_FILES["pan-card"]["tmp_name"], $target_file_3);
        move_uploaded_file($_FILES["driving-licence"]["tmp_name"], $target_file_4);
        move_uploaded_file($_FILES["insurance"]["tmp_name"], $target_file_5);

        try {
            $stmt = $conn->prepare("INSERT INTO `driver_details` (`company_id`, `sub_company_id`, `vehicle_no`, `fullname`, `mail`, `mobile`, `address`, `state`, `district`, `pincode`, `profile_image`, `aadhar_no`, `aadhar_copy`, `pan_no`, `pan_copy`, `license_no`, `licence_expiry`, `license_copy`, `insurance_no`, `insurance_expiry`, `insurance_copy`, `username`, `password`) VALUES (:companyId, :company, :vehicleNo, :fullname, :email, :mobile, :address, :state, :district, :pincode, :target_file_1, :aadharNo, :target_file_2, :panNo, :target_file_3, :drivingLicenceNo, :licenceExpiry, :target_file_4, :insuranceNo, :insuranceExpiry, :target_file_5, :username, :hashPassword)");

            $stmt->bindParam(':companyId', $companyId);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':vehicleNo', $vehicleNo);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':district', $district);
            $stmt->bindParam(':pincode', $pincode);
            $stmt->bindParam(':target_file_1', $target_file_1);
            $stmt->bindParam(':aadharNo', $aadharNo);
            $stmt->bindParam(':target_file_2', $target_file_2);
            $stmt->bindParam(':panNo', $panNo);
            $stmt->bindParam(':target_file_3', $target_file_3);
            $stmt->bindParam(':drivingLicenceNo', $drivingLicenceNo);
            $stmt->bindParam(':licenceExpiry', $licenceExpiry);
            $stmt->bindParam(':target_file_4', $target_file_4);
            $stmt->bindParam(':insuranceNo', $insuranceNo);
            $stmt->bindParam(':insuranceExpiry', $insuranceExpiry);
            $stmt->bindParam(':target_file_5', $target_file_5);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':hashPassword', $hashPassword);

            $stmt->execute();
            echo '
            <script>
                Swal.fire({
                    title: "Success",
                    text: "Driver Created Successfully.",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "register_driver.php";
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
                            window.location.href = "register_driver.php";
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
                        window.location.href = "register_driver.php";
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
                        window.location.href = "register_driver.php";
                    }
                });
            </script>
        ';
}

