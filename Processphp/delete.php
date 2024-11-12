<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<?php

include "db_conn.php" ;//using database connection file here

if (isset($_GET['id'])) {

    $id=$_GET['id'];

    $sql = "DELETE FROM students WHERE id ='$id'";
    $result = mysqli_query($conn,$sql);

    if ($result){
        echo "<script>alert('Student Record Deleted Successfully'); window.location='view.php'</script>";
    }   else {
        echo "<script>alert('Student Record Not Deleted');window.location = 'view.php'</script>";
    }


}


?>