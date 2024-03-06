<?php
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/CMS/Admin/session_folder2');
    session_start();
    require_once '../Master Admin/Config/config.php';
    
    if(!isset($_SESSION['username'])) {
        header('Location: index.php');
        exit;
    }
?>