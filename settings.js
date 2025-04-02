document.getElementById('settings-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    const projectName = document.getElementById('project-name').value;
    const projectDescription = document.getElementById('project-description').value;

    alert(`Settings Saved!\nProject Name: ${projectName}\nDescription: ${projectDescription}`);
});