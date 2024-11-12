<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>





<html>
    <head>
        <title>Update Student Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>


<body style="text-align:center; font-family: times new roman; background-color: #0dcaf0">

<nav class="navbar navbar-expand-md fixed-top navbar-light" style="background-color: teal;">

            <div class="container-xxl">
                <a href="view.php" class="navbar-brand">
                    <span class="fw-bold text-dark">
                        Student Details         
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" style="text-align:left;" id="main-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark text-left" href="register.php"> Register </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="view.php"> Student List </a>
                        </li>
                        <li class="nav-item d-md-none">
                            <a class="nav-link text-dark" href="logout.php"> Logout </a>
                        </li>
                        <li class="nav-item m-2 d-none d-md-inline">
                            <a class="btn btn-sm btn-primary text-dark" href="logout.php"> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


<br><br><br><br><img src="UTM-LOGO-FULL.png" alt="This is UTM logo" width="300" height="100"><br>
<br><h2 class="fw-bold">Update Student Details </h2>

    <?php

    include "db_conn.php";

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "SELECT * FROM students WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }


    ?>
    
         <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
         <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <table class="table table-bordered" style="background-color: #4CAF50; color: white;">
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Matric No:</label></td>
                    <td><input type="text" name="matric" class="form-control" value="<?php echo $row['matric']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Faculty:</label></td>
                    <td><input type="text" name="faculty" class="form-control" value="<?php echo $row['faculty']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Course Name:</label></td>
                    <td><input type="text" name="course" class="form-control" value="<?php echo $row['course']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>College Name:</label></td>
                    <td><input type="text" name="college" class="form-control" value="<?php echo $row['college']; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-light">Update Student Details</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

    </form>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $matric = $_POST['matric'];
        $faculty = $_POST['faculty'];
        $course = $_POST['course'];
        $college = $_POST['college'];
        $email = $_POST['email'];
        
        // Ensure id is set
        if (isset($id)) {
            $sql = "UPDATE students 
                    SET name = '$name', 
                        matric = '$matric', 
                        faculty = '$faculty', 
                        course = '$course', 
                        college = '$college', 
                        email = '$email' 
                    WHERE id = $id";
    
            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: ID not found.";
        }
    }
    ?>
    

    <br>
    <a href= "view.php"  class="btn btn-info">Back to Student list </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>