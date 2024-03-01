<?php 
   $conn = mysqli_connect("localhost", "root", "", 'registration') or die(mysqli_connect_error());

   //returns sql object
   $all_posts = mysqli_query($conn, "SELECT * FROM posts");

   while($row = mysqli_fetch_assoc($all_posts)) {
      include 'post_template.php';
    }
?>