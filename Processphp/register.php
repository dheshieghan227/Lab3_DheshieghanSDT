<?php
    session_start();
        if(!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
}
?>


<html>
<head>
    <title>Register New Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="text-align: center; font-family:times new roman; background-color: #0dcaf0;">>

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

                <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="register.php"> Register </a>
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
    
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="text-center">
        <img src="UTM-LOGO-FULL.png" alt="This is UTM logo" class="mb-4" width="300" height="100">
        <h2 class="fw-bold">Registration New Students</h2>
    </div>
    
    <div class="row justify-content-center my-5">
        <div class="col-lg-6">
            <form action="register.php" method="POST" class="border p-4 rounded shadow-sm">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><label for="name" class="form-label">Name:</label></td>
                            <td><input type="text" class="form-control" id="name" name="name" required></td>
                        </tr>
                        <tr>
                            <td><label for="matric" class="form-label">Matric No:</label></td>
                            <td><input type="text" class="form-control" id="matric" name="matric" required></td>
                        </tr>
                        <tr>
                            <td><label for="faculty" class="form-label">Faculty:</label></td>
                            <td><input type="text" class="form-control" id="faculty" name="faculty" required></td>
                        </tr>
                        <tr>
                            <td><label for="course" class="form-label">Course Name:</label></td>
                            <td><input type="text" class="form-control" id="course" name="course" required></td>
                        </tr>
                        <tr>
                            <td><label for="college" class="form-label">College Name:</label></td>
                            <td><input type="text" class="form-control" id="college" name="college" required></td>
                        </tr>
                        <tr>
                            <td><label for="email" class="form-label">Email:</label></td>
                            <td><input type="email" class="form-control" id="email" name="email" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register New Student</button>
                </div>
            </form>
        </div>
    </div>
</div>

<a href="view.php"  class="btn btn-info">Back to Student List </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

<?php
include "db_conn.php";


if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $name = $_POST ['name'];
    $matric=$_POST ['matric'];
    $faculty=$_POST['faculty'];
    $course=$_POST ['course'];
    $college=$_POST ['college'];
    $email = $_POST['email'];
    
    $sql= "INSERT INTO students (name,matric,faculty,course,college,email) VALUES ('$name' ,'$matric','$faculty','$course','$college', '$email')";

    if(mysqli_query($conn, $sql)){
        echo "New record created successfully"; 
    } else {
        echo "Error:  ". $sql ."<br>". mysqli_error($conn);

    }

}
?>