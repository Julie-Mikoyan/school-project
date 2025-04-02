// Sample password for demonstration purposes
const storedPassword = "yourSecurePassword"; // Replace with your actual password logic

document.getElementById('newProjectBtn').addEventListener('click', function() {
    document.getElementById('projectDetailsModal').style.display = 'block';
    document.getElementById('projectForm').reset(); // Reset the form for new project
});

document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('projectDetailsModal').style.display = 'none';
    document.getElementById('projectForm').reset(); // Reset the form when closing
});

document.getElementById('saveButton').addEventListener('click', function() {
    const projectName = document.getElementById('projectName').value;
    const estimatedBudget = document.getElementById('estimatedBudget').value;
    const projectDescription = document.getElementById('projectDescription').value;
    const startDate = document.getElementById('startDate').value;
    const deadline = document.getElementById('deadline').value;
    const projectStatus = document.getElementById('projectStatus').value; // Get the status

    // Prepare the project data
    const projectData = {
        projectName,
        estimatedBudget,
        projectDescription,
        startDate,
        deadline,
        projectStatus // Include the status in the data sent to the server
    };

    // Send data to the server to add or update the project
    fetch('/api/projects', {
        method: 'POST', // Use 'PUT' for updates if necessary
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(projectData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        document.getElementById('projectDetailsModal').style.display = 'none';
        addProjectToList(data.project); // Assuming the response contains the new project
    })
    .catch(error => console.error('Error:', error));
});

// Function to handle project deletion
function deleteProject(projectName) {
    const password = prompt("Please enter your password to confirm deletion:");
    if (password === storedPassword) {
        if (confirm(`Are you sure you want to delete the project "${projectName}"?`)) {
            // Logic to delete the project from the server
            fetch('/api/projects', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ projectName })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                // Optionally remove the project from the UI
                removeProjectFromList(projectName);
            })
            .catch(error => console.error('Error:', error));
        }
    } else {
        alert("Incorrect password. Deletion cancelled.");
    }
}

// Function to remove project from the list in the UI
function removeProjectFromList(projectName) {
    const projectItems = document.querySelectorAll('#activeProjects li, #completedProjects li');
    projectItems.forEach(item => {
        if (item.textContent.includes(projectName)) {
            item.remove();
        }
    });
}

// Example of how to add a project to the list (this should be called after a successful save)
function addProjectToList(project) {
    const projectItem = document.createElement('li');
    projectItem.textContent = `${project.projectName} - Status: ${project.projectStatus}`; // Ensure this matches your API response
    
    // Create a delete button for each project
    const deleteBtn = document.createElement('button');
    deleteBtn.textContent = 'Delete';
    deleteBtn.className = 'btn btn-danger btn-sm';
    deleteBtn.style.marginLeft = '10px';
    
    // Add event listener for delete button
    deleteBtn.addEventListener('click', function() {
        deleteProject(project.projectName);
    });

    projectItem.appendChild(deleteBtn);

    if (project.projectStatus === 'Ongoing') {
        document.getElementById('activeProjects').appendChild(projectItem);
    } else {
        document.getElementById('completedProjects').appendChild(projectItem);
    }
}