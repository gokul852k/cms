<?php
session_start();
require_once '../Master Admin/Config/config.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM `company_master` WHERE `username`=:username AND `flag`=:flag");

    $flag=0;
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':flag', $flag);

    
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        if($username == $row['username'] && password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['companyId'] = $row['company_id'];
            $_SESSION['companyName'] = $row['company_name'];
            $_SESSION['companyLogo'] = $row['company_logo'];

            $response = array('success' => true);
        } else {
            $response = array('success' => false, 'message' => 'Invalid username or password');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Invalid username or password');
        echo json_encode($response);
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid request');
    echo json_encode($response);
}