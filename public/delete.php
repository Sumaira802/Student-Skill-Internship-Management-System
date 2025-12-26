<?php
    include '../Config/db.php';

    // $sql = "DELETE FROM `personal_information` WHERE `sno` = 1";
    // $result = mysqli_query($conn, $sql);

    // $aff = mysqli_affected_rows($con);
    // echo "<br>Number of affected rows: $aff<br>";

    // if($result){
    //     echo "Delete Successfuly";
    // }
    // else{
    //     $err = mysqli_error($con);
    //     echo "Not Delete Successfully due to this error --> $err";
    // }

    if(isset($_GET['sno'])){
        $sno = $_GET['sno'];
        $query = "DELETE FROM personal_information WHERE `sno` = '$sno'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed".mysqli_error());
        }
        else{
            header('location:index.php?delete_msg=You have deleted the record.');
        }
    }
?>

<?php
    if(isset($_GET['delete_msg'])){
        echo "<h6>".$_GET['delete_msg']. "</h6>";
    }
?>