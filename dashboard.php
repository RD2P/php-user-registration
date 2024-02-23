<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>
<body>
  <?php
    session_start();
  ?>
  Hey <?php echo $_SESSION['fname'];?> welcome to you dashboard
</body>
</html>