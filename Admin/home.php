<?php
require_once './login_check.php';
require_once './navbar.php';

?>
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
            <div class="admin-logo-div">
                <img src="https://media.licdn.com/dms/image/C5603AQEf1Sxd5ui8qg/profile-displayphoto-shrink_800_800/0/1661837805310?e=1721865600&v=beta&t=EoKRVxiaZ9opLj9JUA724X0lWJKKIYBRtDZyc7tt0jQ"
                    alt="" class="admin-logo">
                <h4 class="heading">Joe Transport</h4>
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
        </div>
    </div>
    <div class="container box-container w3-animate-top">
        <div class="row row-head">
            <div class="content">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 card-row-d-r">
                        <div class="col card-col-d-r">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <a href="#" class="no-underline">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Vehicle</p>
                                                <h4 class="my-1 text-info">60</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                                <i class="fa-solid fa-car-mirrors"></i>
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
                                                <p class="mb-0 text-secondary">Total Drivers</p>
                                                <h4 class="my-1 text-info t-c-2">70</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                                <i class="fa-solid fa-user-pilot"></i>
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
                                                <p class="mb-0 text-secondary">Total company</p>
                                                <h4 class="my-1 text-info t-c-5">3</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                                <i class="fa-solid fa-building"></i>
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
                                                <p class="mb-0 text-secondary">Vehicle Usage</p>
                                                <h4 class="my-1 text-info t-c-3">90%</h4>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle  bg-gradient-blooker text-white ms-auto">
                                                <i class="fa-solid fa-car-bolt"></i>
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

    <div class="container d-chart">
        <div class="row">
            <div class="col-5 w3-animate-left">
                <div class="box-container tms-card">
                    <div class="tms-card-head">
                        <div><i class="fa-duotone fa-chart-pie-simple"></i></div>
                        <div>Drivers Chart</div>
                    </div>
                    <div class="container tms-card-body" style="margin:0;height: 100%;width: 100%;">
                        <div class="row row-head">
                            <canvas id="myChart" style=""></canvas>

                            <script>
                                const xValues = ["Drivers", "Acting Drivers"];
                                const yValues = [60, 10];
                                const barColors = [
                                    "rgba(26, 188, 156,1.0)",
                                    "#f54ea2"
                                ];

                                new Chart("myChart", {
                                    type: "doughnut",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 w3-animate-right">
                <div class="box-container tms-card">
                    <div class="tms-card-head">
                        <div><i class="fa-duotone fa-chart-line-up"></i></div>
                        <div>Total Cost</div>
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
                                    <th class="th">Company Name</th>
                                    <th class="th">Total Vehicle</th>
                                    <th class="th">Total Drivers</th>
                                    <th class="th">Total KM</th>
                                    <th class="th">Total Fuel Cost</th>
                                    <th class="th">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>PicksPet Private limited</td>
                                    <td>30</td>
                                    <td>32</td>
                                    <td>2600</td>
                                    <td>234,000</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ZOHO Private limited</td>
                                    <td>18</td>
                                    <td>20</td>
                                    <td>1750</td>
                                    <td>157,500</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>TCS</td>
                                    <td>12</td>
                                    <td>15</td>
                                    <td>990</td>
                                    <td>89,100</td>
                                    <td class="th-btn">
                                        <button class="table-btn view"><i class="fa-duotone fa-eye"></i></button>
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