<?php
require_once './login_check.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check which type of filter request

    switch ($_POST['filterType']) {

        //Daily report filter
        case 1:
            dailyTableFilter($conn, $_POST['fromDate'], $_POST['toDate']);
            break;
        default:
            echo json_encode([]);;
    }

    function dailyTableFilter($conn, $fromDate, $toDate)
    {
        $stmt1 = $conn->prepare("SELECT vehicle.vehicle_number, driver_details.fullname, sub_company.company_name, driver_daily_report.check_in_date, driver_daily_report.check_in_km, driver_daily_report.check_out_km, driver_daily_report.total_km FROM `driver_daily_report` INNER JOIN sub_company ON sub_company.sub_company_id = driver_daily_report.sub_company_id INNER JOIN driver_details ON driver_daily_report.driver_id = driver_details.driver_id INNER JOIN vehicle ON vehicle.vehicle_id = driver_details.vehicle_no WHERE driver_daily_report.company_id=:companyId AND driver_daily_report.check_in_date>=:fromDate AND driver_daily_report.check_out_date<=:toDate AND driver_daily_report.flag =:flag");

        $flag = 1;
        $companyId = $_SESSION['companyId'];

        $stmt1->bindParam(':companyId', $companyId);
        $stmt1->bindParam(':fromDate', $fromDate);
        $stmt1->bindParam(':toDate', $toDate);
        $stmt1->bindParam(':flag', $flag);

        $stmt1->execute();

        $row1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row1);
    }
}

?>