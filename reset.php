<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="styles/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create new password</title>
</head>
<body>
  <div class="container">
    <div class="thumbnail"></div>
    <form method="post" class="card js-form">
      <h3><img src="images/z.png" alt="">RESET PASSWORD</h3>
      <p>Travelling is to live twice</p>
      <div class='error'></div>
      <input type="text" name="token" value="<?php echo $_GET['token']; ?>" hidden>
      <input type="text" name="pwd" placeholder="New password" required>
      <input type="text" name="cpwd" placeholder="Confirm new password" required>
      <input type="submit"  value="Reset password">
      <div>Dont have account? <a href="signup.php">Sign Up</a></div>
    </form>
  </div>
  <script src="scripts/js/reset.js"></script>
</body>
</html>