<?php 
  // TODO add db connection to session upon login/registration
  // session_start();
  // $conn = $_SESSION['db_connection'];

  $conn = mysqli_connect("localhost", "root", "", 'registration') or die(mysqli_connect_error());

  $post_text = $_POST['post_text'];
  echo $post_text;
?>