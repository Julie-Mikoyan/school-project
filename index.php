<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["name"])) {
    $_SESSION["name"] = "User   ";
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

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <div class="overview-cards">
            <div class="overview-card">
                <h3>Projects in Progress</h3>
                <p>5</p>
            </div>
            <div class="overview-card">
                <h3>Completed Projects</h3>
                <p>10</p>
            </div>
            <div class="overview-card">
                <h3>Pending Tasks</h3>
                <p>3</p>
            </div>
            <div class="overview-card">
                <h3>Ongoing Issues</h3>
                <p>2</p>
            </div>
        </div>

        <div class="project-progress-chart">
            <canvas id="progressChart"></canvas>
        </div>

        <div class="task-management-section">
            <h2>Task Management</h2>
            <ul class="task-list">
                <li class="task-item">Upcoming Task 1</li>
                <li class="task-item">Overdue Task 1</li>
                <li class="task-item">Completed Task 1</li>
            </ul>
        </div>

        <div class="site-activity-log">
            <h2>Site Activity Log</h2>
            <div class="activity-log-item">🏗️ John updated Project X’s budget.</div>
            <div class="activity-log-item">📑 Sarah submitted a safety report.</div>
            <div class="activity-log-item">🔧 Mike completed maintenance on equipment.</div>
        </div>

        <div class="quick-access-buttons">
            <button class="btn btn-primary">Add New Project</button>
            <button class="btn btn-secondary">View All Tasks</button>
            <button class="btn btn-success">Generate Report</button>
        </div>
    </main>
   </section>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="side-bar.js"></script>
   <script>
       const ctx = document.getElementById('progressChart').getContext('2d');
       const progressChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: ['Project A', 'Project B', 'Project C'],
               datasets: [{
                   label: 'Progress (%)',
                   data: [75, 50, 90],
                   backgroundColor: 'rgba(75, 192, 192, 0.2)',
                   borderColor: 'rgba(75, 192, 192, 1)',
                   borderWidth: 1
               }]
           },
           options: {
               scales: {
                   y: {
                       beginAtZero: true
                   }
               }
           }
       });
   </script>
</body>
</html>