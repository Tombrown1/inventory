<?php
include_once 'database/connect.php';
  $mysqli = dbconnect();

include_once 'classes/users.php';


    if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
        // echo "Your First Name is " . $fname;
        // exit();
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];

    //   print_r($_POST);
    //   exit;

    //   //Using Mysqli_real_escape_string to Clean Post data before inserting into database!
      $fname = mysqli_real_escape_string($mysqli, $fname);
      $lname = mysqli_real_escape_string($mysqli, $lname);
      $email = mysqli_real_escape_string($mysqli, $email);
      $password= mysqli_real_escape_string($mysqli, $password);
      $phone = mysqli_real_escape_string($mysqli, $phone);

      $user = insert_users($mysqli, $fname, $lname, $email, $password, $phone);
        if($user){
          echo '<script>
                alert("User Added Successfully");
                window.location = "index.php";
              </script>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/style/form.css" >
</head>
<body>
    <section class="container-fluid bg">      
        <section class="row justify-content-center">        
            <section class="col-12 col-sm-6 col-md-3">
            <div class="container header">
                <h3>Inventory POS</h3>
                </div>
                <form class="form-container" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">                 
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name"  required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name"  required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"  required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"  required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number"  required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                   <div class="form-control">
                   <a id="login" href="index.php" class="btn btn-info float-right"> Login</a>
                   </div>
                </form>
            </section>
        </section>
    </section>
    <script src="assets/jquery/cdn.jsdelivr.net_npm_jquery@3.2_dist_jquery.min"></script>
    <script src="assets/jquery/bootstrap.min.js"></script>
</body>
</html>