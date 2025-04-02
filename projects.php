<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["name"])) {
    $_SESSION["name"] = "User ";
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
    <link rel="stylesheet" href="projects.css">
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
        <li class="active">
            <a href="projects.php">
            <i class='bx bx-buildings'></i>
            <span class="text">Projects</span>
            </a>
        </li>
        <li>
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
                <h1>Projects</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="projects.php">Projects</a>
                    </li>
                </ul>
            </div>
            <a href="path/to/yourfile.pdf" download="desiredfilename.pdf">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <div class="projects-tab">
            <h2>Projects</h2>
            
            <button id="newProjectBtn" class="btn btn-primary">New Project</button>
            
            <div class="project-list">
                <h3>Active Projects</h3>
                <ul id="activeProjects">
                </ul>
                
                <h3>Completed Projects</h3>
                <ul id="completedProjects">
            </div>
            
            <div class="project-details" id="projectDetailsModal" style="display:none;">
                <h3>Project Details</h3>
                <form id="projectForm">
                    <div class="form-group">
                        <label for="projectName">Project Name:</label>
                        <input type="text" id="projectName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="estimatedBudget">Estimated Budget:</label>
                        <input type="number" id="estimatedBudget" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="projectDescription">Project Description:</label>
                        <textarea id="projectDescription" class="form-control" placeholder="Project Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline:</label>
                        <input type="date" id="deadline" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select id="projectStatus" class="form-control" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                            <option value="Planned">Planned</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                    <button type="button" id="saveButton" class="btn btn-success">Save Changes</button>
                    <button type="button" id="closeButton" class="btn btn-secondary">Close</button>
                </form>
            </div>
        </div>
    </main>
   </section>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT+z0G2z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5z5" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
   <script src="projects.js"></script>

</body>
</html>