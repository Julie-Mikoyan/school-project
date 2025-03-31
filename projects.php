<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["name"])) {
    $_SESSION["name"] = "User    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Construction Site Management Systems</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="side-bar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="projects.css"> <!-- Link to the new CSS file for projects -->
</head>

<body>
   <section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bx-home-smile' ></i>
        <span class="text">CSMS</span>
    </a>
    <ul class="side-menu top">
        <li>
            <a href="index.php">
            <i class='bx bxs-dashboard' ></i>
            <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="active">
            <a href="project.php">
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
        <h2>Projects Tab – Construction Site Management System 🏗️</h2>

        <div class="project-overview">
            <h3>1️⃣ Project Overview Section</h3>
            <div class="project-cards">
                <div class="project-card">
                    <h4>Project Name 1</h4>
                    <p>Status: Ongoing</p>
                    <p>Start Date: 2023-01-01</p>
                    <p>End Date: 2023-12-31</p>
                    <p>Project Manager: John Doe</p>
                    <p>Progress: 75%</p>
                </div>
                <div class="project-card">
                    <h4>Project Name 2</h4>
                    <p>Status: Completed</p>
                    <p>Start Date: 2022-01-01</p>
                    <p>End Date: 2022-12-31</p>
                    <p>Project Manager: Jane Smith</p>
                    <p>Progress: 100%</p>
                </div>
                <div class="project-card">
                    <h4>Project Name 3</h4>
                    <p>Status: Upcoming</p>
                    <p>Start Date: 2023-06-01</p>
                    <p>End Date: 2024-06-01</p>
                    <p>Project Manager: Alice Johnson</p>
                    <p>Progress: 0%</p>
                </div>
                <!-- Add more project cards as needed -->
            </div>
        </div>

        <div class="individual-project-details">
            <h3>2️⃣ Individual Project Details Page</h3>
            <div class="project-details">
                <h4>Project Name 1</h4>
                <p>Description: This project involves...</p>
                <p>Assigned Subcontractors: Worker A, Worker B</p>
                <p>Location: Site A</p>
                <div class="progress-chart">
                    <canvas id="ganttChart"></canvas>
                </div>
                <h5>Documents Section</h5>
                <ul>
                    <li><a href="#">Contract.pdf</a></li>
                    <li><a href="#">Blueprints.pdf</a></li>
                    <li><a href="#">Report.pdf</a></li>
                </ul>
                <h5>Budget & Expenses</h5>
                <p>Budget: $100,000</p>
                <p>Expenses: $75,000</p>
            </div>
        </div>

        <div class="task-milestones-section">
            <h3>3️⃣ Task & Milestones Section</h3>
            <h4>Upcoming Tasks 📆</h4>
            <ul>
                <li>Task 1 - Due: 2023-05-01</li>
                <li>Task 2 - Due: 2023-06-01</li>
            </ul>
            <h4>Completed Tasks ✅</h4>
            <ul>
                <li>Task 3 - Completed on: 2023-04-01</li>
            </ul>
            <h4>Deadline Reminders ⏳</h4>
            <p>Check tasks due this week!</p>
        </div>

        <div class="reports-logs">
            <h3>4️⃣ Reports & Logs</h3>
            <h4>Daily Reports 📑</h4>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Report</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-04-01</td>
                        <td><a href="#">Report 1</a></td>
                    </tr>
                    <tr>
                        <td>2023-04-02</td>
                        <td><a href="#">Report 2</a></td>
                    </tr>
                </tbody>
            </table>
            <h4>Site Issues & Updates ⚠️</h4>
            <ul>
                <li>Issue 1 - Description...</li>
                <li>Issue 2 - Description...</li>
            </ul>
        </div>

        <div class="role-based-visibility">
            <h3>5️⃣ Role-Based Visibility 🔑</h3>
            <p>👷 Site Manager (Admin) → Can view, edit, and assign projects.</p>
            <p>🔨 Subcontractors → Can only view assigned projects & update progress.</p>
            <p>📊 Consultants → Can view project status & reports but not edit.</p>
        </div>
    </main>
   </section>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="projects.js"></script> <!-- Link to the JavaScript file for projects -->
</body>
</html>