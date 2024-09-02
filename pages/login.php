<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../styles/fontawesome-free-5.8.1-web/css/all.css">
  <link rel="stylesheet" href="../styles/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="thumbnail"></div>
    <form method="post" class="card js-form">
      <h3><img src="../images/z.png" alt="">LOGIN</h3>
      <p>Travelling is to live twice</p>
      <div class='error'></div>
      <input type="text" name="email" placeholder="Email" required>
      <div class="pwd">
        <input type="password" name="pwd" placeholder="Password" required>
        <i class="fas fa-eye"></i>
      </div>
      <a href="forget.php">Forgot password?</a>
      <input type="submit"  value="Login">
      <div>Dont have account? <a href="signup.php">Sign Up</a></div>
    </form>
  </div>
  <script src="../scripts/js/login.js"></script>
  <script src="../scripts/js/pass-show-hide.js"></script>
</body>
</html>