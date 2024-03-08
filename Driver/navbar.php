<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to cms</title>
  <link rel="stylesheet" href="../Admin/css/main.css">
  <link rel="stylesheet" href="./css/navbar.css">
  <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.css"
        integrity="sha512-n1PBkhxQLVIma0hnm731gu/40gByOeBjlm5Z/PgwNxhJnyW1wYG8v7gPJDT6jpk0cMHfL8vUGUVjz3t4gXyZYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.min.js"
        integrity="sha512-WHVh4oxWZQOEVkGECWGFO41WavMMW5vNCi55lyuzDBID+dHg2PIxVufsguM7nfTYN3CEeQ/6NB46FWemzpoI6Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <nav class="driver-nav">
    <ul class="sidebar">
      <div class="navdis">
        <li class="dis"  onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
        <li class="dis" ><a href="./home.php">Home</a></li>
        <li class="dis" ><a href="./diesel.php">Diesel</a></li>
        <li class="dis" ><a href="#">Contact</a></li>
        <li class="dis" ><a href="#">About</a></li>
        <li class="dis" ><a href="#">Help</a></li>
        <li class="dis" ><a href="./logout.php">Logout</a></li>
      </div>
    </ul>

    <ul>
      <li class="lo-gos"><a href="#">Farmer <span class="logo"><i class="fa-regular fa-car-side"></i></span></a></li>
      <li class="hideOnMobile" ><a href="./home.php">Home</a></li>
      <li class="hideOnMobile"><a href="./diesel.php">Diesel</a></li>
      <li class="hideOnMobile"><a href="#">Contact</a></li>
      <li class="hideOnMobile"><a href="#">About</a></li>
      <li class="hideOnMobile"><a href="#">Help</a></li>
      <li class="hideOnMobile"><a href="./logout.php">Logout</a></li>
      <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
    </ul>
  </nav>
  <script src="./js/nav_move.js"></script>
  <section class="home">