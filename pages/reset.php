<?php
session_start();
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../styles/fontawesome-free-5.8.1-web/css/all.css">
  <link rel="stylesheet" href="../styles/forget.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create new password</title>
</head>
<body>
  <div class="container">
    <div class="thumbnail"></div>
    <form method="post" class="card js-form">
      <h3><img src="../images/z.png" alt="">RESET PASSWORD</h3>
      <p>Travelling is to live twice</p>
      <div class='error'></div>
      <input type="text" name="email" value="<?php echo $_SESSION['email']?>" hidden>
      <div class="pwd">
        <i class="fas fa-eye"></i>
        <input type="password" name="pwd" placeholder="New password" required>
      </div>
      <div class="pwd">
        <i class="fas fa-eye"></i>
        <input type="password" name="cpwd" placeholder="Confirm new password" required>
      </div>
      <input type="submit"  value="Change Password">
    </form>
  </div>
  <script src="../scripts/js/reset.js"></script>
</body>
</html>
<?php }else{
  header("Location:login.php");
  exit();
} ?>