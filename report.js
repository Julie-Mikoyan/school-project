function generateReport() {
    const reportOutput = document.getElementById('report-output');
    reportOutput.innerHTML = `
        <h3>Project Report</h3>
        <p>Project Name: Construction Project A</p>
        <p>Description: This project involves the construction of a commercial building.</p>
        <p>Current Phase: Foundation</p>
        <p>Completion: 40%</p>
        <p>Tasks Completed: 1</p>
        <p>Tasks In Progress: 1</p>
        <p>Tasks Not Started: 1</p>
    `;
}