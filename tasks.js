const tasks = [
    { taskName: 'Design Phase', projectName: 'New Office Building', assignedTo: 'John Doe', dueDate: '2025-04-15', status: 'In Progress', completionPercentage: 50 },
    { taskName: 'Foundation Work', projectName: 'New Office Building', assignedTo: 'Jane Smith', dueDate: '2025-05-01', status: 'Pending', completionPercentage: 0 },
    { taskName: 'Electrical Setup', projectName: 'Residential Complex', assignedTo: 'Mike Johnson', dueDate: '2025-06-10', status: 'Pending', completionPercentage: 0 },
    { taskName: 'Landscaping', projectName: 'Park Renovation', assignedTo: 'Emily Davis', dueDate: '2025-04-20', status: 'Done', completionPercentage: 100 },
    { taskName: 'Final Inspection', projectName: 'Bridge Construction', assignedTo: 'Chris Lee', dueDate: '2025-01-05', status: 'Pending', completionPercentage: 0 },
];

function renderTasks(filteredTasks) {
    const tasksTableBody = document.querySelector('#tasksTable tbody');
    tasksTableBody.innerHTML = ''; // Clear existing rows

    filteredTasks.forEach(task => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${task.taskName}</td>
            <td>${task.projectName}</td>
            <td>${task.assignedTo}</td>
            <td>${task.dueDate}</td>
            <td>${task.status}</td>
            <td>${task.completionPercentage}%</td>
        `;
        tasksTableBody.appendChild(row);
    });
}

document.getElementById('filterButton').addEventListener('click', () => {
    const projectFilter = document.getElementById('projectFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;

    const filteredTasks = tasks.filter(task => {
        const matchesProject = projectFilter === '' || task.projectName === projectFilter;
        const matchesStatus = statusFilter === '' || task.status === statusFilter;
        return matchesProject && matchesStatus;
    });

    renderTasks(filteredTasks);
});

// Handle form submission to add a new task
document.getElementById('taskForm').addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent form submission

    const newTask = {
        taskName: document.getElementById('taskName').value,
        projectName: document.getElementById('projectName').value,
        assignedTo: document.getElementById('assignedTo').value,
        dueDate: document.getElementById('dueDate').value,
        status: document.getElementById('status').value,
        completionPercentage: parseInt(document.getElementById('completionPercentage').value)
    };

    tasks.push(newTask); // Add new task to the tasks array
    renderTasks(tasks); // Re-render the tasks table
    document.getElementById('taskForm').reset(); // Reset the form
});

// Initial render
renderTasks(tasks);