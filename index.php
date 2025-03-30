<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["name"])) {
    $_SESSION["name"] = "User  ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Site Management Systems</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="side-bar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
   <section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bx-home-smile' ></i>
        <span class="text">CSMS</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#">
            <i class='bx bxs-dashboard' ></i>
            <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
            <i class='bx bx-buildings' ></i>
            <span class="text">Projects</span>
            </a>
        </li>
        <li>
            <a href="#">
            <i class='bx bx-check-square' ></i>
            <span class="text">Tasks</span>
            </a>
        </li>
        <li>
            <a href="#">
            <i class='bx bx-bar-chart-square' ></i>
            <span class="text">Progress</span>
            </a>
        </li>
        <li>
            <a href="#">
            <i class='bx bx-file' ></i>
            <span class="text">Report</span>
            </a>
        </li>
        <li>
            <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="text">Settings</span>
            </a>
        </li>
    </ul>
   </section>
   
   <section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search-alt'></i></button>
            </div>
        </form>
        <a href="#" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">8</span>
        </a>
    </nav>
   </section>

   <script src="side-bar.js"></script>
</body>
</html>