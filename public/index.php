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
    <h1>Update & Delete Record</h1><br>
    <button id="Add" type="button"
        onclick="window.location.href='http://localhost/Student%20Skills%20&%20Internship%20Management%20System/public/Create.php'">
        Add new Student
    </button><br>
    <h2>Total Students: 
        <?php
            echo mysqli_num_rows($result);
        ?>
    </h2>
    <label>Enter Student id</label>
    <input type="text">
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
                $query = "SELECT * FROM personal_information";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("query failed" .mysqli_error());
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
</body>
</html>