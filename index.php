<?php
    session_start();
    include_once 'database/connect.php';
    $mysqli = dbconnect();

    include_once 'classes/users.php';

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // print_r($_POST);
        // exit();

        // Sanitize the Login variables before inseerting into the database!

        $email = mysqli_real_escape_string($mysqli, $email);
        $password = mysqli_real_escape_string($mysqli, $password);

      $result = user_login($mysqli, $email, $password);
        if(mysqli_num_rows($result) > 0){
            while ($user_row = mysqli_fetch_assoc($result)) {
              $_SESSION['user_id'] = $user_row['user_id'];
              $_SESSION['fname'] = $user_row['fname'];
            }
            header("Location: view/supplier.php?Login = Success!");
        }else{
            header("Location: signup.php?Login =  Error!");
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
                <form class="form-container" action="<?php $_SERVER['PHP_SELF'] ?>" Method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"  required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"  required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-block">Submit</button><br>
                    <a href="signup.php" class="btn btn-info float-right"> Sign Up</a>
                </form>
            </section>
        </section>
    </section>
    <script src="assets/jquery/cdn.jsdelivr.net_npm_jquery@3.2_dist_jquery.min"></script>
    <script src="assets/jquery/bootstrap.min.js"></script>
</body>
</html>