<?php
require_once './login_check.php';
require_once './navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $h_name = $_POST['help-name'];
    $h_email = $_POST['help-email'];
    $h_phone = $_POST['help-phone'];
    $h_message = $_POST['help-message'];

    $companyId = $_SESSION['companyId'];
    $subCompanyId = $_SESSION['subCompanyId'];


    // $driverId = $_SESSION['driverId'];

    // $target_dir = "../Admin/fuel bill/"; // Directory where the files will be uploaded

    // //<=========Drive Image Upload=========>
    // $random_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5); // Generate a random string of length 5
    // $current_date_time = date("YmdHis"); // Current date and time
    // $target_file_1 = $target_dir . $current_date_time . "_" . $random_string . "_" . basename($_FILES["billUpload"]["name"]);
    // $target_file = "fuel bill/" . $current_date_time . "_" . $random_string . "_" . basename($_FILES["billUpload"]["name"]);
    // $uploadOk1 = 1;
    // $imageFileType1 = strtolower(pathinfo($target_file_1, PATHINFO_EXTENSION));

    // // Allow certain file formats (in this case, only PDF and images)
    // if ($imageFileType1 != "pdf" && !in_array($imageFileType1, array("jpg", "png", "jpeg", "gif"))) {
    //     // echo "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk1 = 0;
    // }

    // // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk1 == 1) {
    //     //Here i leave one 😅BUG😅
    //     move_uploaded_file($_FILES["billUpload"]["tmp_name"], $target_file_1); //this function return true or false
        try {
            $stmt = $conn->prepare("INSERT INTO `help` (`company_id`, `sub_company_id`, `help_name`, `help_email`, `help_phone`, `help_message`) VALUES (:companyId, :subCompanyId, :h_name, :h_email, :h_phone, :h_message)");

            $stmt->bindParam(':companyId', $companyId);
            $stmt->bindParam(':subCompanyId', $subCompanyId);
            $stmt->bindParam(':help_name', $h_name);
            $stmt->bindParam(':help_email', $h_email);
            $stmt->bindParam(':help_phone', $h_phone);
            $stmt->bindParam(':help_message', $h_message);

            $stmt->execute();
            print_r($stmt);
            echo '
            <script>
                Swal.fire({
                    title: "Success",
                    text: "The response for your request is on the way",
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
                            window.location.href = "help.php";
                        }
                    });
                </script>
            ';
        }

    // } else {
    //     echo '
    //         <script>
    //             Swal.fire({
    //                 title: "Error",
    //                 text: "Something went wrong! Please try again.",
    //                 icon: "error"
    //             }).then((result) => {
    //                 if (result.isConfirmed) {
    //                     window.location.href = "fuel.php";
    //                 }
    //             });
    //         </script>
    //     ';
    // }


} else {
    echo '
            <script>
                Swal.fire({
                    title: "Error",
                    text: "Invalid request! Please try again.",
                    icon: "error"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "help.php";
                    }
                });
            </script>
        ';
}