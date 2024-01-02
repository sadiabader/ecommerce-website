<?php
session_start();
if(isset($_SESSION['useremail'])){
  header('location:index.php');
}
include('includes/config.php');
// include('navbar.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $email_confirm = "SELECT * FROM `admin_reg` WHERE email = '$email'";
    $confirm_email = mysqli_query($connection, $email_confirm);

    if (mysqli_num_rows($confirm_email) > 0) {
        $row = mysqli_fetch_assoc($confirm_email);
        $password = $row['password'];
        $dp_password = password_verify($pass, $password);
 
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['useremail'] = $row['email'];
        // if ($dp_password) {
          if($password == $dp_password){
            // $_SESSION["admin"] = $row['email'];
            echo "<script>alert('login Has Been Succesfully')</script>";

            echo '<script> window.location.href="index.php" </script>';
        } else {
            echo "<script>alert('Ivalid password')</script>";
        }
    } else {
        echo "<script>alert('Ivalid Email')</script>";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                            onsubmit="return validateForm()">
                            <div class="form-floating mb-3">
                                <input type="email" name="log_email" id="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                <span id="emailerror" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" id="password" name="log_pass" class="form-control"
                                    id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                <span id="passworderror" class="text-danger font-weight-bold"></span>
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="login" for="login">Sign
                                In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="register.php">Sign Up</a></p>
                        </form> -->
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">UserEmail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password"name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-4">
                  <input type="submit"name="login" value="signin"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="./register.php">Create an account</a>
                  </div>
                 </form>  

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Regular expressions for validation
            var emailcheck = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
            var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*].{8,16}$/;

            if (emailcheck.test(email)) {
                document.getElementById('emailerror').innerHTML = " ";
            } else {
                document.getElementById('emailerror').innerHTML = " Please Enter Email.";
                return false;
            }
            if (passwordcheck.test(password)) {
                document.getElementById('passworderror').innerHTML = " ";
            } else {
                document.getElementById('passworderror').innerHTML = "Please Enter Password. Incorrect Password ";
                return false;
            }
        }
    </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>