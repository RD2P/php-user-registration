<?php
   // echo "<script>alert('Insert Successful')</script>";

   $conn = mysqli_connect('localhost', 'root',  "", 'registration');

   $sql = "SELECT * FROM users WHERE email='john@gmail.com'";

   $result = mysqli_fetch_array(mysqli_query($conn, $sql));
   // $result = mysqli_fetch_array($result);

   // foreach($row as $val){
   //    echo $val . '<br>';
   // }

   echo $result['email'];
?>
