<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body style="text-align:center; font-family:times new roman; background-color: #0dcaf0;">
    <br><h2 class="fw-bold">Login </h2>
    

    <div class="m-5 p-1 border shadow-lg" style="background-color: #20c997;"><form action="login.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login">
    </form></div>

    <a href = "signup.php"  class="btn btn-sm btn-secondary"> Dont have an account? Register here </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

session_start(); //starting session

include "db_conn.php";


if ($_SERVER["REQUEST_METHOD"]== "POST") { //check if form submitted
    $username = mysqli_real_escape_string($conn,$_POST ['username']);//get username value
    $password= $_POST ['password']; //get the password value
  
    
    $sql= "SELECT * FROM students_reg WHERE username = '$username'";//query the database for users
    $result = mysqli_query($conn, $sql);//run the query

    if(mysqli_num_rows($result) == 1){ //check if user exists
        while($row = mysqli_fetch_assoc($result)){ // get the data from database
            if(password_verify($password, $row["password"])){ // check if the password matches
                $_SESSION['username']=$username; // set the session variable
                header("Location: view.php"); // redirect to the home page
            }else{ //if the password doesnt match
                echo "Invalid username or password";
            }
        }
    }else{ //if the user doesnt exists
        echo "No user found with that username";
    }
}


