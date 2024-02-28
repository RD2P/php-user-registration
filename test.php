<?php
   $names = array('Raphael', 'Taylor');
   $dates = array("Feb 21", "Feb 29");
   $posts = array("Hi I'm Raphael", "Hi I'm Tyalor");

   foreach($names as $key => $name) {

      echo "<h4 class='font-bold text-lg text-green-700'>{$name}</h4>";
      echo "<span>&nbsp;&#183; {$dates[$key]}</span>";
      echo "<section>{$posts[$key]}</section>";
   }
?>
