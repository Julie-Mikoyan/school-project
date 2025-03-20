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
    <link rel="stylesheet" href="tabstyle.css">
    <script src="tabWork.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Site Management Systems</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            margin: 0;
            height: 100vh;
        }
        .sidebar {
            width: 200px; /* Width of the sidebar */
            background-color: #f8f9fa;
            padding: 10px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .tablinks {
            display: block;
            padding: 15px;
            cursor: pointer;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            margin-bottom: 5px; /* Space between tabs */
            text-align: center;
            transition: background-color 0.3s;
        }
        .tablinks:hover {
            background-color: #e2e6ea; /* Hover effect */
        }
        .active {
            background-color : #007bff; /* Active tab color */
            color: white; /* Text color for active tab */
        }
        .content {
            flex: 1; /* Take the remaining space */
            padding: 20px;
            background-color: #fff;
            border-left: 1px solid #ccc; /* Border between sidebar and content */
        }
        canvas {
            max-width: 100%; /* Ensure charts fit within the content area */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Navigation</h2>
        <div class="tablinks" onclick="openTab(event, 'Dashboard')" id="defaultOpen">Dashboard</div>
        <div class="tablinks" onclick="openTab(event, 'Projects')">Projects</div>
        <div class="tablinks" onclick="openTab(event, 'Tasks')">Tasks</div>
        <div class="tablinks" onclick="openTab(event, 'Progress')">Progress</div>
        <div class="tablinks" onclick="openTab(event, 'Reports')">Reports</div>
        <div class="tablinks" onclick="openTab(event, 'Settings')">Settings</div>
    </div>

    <div class="content">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</h1>
        
        <div id="Dashboard" class="tabcontent">
            <h2>Key Metrics</h2>
            <ul>
                <li>Ongoing Projects: <strong>5 Active Projects</strong></li>
                <li>Completed Projects: <strong>12 Completed Projects</strong></li>
                <li>Pending Issues/Tasks: <strong>15 Pending Tasks</strong></li>
            </ul>

            <h2>Progress Tracking Visuals</h2>
            <div id="charts">
                <canvas id="ganttChart" width="400" height="200"></canvas>
                <canvas id="progressChart" width="400" height="200"></canvas>
                <canvas id="budgetChart" width="400" height="200"></canvas>
            </div>

            <h2>Quick Actions</h2>
            <button class="btn btn-primary">Add Project</button>
            <button class="btn btn-secondary">Assign Task</button>
            <button class="btn btn-success">Generate Report</button>
        </div>

        <div id="Projects" class="tabcontent" style="display:none;">
            <h2>Project Management</h2>
            <p>This section will allow you to manage your projects effectively.</p>
        </div>

        <div id="Tasks" class="tabcontent" style="display:none;">
            <h2>Task Management</h2>
            <p>This section will help you track and manage tasks associated with your projects.</p>
        </div>

        <div id="Progress" class="tabcontent" style="display:none;">
            <h2>Progress Overview</h2>
            <p> Here you can view the overall progress of your projects and tasks.</p>
        </div>

        <div id="Reports" class="tabcontent" style="display:none;">
            <h2>Reports</h2>
            <p>Generate and view reports related to your projects and tasks.</p>
        </div>

        <div id="Settings" class="tabcontent" style="display:none;">
            <h2>Settings</h2>
            <p>Adjust your preferences and settings for the dashboard.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";  
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");  
            }
            document.getElementById(tabName).style.display = "block";  
            evt.currentTarget.className += " active";  
        }

        // Set default tab to open
        document.getElementById("defaultOpen").click();

        // Initialize your charts here using Chart.js
        var ctxGantt = document.getElementById('ganttChart').getContext('2d');
        var ganttChart = new Chart(ctxGantt, {
            type: 'bar', // Example type, adjust as needed
            data: {
                labels: ['Project 1', 'Project 2', 'Project 3'],
                datasets: [{
                    label: 'Timeline',
                    data: [12, 19, 3],
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

        var ctxProgress = document.getElementById('progressChart').getContext('2d');
        var progressChart = new Chart(ctxProgress, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Remaining'],
                datasets: [{
                    label: 'Project Completion',
                    data: [70, 30],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    hoverOffset: 4
                }]
            }
        });

        var ctxBudget = document.getElementById('budgetChart').getContext('2d');
        var budgetChart = new Chart(ctxBudget, {
            type: 'bar',
            data: {
                labels: ['Allocated', 'Utilized'],
                datasets: [{
                    label: 'Budget',
                    data: [10000, 7000],
                    backgroundColor: ['#FFCE56', '#FF6384'],
                    borderColor: 'rgba(255, 99, 132, 1)',
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