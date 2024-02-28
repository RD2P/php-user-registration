<?php
   $names = array('Raphael', 'Taylor');
   $dates = array("Feb 21", "Feb 29");
   $posts = array("Hi I'm Raphael", "Hi I'm Tyalor");

   foreach($names as $key => $name) {

      echo "<article class='flex flex-col max-w-xl mx-auto border border-t-2 p-4'>
               <section class='flex items-center>
                  <h4 class='font-semibold text-lg text-green-700'>{$name}</h4>
                  <span>&nbsp;&#183; {$dates[$key]}</span>
               </section>
               <section>{$posts[$key]}</section>
            </article>";
   }
?>
