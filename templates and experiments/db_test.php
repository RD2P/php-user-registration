<?php     
  $servername = "localhost";
  $username = "root";
  $dbname = "registration";

  $conn = mysqli_connect($servername, $username,  "", $dbname);

  if(!$conn){
      die("Connection failed: " . mysqli_connect_error()); 
  } 

  echo "Connected to database";
  
  $sql = "INSERT INTO users (id, fname, lname, email, password)
  VALUES (2, 'John', 'Doe', 'john@gmail.com', 'johnpass123')";

  if(mysqli_query($conn, $sql)){
    echo "Insert Successful";
  } else {
    echo "Something went wrong";
  }
        
?>