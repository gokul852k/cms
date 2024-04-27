<?php
require_once './login_check.php';
require_once './navbar.php';

?>
<link rel="stylesheet" href="./css/diesel.css">
<link rel="stylesheet" href="./css/report.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="daily-report">
    <div class="container box-container box-head w3-animate-top">
        <div class="row row-head">
            <div class="">
                <h4 class="heading">Fuel Report</h4>
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
            <div class="export-div">
                <a href="./excel/Report.xlsx"><button class="button-1 head-button">Export<i class="fa-duotone fa-download"></i></button></a>
            </div>
        </div>
    </div>

    <div class="container d-chart">
        <div class="row">
            <div class="col-4 w3-animate-left">
                <div class="box-container tms-card">
                    <div class="tms-card-head">
                        <div><i class="fa-duotone fa-gas-pump"></i></div>
                        <div>Fuel</div>
                    </div>
                    <div class="container tms-card-body" style="margin:0;height: 100%;width: 100%;">
                        <div class="row row-head">
                            <div class="content num-card">
                                <div class="container-fluid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 card-row-d-r">
                                        <div class="col card-col-d-r">
                                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                                <a href="#" class="no-underline">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <p class="mb-0 text-secondary">Total Amount</p>
                                                                <h4 class="my-1 text-info t-c-5">4500</h4>
                                                            </div>
                                                            <div
                                                                class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                                                <i class="fa-solid fa-indian-rupee-sign"></i>
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
                                                                <p class="mb-0 text-secondary">Total liters</p>
                                                                <h4 class="my-1 text-info t-c-3">20</h4>
                                                            </div>
                                                            <div
                                                                class="widgets-icons-2 rounded-circle  bg-gradient-blooker text-white ms-auto">
                                                                <i class="fa-solid fa-chart-simple"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col card-col-d-r">
                                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                                <a href="#" class="no-underline">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <p class="mb-0 text-secondary">Vehicle refueled</p>
                                                                <h4 class="my-1 text-info t-c-2">15</h4>
                                                            </div>
                                                            <div
                                                                class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                                                <i class="fa-solid fa-gas-pump"></i>
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
                </div>
            </div>
            <div class="col-8 w3-animate-right">
                <div class="box-container tms-card">
                    <div class="tms-card-head">
                        <div><i class="fa-duotone fa-chart-line-up"></i></div>
                        <div>Fuel Cost</div>
                    </div>
                    <div class="container box-head" style="margin:0;height: 100%;width: 100%;">
                        <div class="row row-head">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                                // Define the xValues as month names
                                const xValues = ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                                const yValues = [70000, 80000, 80000, 90000, 90000, 90000, 100000, 110000, 140000, 140000, 150000];

                                // Format y-axis ticks as per requirement
                                function formatYAxisTick(value, index, values) {
                                    if (value >= 10000000) {
                                        return (value / 10000000).toFixed(1) + ' Cr';
                                    } else if (value >= 100000) {
                                        return (value / 100000).toFixed(0) + ' Lakh';
                                    } else {
                                        return '₹' + value;
                                    }
                                }

                                new Chart("myChart", {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            fill: false,
                                            lineTension: 0,
                                            backgroundColor: "rgb(255 153 0)",
                                            borderColor: "rgb(255 153 0)",
                                            borderWidth: 2,
                                            pointBackgroundColor: "rgb(255 153 0)",
                                            pointBorderColor: "rgb(255 153 0)",
                                            pointBorderWidth: 1,
                                            pointRadius: 4,
                                            pointHoverBackgroundColor: "rgb(255 153 0)",
                                            pointHoverBorderColor: "rgb(255 153 0)",
                                            pointHoverBorderWidth: 2,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: { display: false },
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    callback: formatYAxisTick
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
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
                                    <th class="th">Liters</th>
                                    <th class="th">Amount</th>
                                    <th class="th">Bill</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>TN27M4037</td>
                                    <td>Gokulraj</td>
                                    <td>PicksPet Private limited</td>
                                    <td>2024-03-09</td>
                                    <td>25</td>
                                    <td>2,225</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-receipt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>TN30B6707</td>
                                    <td>Yokesh</td>
                                    <td>ZOHO Private limited</td>
                                    <td>2024-03-09</td>
                                    <td>30</td>
                                    <td>2,700</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-receipt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>TN29M2345</td>
                                    <td>Arun</td>
                                    <td>ZOHO Private limited</td>
                                    <td>2024-03-09</td>
                                    <td>35</td>
                                    <td>3,150</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-receipt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>TN30M3324</td>
                                    <td>Raj</td>
                                    <td>PicksPet Private limited</td>
                                    <td>2024-03-09</td>
                                    <td>30</td>
                                    <td>2,700</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-receipt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>TN28M0947</td>
                                    <td>Ravi Kumar</td>
                                    <td>TCS</td>
                                    <td>2024-03-09</td>
                                    <td>25</td>
                                    <td>2,225</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-receipt"></i></button>
                                    </td>
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