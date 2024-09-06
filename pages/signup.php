<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../styles/fontawesome-free-5.8.1-web/css/all.css">
  <link rel="stylesheet" href="../styles/style.css">
    <link rel="shortcut icon" href="../images/z.png" type="image/x-icon">
  <link rel="stylesheet" href="../styles/signup.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>
<body>
  <div class="container">
    <div class="thumbnail"></div>
    <form method="post" class="card js-sign-form">
      <h3><img src="../images/z.png" alt="">SIGN UP</h3>
      <div class='error'></div>
      <div>
        <input type="text" class="js-username" name="username" placeholder="Username" required>
        <small></small>
      </div> 
      <input type="email" class="js-email" name="email" placeholder="Email" required>
      <div class="pwd">
        <i class="fas fa-eye"></i>
        <input type="password" class="js-pwd" name="pwd" placeholder="Password" required>
      </div>
      <div class="pwd">
        <i class="fas fa-eye"></i>
        <input type="password" class="js-cpwd" name="cpwd" placeholder="Confirm Password" required>
      </div>
      <input type="submit" class="js-sign-btn" value="Sign up">
      By clicking sign up you agree to our <br><a href="">Terms and conditions</a> .
      <div>Already have account? <a href="login.php">Login</a></div>
    </form>
  </div>
  <script src="../scripts/js/signup.js"></script>
</body>
</html>