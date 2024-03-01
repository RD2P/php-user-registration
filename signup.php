<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Sign up</title>
</head>
<body>

  <?php 

    session_start();

    //Connect to db
    $servername = "localhost";
    $username = "root";
    $dbname = "registration";

    $conn = mysqli_connect($servername, $username,  "", $dbname);

    if(!$conn){
      die("Connection failed: " . mysqli_connect_error()); 
    }

    //init form field inputs and errors 
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
        //check if email is in use
        $email_rows = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        
        if(mysqli_num_rows($email_rows) > 0){
          $emailErr = "Email already in use";
          $valid = false;
        }
      }

      //Password validation
      if(empty($_POST['password'])){
        $passwordErr = "Please provide a password";
        $valid = false;
      } else {
        $password = $_POST['password'];
        if(strlen($password) <= 8) {
          $passwordErr = "Password must be longer than 8 characters";
          $valid = false;
        }
      }

      //Everything is valid
      if($valid) {

        //escape special chars
        $fname = mysqli_real_escape_string($conn, $fname);
        $lname = mysqli_real_escape_string($conn, $lname);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        //insert query
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

  <div class="max-w-lg mx-auto mt-24 border border-spacing-1 bg-slate-50 p-3">
    <form 
      method="POST" 
      action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>"
      class="flex flex-col gap-y-4">
    
        <input 
          type="text" 
          id="fname" 
          name="fname" 
          maxlength="50" 
          placeholder="First name *"
          value="<?php echo $fname?>"
          class="border border-black-200 p-2 focus:outline-none focus:border-green-500"/>
        <span class="m-0 pl-2 text-red-300"><?php echo $fnameErr;?></span>
    
        <input 
          type="text" 
          id="lname" 
          name="lname" 
          maxlength="50" 
          placeholder="Last name *"
          value="<?php echo $lname;?>"
          class="border border-black-200 p-2 focus:outline-none focus:border-green-500"/>
        <span class="m-0 pl-2 text-red-300"><?php echo $lnameErr;?></span>
    
        <input 
          type="text" 
          id="email" 
          name="email" 
          placeholder="Email *"
          value="<?php echo $email;?>"
          class="border border-black-200 p-2 focus:outline-none focus:border-green-500"/>
        <span class="m-0 pl-2 text-red-300"><?php echo $emailErr;?></span>
    
        <input 
          type="password" 
          id="password" 
          placeholder="Password *"
          name="password"
          class="border border-black-200 p-2 focus:outline-none focus:border-green-500"/>
        <span class="m-0 pl-2 text-red-300"><?php echo $passwordErr;?></span>
    
        <input type="submit" value="Sign up!" class="text-gray-900 text-lg bg-green-500 py-4 px-8 cursor-pointer hover:bg-green-400"/>
      </form>
      <br>
      <div class="pl-2">
      <span>Already have an account?</span>
      <a href="login.php" class="text-blue-500">Log in</a>
    </div>
  </div>
</body>
</html>