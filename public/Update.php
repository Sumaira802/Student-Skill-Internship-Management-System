<?php
    include '../Config/db.php';

    if(isset($_GET['sno'])){
        $sno = $_GET['sno'];
    }

    $result = mysqli_query($conn, "SELECT * FROM personal_information WHERE sno = '$sno'");
    $row = mysqli_fetch_assoc($result) ?? [];


    $result1 = mysqli_query($conn, "SELECT * FROM university_information WHERE sno = '$sno'");
    $row1 = mysqli_fetch_assoc($result1) ?? [];


    $result2 = mysqli_query($conn, "SELECT * FROM skills_categories WHERE sno = '$sno'");
    $row2 = mysqli_fetch_assoc($result2) ?? [];


    $result3 = mysqli_query($conn, "SELECT * FROM certificates WHERE sno = '$sno'");
    $row3 = mysqli_fetch_assoc($result3) ?? [];


    $result4 = mysqli_query($conn, "SELECT * FROM projects WHERE sno = '$sno'");
    $row4 = mysqli_fetch_assoc($result4) ?? [];
    

    $result5 = mysqli_query($conn, "SELECT * FROM work_experience WHERE sno = '$sno'");
    $row5 = mysqli_fetch_assoc($result5) ?? [];


    $result6 = mysqli_query($conn, "SELECT * FROM internship_details WHERE sno = '$sno'");
    $row6 = mysqli_fetch_assoc($result6) ?? [];
?>

<?php
    if(isset($_POST['update_students'])){
        if(isset($_GET['sno'])){
            $sno = $_GET['sno'];
        }

        $first_Name = $_POST['first_Name'];
        $last_Name = $_POST['last_Name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $cnic_No = $_POST['cnic_No'];
        $Phone_Number = $_POST['Phone_Number'];
        $Date_of_Birth = $_POST['Date_of_Birth'];
        $Address = $_POST['Address'];

        $sql = "UPDATE personal_information SET first_Name = '$first_Name', last_Name = '$last_Name', gender = '$gender', email = '$email', cnic_No = '$cnic_No', Phone_Number = '$Phone_Number', Date_of_Birth = '$Date_of_Birth', Address = '$Address' WHERE sno = '$sno'";
        
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die("query failed".mysqli_error($conn));
        }

        // University Information
        $university_Name = $_POST['university_Name'];
        $Roll_No = $_POST['Roll_No'];
        $Department = $_POST['Department'];
        $CGPA = $_POST['CGPA'];
        $Passing_Year = $_POST['Passing_Year'];
        $Semester = $_POST['Semester'];

        $sql1 = "UPDATE university_information SET university_Name = '$university_Name', Roll_No = '$Roll_No', Department = '$Department', CGPA = '$CGPA', Passing_Year = '$Passing_Year', Semester = '$Semester' WHERE sno = '$sno'";

        $result1 = mysqli_query($conn, $sql1);
        if(!$result1){
            die("query failed".mysqli_error($conn));
        }

        $Technical_Skills = $_POST['Technical_Skills'];
        $Soft_Skills = $_POST['Soft_Skills'];

        $sql2 = "UPDATE skills_categories SET Technical_Skills = '$Technical_Skills', Soft_Skills = 'Soft_Skills' WHERE sno = '$sno'";

        $result2 = mysqli_query($conn, $sql2);
        if(!$result2){
            die("query failed".mysqli_error($conn));
        }

        $Course_Name = $_POST['Course_Name'];
        $About_Certificate = $_POST['About_Certificate'];
        $Upload_Certificate = $_FILES['Upload_Certificate']['name'] ?? '';

        $sql3 = "UPDATE certificates SET Course_Name = '$Course_Name', About_Certificate = '$About_Certificate', Upload_Certificate = '$Upload_Certificate' WHERE sno = '$sno'";
    
        $result3 = mysqli_query($conn, $sql3);
        if(!$result3){
            die("query failed".mysqli_error($conn));
        }

        $Project_Name = $_POST['Project_Name'];
        $About_Project = $_POST['About_Project'];
        $Upload = $_FILES['Upload']['name'] ?? '';

        $sql4 = "UPDATE projects SET Project_Name = '$Project_Name', About_Project = '$About_Project', Upload = '$Upload' WHERE sno = '$sno'";
    
        $result4 = mysqli_query($conn, $sql4);
        if(!$result4){
            die("query failed".mysqli_error($conn));
        }

        $company = $_POST['company'];
        $position = $_POST['position'];
        $about = $_POST['about'];
        $job_type = $_POST['job_type'];
        
        $sql5 = "UPDATE work_experience SET company = '$company', position = '$position', about = '$about', job_type = '$job_type' WHERE sno = '$sno'";

        $result5 = mysqli_query($conn, $sql5);
        if(!$result5){
            die("query failed".mysqli_error($conn));
        }

        $Position_Title = $_POST['Position_Title'];
        $Type = $_POST['Type'];
        $Internship_Duration = $_POST['Internship_Duration'];
        $Stipend = $_POST['Stipend'];

        $sql6 = "UPDATE internship_details SET Position_Title = '$Position_Title', Type = '$Type', Internship_Duration = '$Internship_Duration', Stipend = '$Stipend' WHERE sno = '$sno'";
    
        $result6 = mysqli_query($conn, $sql6);
        if(!$result6){
            die("query failed".mysqli_error($conn));
        } 
        
        else {
            header("Location: index.php?msg=updated");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete * Update Record</title>
    <link rel="stylesheet" href="../assets/css/AddRecords.css">
    <style>
    input[type=submit] {
        background-color: #8fb6d7;
        padding: 12px 22px;
        font-size: 16px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        margin-top: 12px;
    }

    input[type=submit]:hover {
        background-color: #7ea4c8;
    }

    input[type=submit] {
        color: black;
        text-decoration: none;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <h1>Update Record</h1>
    <form action="Update.php?sno=<?php echo $sno; ?>" method="POST" enctype="multipart/form-data">
        <!-- Personal Information -->
        <h2>Personal Information</h2>
        <h3>First Name</h3>
        <input type="text" name="first_Name" placeholder="First Name" value="<?=$row['first_Name'] ?? '' ?>">
        <h3>Last Name</h3>
        <input type="text" name="last_Name" placeholder="Last Name" value="<?=$row['last_Name'] ?? '' ?>">
        <h3>Gender</h3>
        <select name="gender">
        <option value="Select">Select</option>
        <option value="Male" <?=(($row['gender'] ?? '') == "Male") ? "selected": ""?>>Male</option>
        <option value="Female" <?=(($row['gender'] ?? '') == "Female") ? "selected": ""?>>Female</option>
        <option value="Other" <?=(($row['gender'] ?? '') == "Other") ? "selected": ""?>>Other</option>
        </select>
        <h3>Email</h3>
        <input type="email" name="email" placeholder="Enter Email" value="<?= $row['email'] ?? '' ?>">
        <h3>CNIC No</h3>
        <input type="text" name="cnic_No" placeholder="Enter CNIC" value="<?= $row['cnic_No'] ?? '' ?>">
        <h3>Phone Number</h3>
        <input type="text" name="Phone_Number" placeholder="Enter Phone Number" value="<?= $row['Phone_Number'] ?? '' ?>">
        <h3>Date of Birth</h3>
        <input type="date" name="Date_of_Birth" value="<?= $row['Date_of_Birth'] ?? '' ?>">
        <h3>Address</h3>
        <textarea name="Address"><?= $row['Address'] ?? '' ?></textarea>

        <!-- Academic Information -->
        <h2>University Information</h2>
        <h3>University Name</h3>
        <select name="university_Name">
        <option value="Select">Select</option>
        <option value="NUML" <?= (($row1['university_Name'] ?? '') == "NUML") ? "selected": ""?>>NUML</option>
        <option value="FUSST" <?= (($row1['university_Name'] ?? '') == "FUSST") ? "selected": ""?>>FUSST</option>
        <option value="NUST" <?= (($row1['university_Name'] ?? '') == "NUST") ? "selected": ""?>>NUST</option>
        <option value="IST" <?= (($row1['university_Name'] ?? '') == "IST") ? "selected": ""?>>IST</option>
        <option value="Air" <?= (($row1['university_Name'] ?? '') == "Air") ? "selected": ""?>>Air</option>
        <option value="FAST" <?= (($row1['university_Name'] ?? '') == "FAST") ? "selected": ""?>>FAST</option>
        <option value="COMSAT" <?= (($row1['university_Name'] ?? '') == "COMSAT") ? "selected": ""?>>COMSAT</option>
        <option value="IIUI" <?= (($row1['university_Name'] ?? '') == "IIUI") ? "selected": ""?>>IIUI</option>
        </select>
        <h3>University Roll No</h3>
        <input type="number" name="Roll_No" placeholder="Enter Roll No" value="<?= $row1['Roll_No'] ?? '' ?>">
        <h3>Department</h3>
        <select name="Department">
        <option value="Select" <?= (($row1['Department'] ?? '') == "Select") ? "selected": ""?>>Select</option>
        <option value="Information Technology" <?= (($row1['Department'] ?? '') == "Information Technology") ? "selected": ""?>>Information Technology</option>
        <option value="Computer Science" <?= (($row1['Department'] ?? '') == "Computer Science") ? "selected": ""?>>Computer Science</option>
        <option value="Software Engineering" <?= (($row1['Department'] ?? '') == "Software Engineering") ? "selected": ""?>>Software Engineering</option>
        <option value="Accounting & Finance" <?= (($row1['Department'] ?? '') == "Accounting & Finance") ? "selected": ""?>>Accounting & Finance</option>
        <option value="Mechanical Engineering" <?= (($row1['Department'] ?? '') == "Mechanical Engineering") ? "selected": ""?>>Mechanical Engineering</option>
        <option value="Electrical Engineering" <?= (($row1['Department'] ?? '') == "Electrical Engineering") ? "selected": ""?>>Electrical Engineering</option>
        <option value="Aviation" <?= (($row1['Department'] ?? '') == "Aviation") ? "selected": ""?>>Aviation</option>
        <option value="Business Administration" <?= (($row1['Department'] ?? '') == "Business Administration") ? "selected": ""?>>Business Administration</option>
        </select>
        <h3>CGPA</h3>
        <input type="text" name="CGPA" placeholder="Enter CGPA" value="<?= $row1['CGPA'] ?? '' ?>">
        <h3>Passing Year</h3>
        <input type="month" name="Passing_Year" value="<?= !empty($row1['Passing_Year']) ? date('Y-m', strtotime($row1['Passing_Year'])) : '' ?>">
        <h3>Semester</h3>
        <select name="Semester">
        <option value="Select" <?= (($row1['Semester'] ?? '') == "Select") ? "selected": ""?>>Select</option>
        <option value="1" <?= (($row1['Semester'] ?? '') == "1") ? "selected": ""?>>1</option>
        <option value="2" <?= (($row1['Semester'] ?? '') == "2") ? "selected": ""?>>2</option>
        <option value="3" <?= (($row1['Semester'] ?? '') == "3") ? "selected": ""?>>3</option>
        <option value="4" <?= (($row1['Semester'] ?? '') == "4") ? "selected": ""?>>4</option>
        <option value="5" <?= (($row1['Semester'] ?? '') == "5") ? "selected": ""?>>5</option>
        <option value="6" <?= (($row1['Semester'] ?? '') == "6") ? "selected": ""?>>6</option>
        <option value="7" <?= (($row1['Semester'] ?? '') == "7") ? "selected": ""?>>7</option>
        <option value="8" <?= (($row1['Semester'] ?? '') == "8") ? "selected": ""?>>8</option>
        <option value="Completed" <?= (($row1['Semester'] ?? '') == "Completed") ? "selected": ""?>>Completed</option>
        </select>

        <!-- Skills Categories -->
        <h2>Skills Categories</h2>
        <h3>Technical Skills</h3>
        <textarea name="Technical_Skills"><?= $row2['Technical_Skills'] ?? '' ?></textarea>
        <h3>Soft Skills</h3>
        <textarea name="Soft_Skills"><?= $row2['Soft_Skills'] ?? '' ?></textarea>

        <!-- Certificates -->
        <h2>Certificates</h2>
        <div id="Certificate">
        <div class="input-group">
        <h3>Course Name</h3>
        <input type="text" name="Course_Name" placeholder="Enter course name" value="<?= $row3['Course_Name'] ?? '' ?>">
        <h3>About Certificate</h3>
        <textarea name="About_Certificate"><?= $row3['About_Certificate'] ?? '' ?></textarea>
        <h3>Upload Certificate</h3>
        <input type="file" name="Upload_Certificate">
        <p>Uploaded: <?= $row3['Upload_Certificate'] ?></p>

        </div>
        </div>
        <button type="button" onclick="addCertificate()">+ Add Certificate</button><br>

        <!-- Projects -->
        <h2>Projects</h2>
        <div id="Projects">
        <div class="input-group">
        <h3>Project Name</h3>
        <input type="text" name="Project_Name" placeholder="Enter name of project" value="<?= $row4['Project_Name'] ?? '' ?>">
        <h3>About Project</h3>
        <textarea name="About_Project"><?= $row4['About_Project'] ?? '' ?></textarea>
        <h3>Upload</h3>
        <input type="file" name="Upload">
        <p>Uploaded: <?= $row3['Upload_Certificate'] ?></p>
        </div>
        </div>
        <button type="button" onclick="addProject()">+ Add Project</button><br>

        <!-- Work Experience -->
        <h2>Work Experience</h2>
        <h3>Company</h3>
        <select name="company">
        <option value="Select" <?= (($row5['company'] ?? '') == "Select") ? "selected": ""?>>Select</option>
        <option value="Google" <?= (($row5['company'] ?? '') == "Google") ? "selected": ""?>>Google</option>
        <option value="Microsoft" <?= (($row5['company'] ?? '') == "Microsoft") ? "selected": ""?>>Microsoft</option>
        <option value="Amazon" <?= (($row5['company'] ?? '') == "Amazon") ? "selected": ""?>>Amazon</option>
        <option value="Freelancer" <?= (($row5['company'] ?? '') == "Freelancer") ? "selected": ""?>>Freelancer</option>
        <option value="Fiverr" <?= (($row5['company'] ?? '') == "Fiverr") ? "selected": ""?>>Fiverr</option>
        <option value="Upwork" <?= (($row5['company'] ?? '') == "Upwork") ? "selected": ""?>>Upwork</option>
        <option value="Private" <?= (($row5['company'] ?? '') == "Private") ? "selected": ""?>>Private</option>
        <option value="Other" <?= (($row5['company'] ?? '') == "Other") ? "selected": ""?>>Other</option>
        </select>
        <h3>Position</h3>
        <select name="position">
        <option value="Select" <?= (($row5['position'] ?? '') == "Select") ? "selected": ""?>>Select</option>
        <option value="Web Development" <?= (($row5['position'] ?? '') == "Web Development") ? "selected": ""?>>Web Development</option>
        <option value="Data Analyst" <?= (($row5['position'] ?? '') == "Data Analyst") ? "selected": ""?>>Data Analyst</option>
        <option value="App Development" <?= (($row5['position'] ?? '') == "App Development") ? "selected": ""?>>App Development</option>
        <option value="Game Development" <?= (($row5['position'] ?? '') == "Game Development") ? "selected": ""?>>Game Development</option>
        <option value="Project Management" <?= (($row5['position'] ?? '') == "Project Management") ? "selected": ""?>>Project Management</option>
        <option value="Cyber Security" <?= (($row5['position'] ?? '') == "Cyber Security") ? "selected": ""?>>Cyber Security</option>
        <option value="Ethical Hacking" <?= (($row5['position'] ?? '') == "Ethical Hacking") ? "selected": ""?>>Ethical Hacking</option>
        <option value="Data Entry" <?= (($row5['position'] ?? '') == "Data Entry") ? "selected": ""?>>Data Entry</option>
        </select>
        <h3>About</h3>
        <textarea name="about"><?= $row5['about'] ?? '' ?></textarea>
        <h3>Job Type</h3>
        <textarea name="job_type"><?= $row5['job_type'] ?? '' ?></textarea>

        <!-- Internship -->
        <h2>Internship Details</h2>
        <h3>Position Title</h3>
        <select name="Position_Title">
        <option value="Select" <?= (($row6['Position_Title'] ?? '') == "Select") ? "selected": ""?>>Select</option>
        <option value="Web Development" <?= (($row6['Position_Title'] ?? '') == "Web Development") ? "selected": ""?>>Web Development</option>
        <option value="Data Analyst" <?= (($row6['Position_Title'] ?? '') == "Data Analyst") ? "selected": ""?>>Data Analyst</option>
        <option value="App Development" <?= (($row6['Position_Title'] ?? '') == "App Development") ? "selected": ""?>>App Development</option>
        <option value="Game Development" <?= (($row6['Position_Title'] ?? '') == "Game Development") ? "selected": ""?>>Game Development</option>
        <option value="Project Management" <?= (($row6['Position_Title'] ?? '') == "Project Management") ? "selected": ""?>>Project Management</option>
        <option value="Cyber Security" <?= (($row6['Position_Title'] ?? '') == "Cyber Security") ? "selected": ""?>>Cyber Security</option>
        <option value="Ethical Hacking" <?= (($row6['Position_Title'] ?? '') == "Ethical Hacking") ? "selected": ""?>>Ethical Hacking</option>
        <option value="Data Entry" <?= (($row6['Position_Title'] ?? '') == "Data Entry") ? "selected": ""?>>Data Entry</option>
        </select>
        <h3>Duration</h3>
        <select name="Internship_Duration">
        <option value="Select" <?= (($row6['Internship_Duration'] ?? '') == "Select") ? "selected": ""?>>Select</option>
        <option value="3 Month" <?= (($row6['Internship_Duration'] ?? '') == "3 Month") ? "selected": ""?>>3 Month</option>
        <option value="6 Month" <?= (($row6['Internship_Duration'] ?? '') == "6 Month") ? "selected": ""?>>6 Month</option>
        <option value="1 Year" <?= (($row6['Internship_Duration'] ?? '') == "1 Year") ? "selected": ""?>>1 Year</option>
        </select>
        <h3>Stipend</h3>
        <textarea name="Stipend"><?= $row6['Stipend'] ?? '' ?></textarea>
        <h3>Job Type</h3>
        <textarea name="Type"><?= $row6['Type'] ?? '' ?></textarea>

        <!-- Buttons -->
        <input id="Update" type="submit" name="update_students" value="Update"></input>
    </form>
</body>
</html>