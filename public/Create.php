<?php
    include '../Config/db.php';
    if(isset($_POST['email'])){

        // Personal Information
        $first_Name = $_POST['first_Name'];
        $last_Name = $_POST['last_Name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $cnic_No = $_POST['cnic_No'];
        $Phone_Number = $_POST['Phone_Number'];
        $Date_of_Birth = $_POST['Date_of_Birth'];
        $Address = $_POST['Address'];

        if($email == "" || $gender == ""){
            die("Email and gender are required");
        }

        $sql = "INSERT INTO personal_information (first_Name, last_Name, gender, email, cnic_No, Phone_Number, Date_of_Birth, Address) VALUES ('$first_Name', '$last_Name', '$gender', '$email', '$cnic_No', '$Phone_Number', '$Date_of_Birth', '$Address')";
        // echo $sql;

        if(!$conn->query($sql)){
            die("ERROR: $sql <br> $conn->error");
        }

        $student_id = $conn->insert_id;

        // University Information
        $university_Name = $_POST['university_Name'];
        $Roll_No = $_POST['Roll_No'];
        $Department = $_POST['Department'];
        $CGPA = $_POST['CGPA'];
        $Passing_Year = $_POST['Passing_Year'];
        $Semester = $_POST['Semester'];

        $sql2 = "INSERT INTO university_information (sno, university_Name, Roll_No, Department, CGPA, Passing_Year, Semester) VALUES ('$student_id', '$university_Name', '$Roll_No', '$Department', '$CGPA', '$Passing_Year', '$Semester')";

        if(!$conn->query($sql2)){
            die("ERROR: $sql2 <br> $conn->error");
        }
        

        // Skills Categories
        $Technical_Skills = $_POST['Technical_Skills'];
        $Soft_Skills = $_POST['Soft_Skills'];

        $sql3 = "INSERT INTO skills_categories (sno, Technical_Skills, Soft_Skills) VALUES ('$student_id', '$Technical_Skills', '$Soft_Skills')";

        if(!$conn->query($sql3)){
            die("ERROR: $sql3 <br> $conn->error");
        }

        // Certifiicates
        $Course_Name = $_POST['Course_Name'];
        $About_Certificate = $_POST['About_Certificate'];
        $Upload_Certificate = $_FILES['Upload_Certificate']['name'] ?? '';

        $sql4 = "INSERT INTO certificates (sno, Course_Name, About_Certificate, Upload_Certificate) VALUES ('$student_id', '$Course_Name', '$About_Certificate', '$Upload_Certificate')";

        if(!$conn->query($sql4)){
            die("ERROR: $sql4 <br> $conn->error");
        }

        $Project_Name = $_POST['Project_Name'];
        $About_Project = $_POST['About_Project'];
        $Upload = $_FILES['Upload']['name'] ?? '';

        $sql5 = "INSERT INTO projects (sno, Project_Name, About_Project, Upload) VALUES ('$student_id', '$Project_Name', '$About_Project', '$Upload')";

        if(!$conn->query($sql5)){
            die("ERROR: $sql5 <br> $conn->error");
        }

        // Work Experience
        $company = $_POST['company'];
        $position = $_POST['position'];
        $about = $_POST['about'];
        $job_type = $_POST['job_type'];
        
        $sql6 = "INSERT INTO work_experience (sno, company, position, about, job_type) VALUES ('$student_id', '$company', '$position', '$about', '$job_type')";

        if(!$conn->query($sql6)){
            die("ERROR: $sql6 <br> $conn->error");
        }

        // Internship Details
        $Position_Title = $_POST['Position_Title'];
        $Type = $_POST['Type'];
        $Internship_Duration = $_POST['Internship_Duration'];
        $Stipend = $_POST['Stipend'];

        $sql7 = "INSERT INTO internship_details (sno, Position_Title, Type, Internship_Duration, Stipend) VALUES ('$student_id', '$Position_Title', '$Type', '$Internship_Duration', '$Stipend')";

        if(!$conn->query($sql7)){
            die("ERROR: $sql7 <br> $conn->error");
        }

        $insert = true;
        $conn->close();

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Records</title>
    <link rel="stylesheet" href="../assets/css/AddRecords.css">
</head>
<body>
    <div>
        <h1 id="Name">Student Skills & Internship Management System</h1><br>
        <h1>Application Form</h1>
        <form action="Create.php" method="POST" enctype="multipart/form-data">
            <!-- Personal Information -->
            <h2>Personal Information</h2>
            <h3>First Name</h3>
            <input type="text" name="first_Name" placeholder="First Name">
            <h3>Last Name</h3>
            <input type="text" name="last_Name" placeholder="Last Name">
            <h3>Gender</h3>
            <select name="gender">
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            </select>
            <h3>Email</h3>
            <input type="email" name="email" placeholder="Enter Email">
            <h3>CNIC No</h3>
            <input type="text" name="cnic_No" placeholder="Enter CNIC">
            <h3>Phone Number</h3>
            <input type="text" name="Phone_Number" placeholder="Enter Phone Number">
            <h3>Date of Birth</h3>
            <input type="date" name="Date_of_Birth">
            <h3>Address</h3>
            <textarea name="Address" placeholder="Enter Full Address" rows="3"></textarea>

            <!-- Academic Information -->
            <h2>University Information</h2>
            <h3>University Name</h3>
            <select name="university_Name">
            <option value="">Select</option>
            <option value="NUML">NUML</option>
            <option value="FUSST">FUSST</option>
            <option value="NUST">NUST</option>
            <option value="IST">IST</option>
            <option value="Air">Air</option>
            <option value="FAST">FAST</option>
            <option value="COMSAT">COMSAT</option>
            <option value="IIUI">IIUI</option>
            </select>
            <h3>University Roll No</h3>
            <input type="number" name="Roll_No" placeholder="Enter Roll No">
            <h3>Department</h3>
            <select name="Department">
            <option value="">Select</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Software Engineering">Software Engineering</option>
            <option value="Accounting & Finance">Accounting & Finance</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="Electrical Engineering">Electrical Engineering</option>
            <option value="Aviation">Aviation</option>
            <option value="Business Administration">Business Administration</option>
            </select>
            <h3>CGPA</h3>
            <input type="text" name="CGPA" placeholder="Enter CGPA">
            <h3>Passing Year</h3>
            <input type="month" name="Passing_Year">
            <h3>Semester</h3>
            <select name="Semester">
            <option value="">Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="Completed">Completed</option>
            </select>

            <!-- Skills Categories -->
            <h2>Skills Information</h2>
            <h3>Technical Skills</h3>
            <textarea name="Technical_Skills" placeholder="Technical Skills" rows="2"></textarea>
            <h3>Soft Skills</h3>
            <textarea name="Soft_Skills" placeholder="Soft Skills" rows="2"></textarea>

            <!-- Certificates -->
            <h2>Certificates</h2>
            <div id="Certificate">
            <div class="input-group">
            <h3>Course Name</h3>
            <input type="text" name="Course_Name" placeholder="Enter course name">
            <h3>About Certificate</h3>
            <textarea name="About_Certificate" placeholder="Enter about certificates" rows="2"></textarea>
            <h3>Upload Certificate</h3>
            <input type="file" name="Upload_Certificate">
            </div>
            </div>
            <button type="button" onclick="addCertificate()">+ Add Certificate</button><br>

            <!-- Projects -->
            <h2>Projects</h2>
            <div id="Projects">
            <div class="input-group">
            <h3>Project Name</h3>
            <input type="text" name="Project_Name" placeholder="Enter name of project">
            <h3>About Project</h3>
            <textarea name="About_Project" placeholder="Enter project details" rows="2"></textarea>
            <h3>Upload</h3>
            <input type="file" name="Upload">
            </div>
            </div>
            <button type="button" onclick="addProject()">+ Add Project</button><br>

            <!-- Work Experience -->
            <h2>Work Experience</h2>
            <h3>Company</h3>
            <select name="company">
            <option value="">Select</option>
            <option value="Google">Google</option>
            <option value="Microsoft">Microsoft</option>
            <option value="Amazon">Amazon</option>
            <option value="Freelancer">Freelancer</option>
            <option value="Fiverr">Fiverr</option>
            <option value="Upwork">Upwork</option>
            <option value="Private">Private</option>
            <option value="Other">Other</option>
            </select>
            <h3>Position</h3>
            <select name="position">
            <option value="">Select</option>
            <option value="Web Development">Web Development</option>
            <option value="Data Analyst">Data Analyst</option>
            <option value="App Development">App Development</option>
            <option value="Game Development">Game Development</option>
            <option value="Project Management">Project Management</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Ethical Hacking">Ethical Hacking</option>
            <option value="Data Entry">Data Entry</option>
            </select>
            <h3>About</h3>
            <textarea name="about" placeholder="Enter work experience" rows="2"></textarea>
            <h3>Job Type</h3>
            <textarea name="job_type" placeholder="Remote or Onsite" rows="1"></textarea>

            <!-- Internship -->
            <h2>Internship Details</h2>
            <h3>Position Title</h3>
            <select name="Position_Title">
            <option value="">Select</option>
            <option value="Web Development">Web Development</option>
            <option value="Data Analyst">Data Analyst</option>
            <option value="App Development">App Development</option>
            <option value="Game Development">Game Development</option>
            <option value="Project Management">Project Management</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Ethical Hacking">Ethical Hacking</option>
            <option value="Data Entry">Data Entry</option>
            </select>
            <h3>Duration</h3>
            <select name="Internship_Duration">
            <option value="">Select</option>
            <option value="3 Month">3 Month</option>
            <option value="6 Month">6 Month</option>
            <option value="1 Year">1 Year</option>
            </select>
            <h3>Stipend</h3>
            <textarea name="Stipend" placeholder="Paid or Unpaid" rows="1"></textarea>
            <h3>Job Type</h3>
            <textarea name="Type" placeholder="Remote or Onsite" rows="1"></textarea>

            <!-- Buttons -->
            <button type="submit" type="button">Submit</button>
            <button type="button"><a href="Home Page.html">Back to home</a></button>
        </form>
    </div>

    <!-- JS Add More -->
    <script src="../assets/js/script.js"></script>

    <?php if (isset($insert) && $insert === true) { ?>
    <script>
        window.location.href = "index.php";
    </script>
    <?php } ?>



</body>
</html>