<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
</head>
<body>

  <?php 

    session_start();

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

      //Everything is valid, store user in db
      if($valid) {
        $servername = "localhost";
        $username = "root";
        $dbname = "registration";

        $conn = mysqli_connect($servername, $username,  "", $dbname);

        if(!$conn){
          die("Connection failed: " . mysqli_connect_error()); 
        }

        //escape special chars
        $fname = mysqli_real_escape_string($conn, $fname);
        $lname = mysqli_real_escape_string($conn, $lname);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        //check if email is in use
        $email_rows = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
        
        if(mysqli_num_rows($email_rows) > 0){
          $emailErr = "Email already in use";
        }

        $sql = "INSERT INTO users (fname, lname, email, password)
        VALUES ('$fname', '$lname', '$email', '$password')";
        
        if(mysqli_query($conn, $sql)){
          $_SESSION['fname'] = $fname;

          echo "<script>alert('Insert Successful')</script>";
          header("Location: registration_complete.php");
        } else {
          echo "Something went wrong";
        }
      }

    }
  ?>

  <h2>Sign up</h2>

  <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      
      <label for="fname">First name</label><br>
      <input type="text" id="fname" name="fname" maxlength="50" value="<?php echo $fname?>"/>
      <span>* <?php echo $fnameErr;?></span>
      <br>
      
      <label for="lname" >Last name</label><br>
      <input type="text" id="lname" name="lname" maxlength="50" value="<?php echo $lname;?>"/>
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