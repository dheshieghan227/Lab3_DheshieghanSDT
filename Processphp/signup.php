<html>
    <head>
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="text-align:center; font-family:times new roman; background-color: #0dcaf0;">
<br><h2 class="fw-bold">Register Account</h2>
<div class="m-5 p-1 border shadow-lg" style="background-color: #81E6D9;"><form action="signup.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>


        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Register">

    </form></div>

    <a href = "login.php" class="btn btn-sm btn-secondary">Already have an account? Login here </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
include "db_conn.php";


if ($_SERVER["REQUEST_METHOD"]== "POST") { //check if form submitted
    $username = mysqli_real_escape_string($conn,$_POST ['username']);
    $password= password_hash($_POST ['password'], PASSWORD_BCRYPT);
  
    
    $sql= "INSERT INTO students_reg (username,password) VALUES ('$username' ,'$password')";

    if(mysqli_query($conn, $sql)){
        echo "New record created successfully";
    } else {
        echo "Error:  ". $sql ."<br>". mysqli_error($conn);

    }

}
?>



