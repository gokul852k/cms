<?php
require_once './login_check.php';
require_once './navbar.php';

?>
<link rel="stylesheet" href="./css/diesel.css">
<link rel="stylesheet" href="./css/report.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js">
</script>

<style>
    .widget {
        border-radius: 0.75rem;
        background-color: var(--background-widget);
        padding: 1rem;
        max-width: 40rem;
        width: 100%;
        min-width: 20rem;
    }

    .widget canvas {
        min-height: 20rem;
    }

    #myChart {
        height: 300px !important;
    }
</style>
<div class="daily-report">
    <div class="container box-container box-head w3-animate-top">
        <div class="row row-head">
            <div class="">
                <h4 class="heading">Maintenance Report</h4>
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
            <div class="col-8 w3-animate-left">
                <div class="box-container tms-card">
                    <div class="tms-card-head">
                        <div><i class="fa-duotone fa-chart-line-up"></i></div>
                        <div>Maintenance Cost</div>
                    </div>
                    <div class="container tms-card-body" style="margin:0;height: 100%;width: 100%;">
                        <div class="row row-head">
                            <div class="widget">
                                <canvas id="chart"></canvas>
                            </div>
                            <script>
                                const ctx = document.getElementById("chart");

                                Chart.defaults.color = "#272626";
                                // Chart.defaults.font.family = "Poppins";

                                new Chart(ctx, {
                                    type: "line",
                                    data: {
                                        labels: [
                                            "Jan",
                                            "Feb",
                                            "Mar",
                                            "Apr",
                                            "May",
                                            "Jun",
                                            "Jul",
                                            "Aug",
                                            "Sep",
                                            "Oct",
                                            "Nov",
                                            "Dec",
                                        ],
                                        datasets: [
                                            {
                                                label: "",
                                                data: [2235, 3250, 1890, 5400, 20240, 6254, 12325, 4856, 10325, 2254, 22356, 8486],
                                                backgroundColor: "black",
                                                borderColor: "coral",
                                                borderRadius: 6,
                                                cubicInterpolationMode: 'monotone',
                                                fill: false,
                                                borderSkipped: false,
                                            },
                                        ],
                                    },
                                    options: {
                                        interaction: {
                                            intersect: false,
                                            mode: 'index'
                                        },
                                        elements: {
                                            point: {
                                                radius: 0
                                            }
                                        },
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                display: false,
                                            },
                                            tooltip: {
                                                backgroundColor: "orange",
                                                bodyColor: "#272626",
                                                yAlign: "bottom",
                                                cornerRadius: 4,
                                                titleColor: "#272626",
                                                usePointStyle: true,
                                                callbacks: {
                                                    label: function (context) {
                                                        if (context.parsed.y !== null) {
                                                            const label = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'INR' }).format(context.parsed.y);
                                                            return label;
                                                        }
                                                        return null;
                                                    }
                                                }
                                            },
                                        },
                                        scales: {
                                            x: {
                                                border: {
                                                    dash: [4, 4],
                                                },
                                                title: {
                                                    text: "2023",
                                                },
                                            },
                                            y: {
                                                grid: {
                                                    color: "#27292D",
                                                },
                                                border: {
                                                    dash: [1, 2],
                                                }
                                            },
                                        },
                                    },
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 w3-animate-right">
                <div class="box-container tms-card">
                    <div class="tms-card-head">
                        <div><i class="fa-duotone fa-chart-tree-map"></i></div>
                        <div>Maintenance</div>
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
                                                                <p class="mb-0 text-secondary">Number of Vehicle</p>
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
                                    <th class="th">Repair</th>
                                    <th class="th">Repair Shop</th>
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
                                    <td>puncher</td>
                                    <td>Balaji Mechanical</td>
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
                                    <td>Oil Change</td>
                                    <td>Mech Mechanical</td>
                                    <td>2,700</td>
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