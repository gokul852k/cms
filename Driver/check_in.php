    <?php
    require_once './login_check.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $checkInKm = $_POST['checkInKm'];
        $companyId = $_SESSION['companyId'];
        $driverId = $_SESSION['driverId'];
        $subCompanyId = $_SESSION['subCompanyId'];
        $currentDate = date('Y-m-d');

        date_default_timezone_set('Asia/Kolkata');

        $currentTime = date('H:i:s');

        try {
            $stmt = $conn->prepare("INSERT INTO `driver_daily_report` (`company_id`, `sub_company_id`, `driver_id`, `check_in_date`, `check_in_time`, `check_in_km`) VALUES (:companyId, :subCompanyId, :driverId, :currentDate, :currentTime, :checkInKm)");

            $stmt->bindParam(':companyId', $companyId);
            $stmt->bindParam(':subCompanyId', $subCompanyId);
            $stmt->bindParam(':driverId', $driverId);
            $stmt->bindParam(':currentDate', $currentDate);
            $stmt->bindParam(':currentTime', $currentTime);
            $stmt->bindParam(':checkInKm', $checkInKm);

            $stmt->execute();
            $response = array('success' => true, 'message' => 'Check in Successfully.');
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