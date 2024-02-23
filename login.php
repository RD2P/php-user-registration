<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h2>LOGIN</h2>
  <form method="POST" action="check_login.php">
    <label for="email">Email</label><br>
    <input type="email" id="email" required/>
    <br>
    <label for="Password">Password</label><br>
    <input type="password" id="password" required/>
    <br><br>
    <input type="submit" value="Login"/>
  </form>
  
  <br>
  Need an account?
  <a href="signup.php">Sign up</a>
</body>
</html>