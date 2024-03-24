<?php

session_save_path($_SERVER['DOCUMENT_ROOT'] . '/CMS/Admin/session_folder2');

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

            //check for change new password
            if($row['one_time_password'] === 0) {
                $oneTime = 1;
                $stmt2 = $conn->prepare("UPDATE `company_master` SET `one_time_password`=:one_time WHERE `username`=:username");
                $stmt2->bindParam(':one_time', $oneTime);
                $stmt2->bindParam(':username', $username);
                $stmt2->execute();
                $_SESSION['username'] = $username;
                $_SESSION['change_password'] = true;
                $response = array('success' => 'redirect', 'url' => 'newpassword.php');
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['companyId'] = $row['company_id'];
                $_SESSION['companyName'] = $row['company_name'];
                $_SESSION['companyLogo'] = $row['company_logo'];

                $response = array('success' => true);
            }
            
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