<?php
require_once './login_check.php';
require_once './navbar.php';

$stmt = $conn->prepare("SELECT * FROM `driver_details` INNER JOIN vehicle ON vehicle.vehicle_id = driver_details.vehicle_no INNER JOIN sub_company ON driver_details.sub_company_id = sub_company.sub_company_id WHERE driver_details.company_id=:company_id AND driver_details.flag=:flag");

$companyId = $_SESSION['companyId'];

$flag = 0;

$stmt->bindParam(':company_id', $companyId);
$stmt->bindParam(':flag', $flag);

$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="./css/driver.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<style>
    h2 {
        text-align: center;
        padding: 20px 0;
    }

    table {
        border-collapse: collapse;
        /* Collapse the borders */
        border-radius: 7px;
        /* Set border-radius for the table */
        overflow: hidden;
        /* Ensure the border-radius is applied properly */
        width: 100%;
        /* Set table width to 100% */
        border-bottom: none;
        /* Hide the bottom border */
        border-bottom: 2px solid ghostwhite;
    }

    th,
    td {
        border: none;
        font-size: 15px;
    }

    tr {
        border: none;
    }

    .th {
        background-color: var(--primary-color) !important;
        color: white !important;
        font-weight: 600 !important;
    }

    tr:nth-child(even) td {
        background-color: #fff6e7;
        /* Set background color for odd rows */
    }

    .dt-column-order {
        color: black;
    }

    .dt-length label {
        display: none;
    }

    div.dt-container.dt-empty-footer tbody>tr:last-child>* {
        border-bottom: none;
    }

    div.dt-container.dt-empty-footer .dt-scroll-body {
        border-bottom: none;
    }
</style>

<div class="register-driver">
    <div class="container box-container w3-animate-top">
    <div class="row">
            <h4 class="heading">Driver Details</h4>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="counter">
                    <span class="counter-value">30</span>
                    <h3>Total Drivers</h3>
                    <div class="counter-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter purple">
                    <span class="counter-value">29</span>
                    <h3>Drivers</h3>
                    <div class="counter-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter magenta">
                    <span class="counter-value">30</span>
                    <h3>Acting Drivers</h3>
                    <div class="counter-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter yellow">
                    <span class="counter-value">29</span>
                    <h3>Active Drivers</h3>
                    <div class="counter-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container box-container w3-animate-bottom">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <table
                            summary="This table shows how to create responsive tables using Datatables' extended functionality"
                            class="table table-bordered table-hover dt-responsive">

                            <thead>
                                <tr>
                                    <th class="th">Vehicle No</th>
                                    <th class="th">Name</th>
                                    <th class="th">Mobile</th>
                                    <th class="th">Company</th>
                                    <th class="th">License No</th>
                                    <th class="th">Insurance No</th>
                                    <th class="th">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['vehicle_number'] ?>
                                        </td>
                                        <td>
                                            <?= $row['fullname'] ?>
                                        </td>
                                        <td>
                                            <?= $row['mobile'] ?>
                                        </td>
                                        <td>
                                            <?= $row['company_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['license_no'] ?>
                                        </td>
                                        <td>
                                            <?= $row['insurance_no'] ?>
                                        </td>
                                        <td class="th-btn">
                                            <button class="table-btn view"><i class="fa-duotone fa-eye"></i></button>
                                            <button class="table-btn edit"><i
                                                    class="fa-duotone fa-pen-to-square"></i></button>
                                            <button class="table-btn delete"><i class="fa-duotone fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?PHP
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('table').DataTable();

        $(document).ready(function () {
            $('.counter-value').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>
    <?php
    require_once './footer.php';
    ?>