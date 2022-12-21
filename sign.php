<?php 
    include "connect.php";
    $showAlert = false;
    $showError = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $year = $_POST['year'];
        $dept = $_POST['dept'];
        $roll = $_POST['roll'];
        $division = $_POST['division'];
        $batch = $_POST['batch'];
        $mentor = $_POST['mentor'];
        $sql = "select * from `students` where email='$email'";
        $result = mysqli_query($conn,$sql);
        $numExist = mysqli_num_rows($result);
        if($numExist>0){
           $showError = "User already exists!!";
        }
        else{
            if($password==$cpassword){
                $hash = password_hash($password,PASSWORD_DEFAULT);
                $cwid = rand(10000000,99999999);
                $sql1 = "INSERT INTO `students`( `name`, `email`, `phone`, `password`, `year`, `dept`, `roll`,  `division`, `batch`, `mentor`, `cwid`) VALUES ('$name','$email','$phone','$hash','$year','$dept', '$roll','$division','$batch','$mentor','$cwid')";
                $result1 = mysqli_query($conn,$sql1);
                if($result1){
                    $showAlert = true;
                }
            
            }
            else{
                $showError = "password does not match!!!";
            }
        }
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #F6FFA4;
        }
        #left{
            background-color: ;
        }
    </style>
    <title>Sign Up</title>
  </head>
  <body>
  <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have created account successfully. Now you can go to to <a href="login.php">login</a> page to access your account!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>'.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>
    <div class="container ">
        <div class="card my-3 rounded bg-white mt-5 mb-5 my-5 border shadow p-3 mb-5 bg-body rounded">
            <div class="row">
                <div class="col-6 border-end" id="left">
                    <h3 class="text-center my-2 fw-bold">SRM University</h3>
                    <p class="text-center my-2 fw-bolder">Sign Up with your details to create your University account.</p>
                </div>
                <div class="col-6">
                    <form action="" method="post">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels mb-2">Name</label>
                                <input type="text" class="form-control mb-2" placeholder="Name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Email</label>
                                <input type="email" class="form-control mb-2" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Phone</label>
                                <input type="tel" class="form-control mb-2" name="phone" placeholder="Phone" maxlength=10  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Create Password</label>
                                <input type="password" class="form-control mb-2" placeholder="password" name="password"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Confirm Password</label>
                                <input type="password" class="form-control mb-2" placeholder="Confirm" name="cpassword"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Enter Your Academic Year</label>
                                <input type="text" class="form-control mb-2" name="year" placeholder="year"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Enter Your Department</label>
                                <input type="text" class="form-control mb-2" name="dept" placeholder="Dept"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Enter Your Roll number</label>
                                <input type="text" class="form-control mb-2" name="roll" placeholder="roll"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2"> Division</label>
                                <input type="text" class="form-control mb-2" name="division" placeholder="Division"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Batch</label>
                                <input type="text" class="form-control mb-2" name="batch" placeholder="Batch"  required>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Enter Your Mentor name</label>
                                <input type="text" class="form-control mb-2" name="mentor" placeholder="Mentor"  required>
                            </div>
                            <div class="mt-2 text-center fw-bold">
                                Alredy have an account<a href="login.php" style="text-decoration:none"> Log In</a> here
                            </div>
                            <div class="row">
                                <div class="mt-5 text-center"><button type="submit" class="btn btn-success" >Sign Up</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>