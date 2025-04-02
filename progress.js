const milestones = [
    { name: 'Project Kickoff', date: '2025-01-01', completed: true },
    { name: 'Design Phase Complete', date: '2025-02-15', completed: true },
    { name: 'Construction Start', date: '2025-03-01', completed: false },
    { name: 'Final Inspection', date: '2025-06-01', completed: false },
];

const totalMilestones = milestones.length;
const completedMilestones = milestones.filter(milestone => milestone.completed).length;
const completionPercentage = (completedMilestones / totalMilestones) * 100;

document.getElementById('overallProgressFill').style.width = `${completionPercentage}%`;
document.getElementById('completionPercentage').innerText = `Completion: ${completionPercentage.toFixed(0)}%`;

milestones.forEach(milestone => {
    const milestoneItem = document.createElement('li');
    milestoneItem.textContent = `${milestone.name} - ${milestone.date} - ${milestone.completed ? 'Completed' : 'Pending'}`;
    document.getElementById('milestoneList').appendChild(milestoneItem);
});