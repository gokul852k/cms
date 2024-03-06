<?php
require_once './login_check.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['companyName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $companyId = $_SESSION['companyId'];

    try {
        $stmt = $conn->prepare("INSERT INTO `sub_company` (`company_id`, `company_name`, `email`, `mobile`) VALUES (:companyid, :companyName, :email, :mobile)");

        $stmt->bindParam(':companyid', $companyId);
        $stmt->bindParam(':companyName', $companyName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobile', $mobile);

        $stmt->execute();
        $response = array('success' => true, 'message' => 'Company added Successfully.');
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        $response = array('success' => false, 'message' => 'Something went wrong! Please try again.');
    }
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Invalid request');
    echo json_encode($response);
}