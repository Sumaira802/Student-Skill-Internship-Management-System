<?php
    include '../Config/db.php';

    if(isset($_GET['sno'])){
        $sno = $_GET['sno'];
    }
    $query = "SELECT * FROM personal_information WHERE sno = '$sno'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("query failed" .mysqli_error());
    }
    else{
        $row = mysqli_fetch_assoc($result);
        print_r($row);
    }

    $query1 = "SELECT * FROM university_information WHERE sno = '$sno'";
    $result1 = mysqli_query($conn, $query1);
    if(!$result1){
        die("query1 failed" .mysqli_error());
    }
    else{
        $row1 = mysqli_fetch_assoc($result1);
        print_r($row1);
    }

    $query2 = "SELECT * FROM skills_categories WHERE sno = '$sno'";
    $result2 = mysqli_query($conn, $query2);
    if(!$result2){
        die("query2 failed" .mysqli_error());
    }
    else{
        $row2 = mysqli_fetch_assoc($result2);
        print_r($row2);
    }

    $query3 = "SELECT * FROM certificates WHERE sno = '$sno'";
    $result3 = mysqli_query($conn, $query3);
    if(!$result3){
        die("query3 failed" .mysqli_error());
    }
    else{
        $row3 = mysqli_fetch_assoc($result3);
        print_r($row3);
    }

    $query4 = "SELECT * FROM projects WHERE sno = '$sno'";
    $result4 = mysqli_query($conn, $query4);
    if(!$result4){
        die("query4 failed" .mysqli_error());
    }
    else{
        $row4 = mysqli_fetch_assoc($result4);
        print_r($row4);
    }

    $query5 = "SELECT * FROM work_experience WHERE sno = '$sno'";
    $result5 = mysqli_query($conn, $query5);
    if(!$result5){
        die("query5 failed" .mysqli_error());
    }
    else{
        $row5 = mysqli_fetch_assoc($result5);
        print_r($row5);
    }

    $query6 = "SELECT * FROM internship_details WHERE sno = '$sno'";
    $result6 = mysqli_query($conn, $query6);
    if(!$result6){
        die("query6 failed" .mysqli_error());
    }
    else{
        $row6 = mysqli_fetch_assoc($result6);
        print_r($row6);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete * Update Record</title>
    <link rel="stylesheet" href="../assets/css/UpdateDeleteRecord.css">
</head>
<body>
    <form>
        <!-- Personal Information -->
        <h2>Personal Information</h2>
        <h3>First Name</h3>
        <input type="text" name="first_Name" placeholder="First Name" value="<?php echo $row['first_Name']; ?>">
        <h3>Last Name</h3>
        <input type="text" name="last_Name" placeholder="Last Name" value="<?php echo $row['last_Name']; ?>">
        <h3>Gender</h3>
        <select name="gender">
        <option value="">Select</option>
        <option value="Male" <?php if($row['gender'] == "Male") echo "selected";?>>Male</option>
        <option value="Female" <?php if($row['gender'] == "Female") echo "selected";?>>Female</option>
        <option value="Other" <?php if($row['gender'] == "Other") echo "selected";?>>Other</option>
        </select>
        <h3>Email</h3>
        <input type="email" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
        <h3>CNIC No</h3>
        <input type="text" name="cnic_No" placeholder="Enter CNIC" value="<?php echo $row['cnic_No']; ?>">
        <h3>Phone Number</h3>
        <input type="text" name="Phone_Number" placeholder="Enter Phone Number" value="<?php echo $row['Phone_Number']; ?>">
        <h3>Date of Birth</h3>
        <input type="date" name="Date_of_Birth" value="<?php echo $row['Date_of_Birth']; ?>">
        <h3>Address</h3>
        <textarea name="Address" placeholder="Enter Full Address" rows="3" value="<?php echo $row['Address']; ?>"></textarea>

        <!-- Academic Information -->
        <h2>University Information</h2>
        <h3>University Name</h3>
        <select name="university_Name">
        <option value="">Select</option>
        <option value="NUML" <?php if($row1['university_Name'] == "NUML") echo "selected";?>>NUML</option>
        <option value="FUSST" <?php if($row1['university_Name'] == "FUSST") echo "selected";?>>FUSST</option>
        <option value="NUST" <?php if($row1['university_Name'] == "NUST") echo "selected";?>>NUST</option>
        <option value="IST" <?php if($row1['university_Name'] == "IST") echo "selected";?>>IST</option>
        <option value="Air" <?php if($row1['university_Name'] == "Air") echo "selected";?>>Air</option>
        <option value="FAST" <?php if($row1['university_Name'] == "FAST") echo "selected";?>>FAST</option>
        <option value="COMSAT" <?php if($row1['university_Name'] == "COMSAT") echo "selected";?>>COMSAT</option>
        <option value="IIUI" <?php if($row1['university_Name'] == "IIUI") echo "selected";?>>IIUI</option>
        </select>
        <h3>University Roll No</h3>
        <input type="number" name="Roll_No" placeholder="Enter Roll No" value="<?php echo $row1['Roll_No']; ?>">
        <h3>Department</h3>
        <select name="Department" value="<?php echo $row1['Department']; ?>">
        <option value="">Select</option>
        <option value="Information Technology" <?php if($row1['Department'] == "Information Technology") echo "selected";?>>Information Technology</option>
        <option value="Computer Science" <?php if($row1['Department'] == "Computer Science") echo "selected";?>>Computer Science</option>
        <option value="Software Engineering" <?php if($row1['Department'] == "Software Engineering") echo "selected";?>>Software Engineering</option>
        <option value="Accounting & Finance" <?php if($row1['Department'] == "Accounting & Finance") echo "selected";?>>Accounting & Finance</option>
        <option value="Mechanical Engineering" <?php if($row1['Department'] == "Mechanical Engineering") echo "selected";?>>Mechanical Engineering</option>
        <option value="Electrical Engineering" <?php if($row1['Department'] == "Electrical Engineering") echo "selected";?>>Electrical Engineering</option>
        <option value="Aviation" <?php if($row1['Department'] == "Aviation") echo "selected";?>>Aviation</option>
        <option value="Business Administration" <?php if($row1['Department'] == "Business Administration") echo "selected";?>>Business Administration</option>
        </select>
        <h3>CGPA</h3>
        <input type="text" name="CGPA" placeholder="Enter CGPA" value="<?php echo $row1['CGPA']; ?>">
        <h3>Passing Year</h3>
        <input type="month" name="Passing_Year" value="<?php echo $row1['Passing_Year']; ?>">
        <h3>Semester</h3>
        <select name="Semester" value="<?php echo $row1['Semester']; ?>">
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
        <textarea name="Technical_Skills" placeholder="Technical Skills" rows="2" value="<?php echo $row2['Technical_Skills']; ?>"></textarea>
        <h3>Soft Skills</h3>
        <textarea name="Soft_Skills" placeholder="Soft Skills" rows="2" value="<?php echo $row2['Soft_Skills']; ?>"></textarea>

        <!-- Certificates -->
        <h2>Certificates</h2>
        <div id="Certificate">
        <div class="input-group">
        <h3>Course Name</h3>
        <input type="text" name="Course_Name" placeholder="Enter course name" value="<?php echo $row3['Course_Name']; ?>">
        <h3>About Certificate</h3>
        <textarea name="About_Certificate" placeholder="Enter about certificates" rows="2" value="<?php echo $row3['About_Certificate']; ?>"></textarea>
        <h3>Upload Certificate</h3>
        <input type="file" name="Upload_Certificate" value="<?php echo $row3['Upload_Certificate']; ?>">
        </div>
        </div>
        <button type="button" onclick="addCertificate()">+ Add Certificate</button><br>

        <!-- Projects -->
        <h2>Projects</h2>
        <div id="Projects">
        <div class="input-group">
        <h3>Project Name</h3>
        <input type="text" name="Project_Name" placeholder="Enter name of project" value="<?php echo $row4['Project_Name']; ?>">
        <h3>About Project</h3>
        <textarea name="About_Project" placeholder="Enter project details" rows="2" value="<?php echo $row4['About_Project']; ?>"></textarea>
        <h3>Upload</h3>
        <input type="file" name="Upload" value="<?php echo $row4['Upload']; ?>">
        </div>
        </div>
        <button type="button" onclick="addProject()">+ Add Project</button><br>

        <!-- Work Experience -->
        <h2>Work Experience</h2>
        <h3>Company</h3>
        <select name="company" value="<?php echo $row5['company']; ?>">
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
        <select name="position" value="<?php echo $row5['position']; ?>">
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
        <textarea name="about" placeholder="Enter work experience" rows="2" value="<?php echo $row5['about']; ?>"></textarea>
        <h3>Job Type</h3>
        <textarea name="job_type" placeholder="Remote or Onsite" rows="1" value="<?php echo $row5['job_type']; ?>"></textarea>

        <!-- Internship -->
        <h2>Internship Details</h2>
        <h3>Position Title</h3>
        <select name="Position_Title" value="<?php echo $row6['Position_Title']; ?>">
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
        <select name="Internship_Duration" value="<?php echo $row6['Internship_Duration']; ?>">
        <option value="">Select</option>
        <option value="3 Month">3 Month</option>
        <option value="6 Month">6 Month</option>
        <option value="1 Year">1 Year</option>
        </select>
        <h3>Stipend</h3>
        <textarea name="Stipend" placeholder="Paid or Unpaid" rows="1" value="<?php echo $row6['Stipend']; ?>"></textarea>
        <h3>Job Type</h3>
        <textarea name="Type" placeholder="Remote or Onsite" rows="1" value="<?php echo $row6['Type']; ?>"></textarea>

        <!-- Buttons -->
        <input type="submit" name="update_students" value="Update"></input>
        <button type="button"><a href="Home Page.html">Back to home</a></button>
    </form>
</body>
</html>