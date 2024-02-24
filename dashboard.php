  <?php
    session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>
<body>
  Hey <?php echo $_SESSION['fname'];?> welcome to your dashboard <br>
  <form action="dashboard.php" method="POST">
    <input type="submit" name="logout" value="Logout"/>
  </form>
  <?php
    if(isset($_POST['logout'])){
      session_destroy();
      header("Location: login.php");
    }
  ?>
</body>
</html>