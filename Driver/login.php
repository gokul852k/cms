<?php
session_start();
require_once '../Master Admin/Config/config.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM `driver_details` WHERE `username`=:username AND `flag`=:flag");

    $flag=0;
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':flag', $flag);

    
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        if($username == $row['username'] && password_verify($password, $row['password'])) {

            //check for change new password
            if($row['token'] != 0) {
                $token = bin2hex(random_bytes(16));
                //store token to database
                $stmt2 = $conn->prepare("UPDATE `driver_details` SET `token`=:token WHERE `username`=:username");
                $stmt2->bindParam(':token', $token);
                $stmt2->bindParam(':username', $username);
                $stmt2->execute();

                $_SESSION['token'] = $token;
                setcookie('remember_me', $token, time() + (50 * 365 * 24 * 60 * 60)); // Cookie expires in 50 years
                
                $_SESSION['username'] = $username;
                $_SESSION['companyId'] = $row['company_id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['mobile'] = $row['mobile'];

                $response = array('success' => true);
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['change_password'] = true;
                $response = array('success' => 'redirect', 'url' => 'newpassword.php');
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