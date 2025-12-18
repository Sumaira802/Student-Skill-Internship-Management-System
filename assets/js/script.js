function addCertificate() {
    const container = document.getElementById('Certificate');
    const div = document.createElement('div');
    div.className = 'input-group';
    div.innerHTML = `<h3>Course Name</h3><input type="text" name="certificate_name[]" placeholder="Enter course name"><h3>Certificate Upload</h3><input type="file" name="certificate_file[]">`;
    container.appendChild(div);
}

function addProject() {
    const container = document.getElementById('Projects');
    const div = document.createElement('div');
    div.className = 'input-group';
    div.innerHTML = `<h3>Project Name</h3><input type="text" name="project_name[]" placeholder="Enter name of project"><h3>About Project</h3><textarea name="project_description[]" placeholder="Enter project details" rows="2"></textarea><h3>Upload</h3><input type="file" name="project_file[]">`;
    container.appendChild(div);
}