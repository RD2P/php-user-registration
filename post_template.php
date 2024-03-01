<?php 
  //find fname of $row['user_id_fk']
  $result = mysqli_query($conn, "SELECT fname FROM users WHERE id={$row['user_id_fk']}");

  $username = mysqli_fetch_array($result);

  echo "<article class='flex flex-col max-w-xl mx-auto border border-t-2 p-4'>
          <section class='flex items-center'>
            <h4 class='font-semibold text-lg text-green-700'>{$username[0]}</h4>
          </section>
          <section>{$row['post']}</section>
        </article>";
?>