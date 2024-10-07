<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS | CodingLab </title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ="
      crossorigin="anonymous"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script src="JavaScript/login.js"></script>
    <script src="script.js"></script>
<body id="login-page">
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assetsPHP/Login-2.png" alt="">
        <div class="text font-rubik">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="assetsPHP/Login-1.png" alt="">
        <div class="text font-rubik">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
            <div class="login-form">
              <div class="title font-rubik">Login</div>
              <form action="#">
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input class="font-rubik" type="text" placeholder="Enter your email" required>
                  </div>
                  
                  <div class="input-box password-input">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="password-field font-rubik" placeholder="Enter your password" required>
                    <span class="password-toggle">
                      <i class="fas fa-eye-slash"></i>
                      <i class="fas fa-eye"></i>
                    </span>
                  </div>

              <div class="text font-rubik"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input class="font-rubik" type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text font-rubik">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title font-rubik">Signup</div>
        <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input class="font-rubik" type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box password-input">
                <i class="fas fa-lock"></i>
                <input type="password" class="password-field font-rubik" placeholder="Enter your password" required>
                <span class="password-toggle">
                  <i class="fas fa-eye-slash"></i>
                  <i class="fas fa-eye"></i>
                </span>
              </div>
              <div class="button input-box">
                <input class="font-rubik" type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text font-rubik">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>