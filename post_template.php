<?php 
  echo "<article class='flex flex-col max-w-xl mx-auto border border-t-2 p-4'>
          <section class='flex items-center>
            <h4 class='font-semibold text-lg text-green-700'>{$row['user_id_fk']}</h4>
          </section>
          <section>{$row['post']}</section>
        </article>";
?>