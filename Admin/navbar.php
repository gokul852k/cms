<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS - AstronuX</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.css" integrity="sha512-n1PBkhxQLVIma0hnm731gu/40gByOeBjlm5Z/PgwNxhJnyW1wYG8v7gPJDT6jpk0cMHfL8vUGUVjz3t4gXyZYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.min.js" integrity="sha512-WHVh4oxWZQOEVkGECWGFO41WavMMW5vNCi55lyuzDBID+dHg2PIxVufsguM7nfTYN3CEeQ/6NB46FWemzpoI6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
</head>

<body>
    <nav class="sidebar labtop-nav">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="./svg/AstronuX.svg" alt="">
                    <!-- <i class="fa-solid fa-diamond"></i> -->
                </span>

                <div class="text logo-text">
                    <span class="name">Astronu<span class="first-color">X</span></span>
                    <span class="profession"></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search Ganes...">
                </li> -->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./home.php">
                            <i class='bx bxs-dashboard icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="daily_report.php">
                            <i class="fa-duotone fa-chart-simple icon"></i>
                            <span class="text nav-text">Daily Report</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="fuel_report.php">
                            <i class="fa-duotone fa-chart-pyramid icon"></i>
                            <span class="text nav-text">Fuel Report</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="maintenance_report.php">
                        <i class="fa-duotone fa-wrench-simple icon"></i>
                            <span class="text nav-text">Maintenance Report</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="register_company.php">
                            <i class="fa-duotone fa-hexagon-plus icon"></i>
                            <span class="text nav-text">Register Company</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./register_driver.php">
                            <i class="fa-duotone fa-user-plus icon"></i>
                            <span class="text nav-text">Register Driver</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./driver_details.php">
                        <i class="fa-duotone fa-id-card icon"></i>
                            <span class="text nav-text">Driver Details</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./addvehicle.php">
                            <i class="fa-duotone fa-car icon"></i>
                            <span class="text nav-text">Add Vehicle</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./contactus.php">
                        <i class="fa-duotone fa-circle-info icon"></i>
                            <span class="text nav-text">Contact Us</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="./logout.php">
                        <!-- <i class='bx bx-log-out icon'></i> -->
                        <i class="fa-duotone fa-arrow-right-from-bracket icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->

            </div>
        </div>

    </nav>

    <nav id="nav" class="nav mobile-nav" role="navigation">

    </nav>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })
        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })
        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");
            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";
            }
        });
    </script>
    <section class="home">
    