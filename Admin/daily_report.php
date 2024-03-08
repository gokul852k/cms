<?php
require_once './login_check.php';
require_once './navbar.php';

?>
<link rel="stylesheet" href="./css/report.css">
<div class="daily-report">
    <div class="container box-container box-head w3-animate-top">
        <div class="row row-head">
            <div class="">
                <h4 class="heading">Daily Report</h4>
            </div>
            <div class="form-group">
                <span>From</span>
                <input type="date" name="from-date" class="form-field">
            </div>
            <div class="col-3 form-group">
                <input type="date" name="to-date" class="form-field">
                <span>To</span>
            </div>
            <div class="">
                <button class="button-1 head-button"><i class="fa-solid fa-filter"></i>Filter</button>
            </div>
            <div class="">
                <button class="button-1 head-button">Export<i class="fa-duotone fa-download"></i></button>
            </div>
        </div>
    </div>
    <div class="container box-container w3-animate-top">
        <div class="row row-head">
            <div class="content">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 card-row-d-r">
                        <div class="col card-col-d-r">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <a href="./social_media_leads.php" class="no-underline">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Check In</p>
                                                <h4 class="my-1 text-info">20</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                                <i class="fa-solid fa-inbox-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col card-col-d-r">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <a href="./social_media_leads.php" class="no-underline">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Check Out</p>
                                                <h4 class="my-1 text-info t-c-2">10</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                                <i class="fa-solid fa-inbox-out"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col card-col-d-r">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <a href="./social_media_leads.php" class="no-underline">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total KM</p>
                                                <h4 class="my-1 text-info t-c-5">157</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col card-col-d-r">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <a href="./social_media_leads.php" class="no-underline">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Vehicle</p>
                                                <h4 class="my-1 text-info t-c-3">20</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle  bg-gradient-blooker text-white ms-auto">
                                                <i class="fa-solid fa-car-mirrors"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        
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
                                    <th class="th">S.No</th>
                                    <th class="th">Vehicle No</th>
                                    <th class="th">Driver Name</th>
                                    <th class="th">Company</th>
                                    <th class="th">Date</th>
                                    <th class="th">Starting KM</th>
                                    <th class="th">End KM</th>
                                    <th class="th">Total KM</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>TN30M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet</td>
                                    <td>2024-03-07</td>
                                    <td>250</td>
                                    <td>340</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>TN30M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet</td>
                                    <td>2024-03-07</td>
                                    <td>250</td>
                                    <td>340</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>TN30M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet</td>
                                    <td>2024-03-07</td>
                                    <td>250</td>
                                    <td>340</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>TN30M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet</td>
                                    <td>2024-03-07</td>
                                    <td>250</td>
                                    <td>340</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>TN30M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet</td>
                                    <td>2024-03-07</td>
                                    <td>250</td>
                                    <td>340</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>TN30M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet</td>
                                    <td>2024-03-07</td>
                                    <td>250</td>
                                    <td>340</td>
                                    <td>90</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        $('table').DataTable();

</script>

<?php
require_once './footer.php';
?>