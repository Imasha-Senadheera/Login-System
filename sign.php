<?php

$success=0;
$user=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['UserName'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM `registrations` WHERE UserName = '$username'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
           // echo " User already exists!";
            $user=1;

        } else {
            $sql = "INSERT INTO `registrations` (UserName, Password)
                    VALUES ('$username', '$password')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                //echo " Signup successful!!";
                $success=1;

            } else {
                die(mysqli_error($con));
            }
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
     
    <?php
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ohh NO Sorry!</strong> User already exist!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

<?php
    if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are successfully signed up!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <div class="container mt-5">

    <h1>Sign up here!</h1> </br>

    <form action="sign.php" method="post">
  <div class="mb-3">
    <label for="userName" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="UserName">
  </div>

  <div class="mb-3">
    <label for="userPassword" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="Password">
  </div>



  <button type="submit" class="btn btn-primary">Sign up</button>
</form>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>