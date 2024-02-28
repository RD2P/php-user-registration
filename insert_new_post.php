<?php 
  session_start();
  $conn = mysqli_connect("localhost", "root", "", 'registration') or die(mysqli_connect_error());

  $post_text = $_POST['post_text'];
  
  $query_get_id = mysqli_query($conn, "SELECT id FROM users WHERE fname='{$_SESSION['fname']}'");
  $res = mysqli_fetch_array($query_get_id);

  $currentuser_id = $res[0];

  $post_text_escaped = mysqli_real_escape_string($conn, $post_text);

  $query = mysqli_query($conn, "INSERT INTO posts (`post`, `user_id_fk`) VALUES ('$post_text_escaped', '$currentuser_id')");

  header("Location: dashboard.php");
?>