<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php 
    $fname = $lname = $email = $password = "";
    $fnameErr = $lnameErr = $emailErr = $passwordErr = "";

    if($_SERVER['REQUEST_METHOD']=="POST"){

      $valid = true;
      
      //First name validation
      if(empty($_POST['fname'])){
        $fnameErr = "Please provide first name";
        $valid = false;
      } else {
        $fname = $_POST['fname'];
        if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST['fname'])) {
          $fnameErr = "No special characters allowed";
          $valid = false;
        }
      }
      
      //Last name validation
      if(empty($_POST['lname'])){
        $lnameErr = "Please provide last name";
        $valid = false;
      } else {
        $lname  = $_POST['lname'];
        if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST['lname'])) {
          $lnameErr = "No special characters allowed";
          $valid = false;
        }
      }
      
      //Email validation
      if(empty($_POST['email'])){
        $emailErr = "Please provide email";
        $valid = false;
      } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $valid = false;
        }
      }

      //Password validation
      if(empty($_POST['password'])){
        $passwordErr = "Please type in a password";
        $valid = false;
      } else {
        $password = $_POST['password'];
        if(strlen($password) <= 8) {
          $passwordErr = "Password must be longer than 8 characters";
          $valid = false;
        }
      }

      if($valid) header("Location: registration_complete.php");

    }
  ?>

  <h2>Sign up</h2>

  <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      
      <label for="fname">First name</label><br>
      <input type="text" id="fname" name="fname" maxlength="30" value="<?php echo $fname?>"/>
      <span>* <?php echo $fnameErr;?></span>
      <br>
      
      <label for="lname" maxlength="30">Last name</label><br>
      <input type="text" id="lname" name="lname" value="<?php echo $lname;?>"/>
      <span>* <?php echo $lnameErr;?></span>
      <br>
      
      <label for="email">Email</label><br>
      <input type="text" id="email" name="email" value="<?php echo $email;?>"/>
      <span>* <?php echo $emailErr;?></span>
      <br>
      
      <label for="Password">Password</label><br>
      <input type="password" id="password" name="password"/>
      <span>* <?php echo $passwordErr;?></span>
      
      <br><br>

      <input type="submit" value="Sign up!"/>
    </form>
</body>
</html>