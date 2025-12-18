<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "student_skills_and_internship_management_system";

    $conn = mysqli_connect($host, $user, $password, $database);

    if(!$conn){
        die("Connection of this database failed due to ". mysqli_connect_error());
    }
?>