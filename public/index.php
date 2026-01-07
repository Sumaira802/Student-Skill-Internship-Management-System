<?php
    include '../Config/db.php';

    $sql = "SELECT * FROM `personal_information`";
    $result = mysqli_query($conn, $sql);

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
    <h1><img src="../assets/images/Logo.png" width="100px" height="50px">Student Skills & Internship Management System</h1><br>
    <h1>Update & Delete Record</h1><br>
    <button id="Add"><a href="Create.php">Add new Student</a></button><br>
    <h2>Total Students: 
    <?php
        echo mysqli_num_rows($result);
    ?>
    </h2>
    <table>
        <caption></caption>
        <thead>
            <tr>
                <th>Sno</th>
                <th>FirstName</th><br>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>CNIC NO</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr></tr>
        </thead>
        <tbody>

            <?php
                if(!$result){
                    die("Query failed: " . mysqli_error($conn));
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['first_Name']; ?></td>
                    <td><?php echo $row['last_Name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['Phone_Number']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['cnic_No']; ?></td>
                    <td><button type="button"><a href="Update.php?sno=<?php echo $row['sno']; ?>">Edit</a></button></td>
                    <td><button type="button" id="Delete"><a href="delete.php?sno=<?php echo $row['sno']; ?>">Delete</a></button></td>
                </tr>
            <?php
                }
                    }
            ?>
        </tbody>
    </table>
    <script src="../assets/js/script.js"></script>
</body>
</html>