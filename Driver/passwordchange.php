<?php
session_start();
require_once '../Master Admin/Config/config.php';

if(isset($_POST['username']) && isset($_POST['create_password']) && isset($_POST['confirm_password'])) {
    $username = $_POST['username'];
    $createPassword = $_POST['create_password'];

    $stmt = $conn->prepare("SELECT * FROM `driver_details` WHERE `username`=:username AND `flag`=:flag");

    $flag=0;
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':flag', $flag);

    
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        if($username == $row['username']) {

            $hashPassword = password_hash($createPassword, PASSWORD_DEFAULT);

            $token = 1;

            $stmt2 = $conn->prepare("UPDATE `driver_details` SET `password`=:password, `token`=:token  WHERE `username`=:username");

            $stmt2->bindParam(':password', $hashPassword);
            $stmt2->bindParam(':token', $token);
            $stmt2->bindParam(':username', $username);

            $stmt2->execute();
            unset($_SESSION['change_password']);
            $response = array('success' => true);
        } else {
            $response = array('success' => false, 'message' => 'Something went wrong! Please try again.');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Something went wrong! Please try again.');
        echo json_encode($response);
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid request');
    echo json_encode($response);
}