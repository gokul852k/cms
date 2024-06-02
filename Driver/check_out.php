
<?php
    require_once './login_check.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $checkInKm = $_POST['checkInKm'];
        $checkOutKm = $_POST['checkOutKm'];
        $companyId = $_SESSION['companyId'];
        $subCompanyId = $_SESSION['subCompanyId'];
        $driverId = $_SESSION['driverId'];
        $currentDate = date('Y-m-d');

        $totalKM = $checkOutKm - $checkInKm;

        date_default_timezone_set('Asia/Kolkata');

        $currentTime = date('H:i:s');

        try {
            $stmt = $conn->prepare("UPDATE `driver_daily_report` SET `check_out_date`=:checkOutDate,`check_out_time`=:currentTime,`check_out_km`=:checkOutKm,`total_km`=:totalKM WHERE `company_id` = :companId AND `sub_company_id` = :subCompanyId AND `driver_id` = :driverId AND `check_in_date` = :currentDate AND `check_out_date` IS NULL AND `check_out_time` IS NULL AND `check_out_km` IS NULL ORDER BY `daily_report_id` DESC LIMIT 1");

            $stmt->bindParam(':checkOutDate', $currentDate);
            $stmt->bindParam(':currentTime', $currentTime);
            $stmt->bindParam(':checkOutKm', $checkOutKm);
            $stmt->bindParam(':totalKM', $totalKM);

            $stmt->bindParam(':companId', $companyId);
            $stmt->bindParam(':subCompanyId', $subCompanyId);
            $stmt->bindParam(':driverId', $driverId);
            $stmt->bindParam(':currentDate', $currentDate);

            $stmt->execute();
            $response = array('success' => true, 'message' => 'Check out Successfully.');
        } catch (PDOException $e) {
            // echo "Error: " . $e->getMessage();
            $response = array('success' => false, 'message' => 'Something went wrong! Please try again.');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Invalid request');
        echo json_encode($response);
    }