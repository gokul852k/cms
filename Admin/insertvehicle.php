<?php
require_once './login_check.php';

if(isset($_POST['vehicle_number'])) {
    $vehicleNumber = $_POST['vehicle_number'];
    $subCompanyId = $_POST['company'];
    $vehicleName = $_POST['vehicle_name'];
    $companyId = $_SESSION['companyId'];

    try {
        $stmt = $conn->prepare("INSERT INTO `vehicle` (`company_id`, `sub_company_id`, `vehicle_number`, `vehicle_name`) VALUES (:companyId, :subCompanyId, :vehicleNumber, :vehicleName)");

        $stmt->bindParam(':companyId', $companyId);
        $stmt->bindParam(':subCompanyId', $subCompanyId);
        $stmt->bindParam(':vehicleNumber', $vehicleNumber);
        $stmt->bindParam(':vehicleName', $vehicleName);

        $stmt->execute();
        $response = array('success' => true, 'message' => 'Vehicle added Successfully.');
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        $response = array('success' => false, 'message' => 'Something went wrong! Please try again.');
    }
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Invalid request');
    echo json_encode($response);
}