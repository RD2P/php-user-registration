<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body>
  <?php

  session_start();

  $conn = mysqli_connect("localhost", "root", "", 'registration') or die(mysqli_connect_error());

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $valid = true;

    $email = $password = "";
    $emailErr = $passwordErr = "";

    //----validate login fields

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
      $passwordErr = "Please provide password";
      $valid = false;
    } else {
      $password = $_POST['password'];
    }

    if($valid) {
      //escape special chars
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      
      $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      
      $result = mysqli_fetch_assoc($query);

      //check if there is row with matching email
      if($result){
        //check if password matches
        if($password == $result['password']){
          $_SESSION['fname'] = $result['fname'];
          $_SESSION['email'] = $email;
          header("Location: dashboard.php");
        } else {
          $passwordErr = "Incorrect password";
          $valid = false;
        }
      } else {
        $emailErr = "Incorrect email";
        $valid = false;
      }
    }
  }

  ?>
  <div class="max-w-lg mx-auto mt-24 border border-spacing-1 bg-slate-50 p-3">

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="flex flex-col gap-y-4">
      <input 
        type="text" 
        id="email" 
        name="email" 
        placeholder="Email *" 
        value="<?php echo $email ?? ''; ?>" 
        class="border border-black-200 p-2 focus:outline-none focus:border-green-500"/>

      <span class="m-0 pl-2 text-red-300"><?php echo $emailErr ?? ''?></span>
      
      <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Password *" 
        class="border border-black-200 p-2 focus:outline-none focus:border-green-500"/>

      <span class="m-0 pl-2 text-red-300"><?php echo $passwordErr ?? ''?></span>
      
      <input type="submit" value="Login" class="text-gray-900 text-lg bg-green-500 py-4 px-8 cursor-pointer hover:bg-green-400"/>
    </form>
    
    <br>

    <div class="pl-2">
      <span>Don't have an account?</span>
      <a href="signup.php" class="text-blue-500">Sign up</a>
    </div>

  </div>
</body>
</html>