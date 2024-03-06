<?php
session_save_path($_SERVER['DOCUMENT_ROOT'] . '/CMS/Driver/session_folder1');
session_start();
require_once '../Master Admin/Config/config.php';
// unset($_SESSION['token']);
if (isset($_COOKIE['remember_me']) && !isset($_SESSION['token'])) {

    $token = $_COOKIE['remember_me'];

    $stmt = $conn->prepare("SELECT * FROM `driver_details` WHERE `token`=:token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['token'] = $token;
        $_SESSION['username'] = $user['username'];
        $_SESSION['vehicle_no'] = $user['vehicle_no'];
        $_SESSION['companyId'] = $user['company_id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['mobile'] = $user['mobile'];
    } else {
        setcookie('remember_me', '', time() - 3600);
    }
}

if (!isset($_SESSION['token'])) {
    header('Location: index.php');
    exit;
}

// echo "Welcome to the dashboard!";
?>