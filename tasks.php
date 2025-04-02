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
    <title>Projects - Construction Site Management Systems</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="tasks.css">
</head>

<body>
   <section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bx-home-smile'></i>
        <span class="text">CSMS</span>
    </a>
    <ul class="side-menu top">
        <li>
            <a href="index.php">
            <i class='bx bxs-dashboard'></i>
            <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="projects.php">
            <i class='bx bx-buildings'></i>
            <span class="text">Projects</span>
            </a>
        </li>
        <li class="active">
            <a href="tasks.php">
            <i class='bx bx-check-square'></i>
            <span class="text">Tasks</span>
            </a>
        </li>
        <li>
            <a href="progress.php">
            <i class='bx bx-bar-chart-square'></i>
            <span class="text">Progress</span>
            </a>
        </li>
        <li>
            <a href="report.php">
            <i class='bx bx-file'></i>
            <span class="text">Report</span>
            </a>
        </li>
        <li>
            <a href="settings.php">
            <i class='bx bx-cog'></i>
            <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="text">Logout</span>
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
                <h1>Tasks</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="projects.php">Projects</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="tasks.php">Tasks</a>
                    </li>
                </ul>
            </div>
            <a href="path/to/yourfile.pdf" download="desiredfilename.pdf">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Project Management</h1>

        <div class="tasks-tab">
            <h2>Tasks</h2>
            <div class="task-form">
                <input type="text" id="taskName" placeholder="Task Name" required>
                <input type="text" id="assignedTo" placeholder="Assigned To" required>
                <select id="status">
                    <option value="Not Started">Not Started</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
                <button id="addTaskButton">Add Task</button>
            </div>

            <table id="tasksTable">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
    </main>
   </section>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="tasks.js"></script>
   
</body>
</html>