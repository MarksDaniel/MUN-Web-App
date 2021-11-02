<?php

// retrieve user's id from the URL
    $url = $_SERVER['REQUEST_URI'];
    $findeq   = '=';
    $pos = strpos($url, $findeq);
    $usr_id = substr($url, $pos+1);
    
    $button_view = 'VIEW EDITED RESOLUTIONS AWAITING APPROVAL';
    $button_upload = 'UPLOAD APPROVED RESOLUTIONS'
  ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="css/SecretariatScreenStyle.css"/>
  </head>
  <body>
<div class="split left">
  <div class="centered">
    <?php
     echo "<a href='SecretariatViewScreen.php?id=$usr_id'><h2 class='options' id='button'>$button_view</h2></a>";
    ?>
   </div>
</div>

<div class="split right">
  <div class="centered">
     <?php
      echo "<a href='SecretariatUploadScreen.php?id=$usr_id'><h2 class='options' id='button'>$button_upload</h2></a>";
    ?>
  </div>
</div>
  </body>
</html>