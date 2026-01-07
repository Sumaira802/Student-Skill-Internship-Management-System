<?php
    include '../Config/db.php';

    if(isset($_GET['sno'])){
        $sno = $_GET['sno'];

        mysqli_query($conn, "DELETE FROM university_information WHERE sno = '$sno'");
        mysqli_query($conn, "DELETE FROM skills_categories  WHERE sno = '$sno'");
        mysqli_query($conn, "DELETE FROM certificates  WHERE sno = '$sno'");
        mysqli_query($conn, "DELETE FROM projects  WHERE sno = '$sno'");
        mysqli_query($conn, "DELETE FROM work_experience  WHERE sno = '$sno'");
        mysqli_query($conn, "DELETE FROM internship_details  WHERE sno = '$sno'");
        mysqli_query($conn, "DELETE FROM personal_information  WHERE sno = '$sno'");

        header("Location: index.php?msg=deleted");
        exit();

    }
?>

