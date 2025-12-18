<?php
    $insert = false;
    if(isset($_POST['email'])){
        $SERVER = "localhost";
        $username = "root";
        $password = "";
        $database = "student_skills_and_internship_management_system";


        $con = mysqli_connect($SERVER, $username, $password, $database);

        if(!$con){
            die("Connection of this database failed due to ". mysqli_connect_error());
        }
        echo "Success connecting to the db";

        // Personal Information
        $first_Name = $_POST['first_Name'];
        $last_Name = $_POST['last_Name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $cnic_No = $_POST['cnic_No'];
        $Phone_Number = $_POST['Phone_Number'];
        $Date_of_Birth = $_POST['Date_of_Birth'];
        $Address = $_POST['Address'];

        $sql = "INSERT INTO `personal_information` (`first_Name`, `last_Name`, `gender`, `email`, `cnic_No`, `Phone_Number`, `Date_of_Birth`, `Address`) VALUES ('$first_Name', '$last_Name', '$gender', '$email', '$cnic_No', '$Phone_Number', '$Date_of_Birth', '$Address');";
        // echo $sql;

        if($con->query($sql) == true){
            $insert = true;
        }
        else {
            echo "ERROR: $sql <br> $con->error";
        }

        $student_id = $con->insert_id;

        // University Information
        $university_name = $_POST['university_name'];
        $university_rollNo = $_POST['university_rollNo'];
        $department = $_POST['department'];
        $cgpa = $_POST['cgpa'];
        $passing_year = $_POST['passing_year'];
        $semester = $_POST['semester'];

        $sql2 = "INSERT INTO `university_information` (`sno`, `university_name`, `university_rollNo`, `department`, `cgpa`, `passing_year`, `semester`) VALUES ('$student_id', '$university_name', '$university_rollNo', '$department', '$cgpa', '$passing_year', '$semester')";

        if($con->query($sql2) == true){
            $insert = true;
        }
        else{
            echo "ERROR: $sql2 <br> $con->error";
        }
        
        // Skills Categories
        $Technical_Skills = $_POST['Technical_Skills'];
        $Soft_Skills = $_POST['Soft_Skills'];

        $sql3 = "INSERT INTO `skills_categories` (`sno`, `Technical_Skills`, `Soft_Skills`) VALUES ('$student_id', '$Technical_Skills', '$Soft_Skills')";

        if($con->query($sql3) == true){
            $insert = true;
        }
        else{
            echo "ERROR: $sql3 <br> $con->error";
        }

        // Work Experience
        $company = $_POST['company'];
        $position = $_POST['position'];
        $about = $_POST['about'];
        $job_type = $_POST['job_type'];
        

        $sql4 = "INSERT INTO `work_experience` (`sno`, `company`, `position`, `about`, `job_type`) VALUES ('$student_id', '$company', '$position', '$about', '$job_type')";

        if($con->query($sql4) == true){
            $insert = true;
        }
        else{
            echo "ERROR: $sql4 <br> $con->error";
        }

        // Internship Details
        $Position_Title = $_POST['Position_Title'];
        $job_Type = $_POST['job_Type'];
        $Internship_Duration = $_POST['Internship_Duration'];
        $Stipend = $_POST['Stipend'];

        $sql5 = "INSERT INTO `internship_details` (`sno`, `Position_Title`, `job_type`, `Internship_Duration`, `Stipend`) VALUES ('$student_id', '$Position_Title', '$job_Type', '$Internship_Duration', '$Stipend')";

        if($con->query($sql5) == true){
            $insert = true;
        }
        else{
            echo "ERROR: $sql5 <br> $con->error";
        }

        $con->close();

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Records</title>
    <link rel="stylesheet" href="../css/AddRecords.css">
</head>
<body>
    <div>
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
            <option value="Select">Select</option>
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
            <select name="university_name">
            <option value="Select">Select</option>
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
            <input type="number" name="university_rollNo" placeholder="Enter Roll No">
            <h3>Department</h3>
            <select name="department">
            <option value="Select">Select</option>
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
            <input type="text" name="cgpa" placeholder="Enter CGPA">
            <h3>Passing Year</h3>
            <input type="month" name="passing_year">
            <h3>Semester</h3>
            <select name="semester">
            <option value="Select">Select</option>
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
            <input type="text" name="certificate_name[]" placeholder="Enter course name">
            <h3>About Certificate</h3>
            <textarea name="Certificates" placeholder="Enter about certificates" rows="2"></textarea>
            <h3>Upload Certificate</h3>
            <input type="file" name="certificate_file[]">
            </div>
            </div>
            <button type="button" onclick="addCertificate()">+ Add Certificate</button><br>

            <!-- Projects -->
            <h2>Projects</h2>
            <div id="Projects">
            <div class="input-group">
            <h3>Project Name</h3>
            <input type="text" name="project_name[]" placeholder="Enter name of project">
            <h3>About Project</h3>
            <textarea name="project_description[]" placeholder="Enter project details" rows="2"></textarea>
            <h3>Upload</h3>
            <input type="file" name="project_file[]">
            </div>
            </div>
            <button type="button" onclick="addProject()">+ Add Project</button><br>

            <!-- Work Experience -->
            <h2>Work Experience</h2>
            <h3>Company</h3>
            <select name="company">
            <option value="Select">Select</option>
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
            <option value="Select">Select</option>
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
            <option value="Select">Select</option>
            <option value="Web Development">Web Development</option>
            <option value="Data Analyst">Data Analyst</option>
            <option value="App Development">App Development</option>
            <option value="Game Development">Game Development</option>
            <option value="Project Management">Project Management</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Ethical Hacking">Ethical Hacking</option>
            <option value="Data Entry">Data Entry</option>
            </select>
            <h3>Job Type</h3>
            <textarea name="job_Type" placeholder="Remote or Onsite" rows="1"></textarea>
            <h3>Duration</h3>
            <select name="Internship_Duration">
            <option value="Select">Select</option>
            <option value="3 Month">3 Month</option>
            <option value="6 Month">6 Month</option>
            <option value="1 Year">1 Year</option>
            </select>
            <h3>Stipend</h3>
            <textarea name="Stipend" placeholder="Paid or Unpaid" rows="1"></textarea>

            <!-- Buttons -->
            <button type="submit">Submit</button>
            <button type="button"><a href="Home Page.html">Back to home</a></button>
        </form>
    </div>

    <!-- JS Add More -->
    <script src=""></script>

</body>
</html>