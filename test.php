<?php
   // echo "<script>alert('Insert Successful')</script>";

   $conn = mysqli_connect('localhost', 'root',  "", 'registration');

   $email_rows = mysqli_query($conn, "SELECT email FROM users WHERE email='john@gmail.com'");

   echo mysqli_fetch_array($email_rows)[0];

   echo '<br>';

   echo mysqli_num_rows($email_rows);
   // if(mysqli_num_rows($email_rows) > 0){
   //   $emailErr = "Email already in use";
   // }
?>
