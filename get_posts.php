
<?php 
   $conn = mysqli_connect("localhost", "root", "", 'registration') or die(mysqli_connect_error());

   //returns sql object, turn into array
   $all_posts = mysqli_query($conn, "SELECT * FROM posts");

  //  $posts_array = mysqli_fetch_assoc($all_posts);

  //  foreach($posts_array as $key => $row){
  //   echo $key . ' --> ' . $row . '<br>';
  //  }
   while($row = mysqli_fetch_assoc($all_posts)) {
      include 'post_template.php';
    }

?>