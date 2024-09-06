<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../styles/forget.css">
    <link rel="shortcut icon" href="../images/z.png" type="image/x-icon">
  <link rel="stylesheet" href="../styles/loader.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Code Verification</title>
</head>
<body>
  <div class="container">
    <div class="thumbnail"></div>
    <form method="post" class="card js-form"><div class="overlay hidden"></div>
      <div class="loader hidden"><img src="../images/z.png" alt=""><span></span></div>  
    <h3><img src="../images/z.png" alt="">OTP Verification</h3>
      <div class="msg active">We've sent a verification code to your email - <?php echo $_SESSION['email'];?> </div>
      <div class='error'></div>
      <input type="number" name="otp" placeholder="Enter code" required>
      <input type="text" name="email" value="<?php echo $_SESSION['email'];?>" hidden>
      <input type="submit"  value="Verify">
    </form>
  </div>
  <script src="../scripts/js/verify.js"></script>
</body>
</html>