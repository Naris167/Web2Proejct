<?php
require_once './database/Auth.php';
require_once './database/DBController.php';
require_once './database/DatabaseOperations.php';

$dbController = new DBController();
$dbOps = new DatabaseOperations($dbController);
$auth = new Auth($dbOps);

if ($auth->isLoggedIn() || $auth->checkAutoLogin()) {
    // User is already logged in or auto-login successful, redirect to welcome page
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login and Registration Form in HTML & CSS | CodingLab</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="JavaScript/auth.js"></script>
    <script src="JavaScript/notifications.js"></script>
    <script src="JavaScript/validation.js"></script>
    <script src="script.js"></script>
</head>
  <body id="login-page">
    <div class="container">
      <input type="checkbox" id="flip" />
      <div class="cover">
        <div class="front">
          <img src="assetsPHP/Login-2.png" alt="" />
          <div class="text font-rubik">
            <span class="text-1"
              >Every new friend is a <br />
              new adventure</span
            >
            <span class="text-2">Let's get connected</span>
          </div>
        </div>
        <div class="back">
          <img class="backImg" src="assetsPHP/Login-1.png" alt="" />
          <div class="text font-rubik">
            <span class="text-1"
              >Complete miles of journey <br />
              with one step</span
            >
            <span class="text-2">Let's get started</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title font-rubik">Login</div>
            <form action="#" id="login_form" method="post" autocomplete="on">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input class="font-rubik" id="LoginEmail" name="email" type="email" placeholder="Email" required autocomplete="username"/>
                </div>

                <div class="input-box password-input">
                  <i class="fas fa-lock"></i>
                  <input class="password-field font-rubik" id="LoginPassword" name="password" type="password" placeholder="Password" required autocomplete="current-password"/>
                  <span class="password-toggle">
                    <i class="fas fa-eye-slash"></i>
                    <i class="fas fa-eye"></i>
                  </span>
                </div>

                <div class="text font-rubik">
                  <a href="#">Forgot password?</a>
                </div>
                <div class="button input-box">
                  <input class="font-rubik" type="submit" value="Login" />
                </div>
                <div class="text sign-up-text font-rubik">
                  Don't have an account? <label for="flip">Signup now</label>
                </div>
              </div>
            </form>
          </div>
          <div class="signup-form">
              <div class="title font-rubik">Signup</div>
                <form action="#" id="signup_form" autocomplete="off" novalidate>
                  <div class="input-boxes">
                      <div class="input-box">
                          <i class="fas fa-user"></i>
                          <input class="font-rubik" id="SignupFName" name="firstName" type="text" placeholder="First name" required autocomplete="off" />
                      </div>
                      <div class="input-box">
                          <i class="fas fa-user"></i>
                          <input class="font-rubik" id="SignupLName" name="lastName" type="text" placeholder="Last name" required autocomplete="off" />
                      </div>
                      <div class="input-box">
                          <i class="fas fa-envelope"></i>
                          <input class="font-rubik" id="SignupEmail" name="email" type="email" placeholder="Email" required autocomplete="off" />
                      </div>
                      <div class="input-box password-input">
                          <i class="fas fa-lock"></i>
                          <input class="password-field font-rubik" id="SignupPassword1" name="password" type="password" placeholder="Password" required autocomplete="new-password" />
                          <span class="password-toggle">
                              <i class="fas fa-eye-slash"></i>
                              <i class="fas fa-eye"></i>
                          </span>
                      </div>
                      <div class="input-box password-input" id="confirm-password-box" style="display: none;">
                          <i class="fas fa-lock"></i>
                          <input class="password-field font-rubik" id="SignupPassword2" name="confirmPassword" type="password" placeholder="Confirm Password" required autocomplete="new-password" />
                          <span class="password-toggle">
                              <i class="fas fa-eye-slash"></i>
                              <i class="fas fa-eye"></i>
                          </span>
                      </div>
                      <div class="button input-box">
                          <input class="font-rubik" type="submit" value="Sign Up" />
                      </div>
                      <div class="text sign-up-text font-rubik">
                          Already have an account? <label for="flip">Login now</label>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
