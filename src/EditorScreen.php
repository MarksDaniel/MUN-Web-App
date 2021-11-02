  <?php
  
  // retrieve editor's id from the URL
    $url = $_SERVER['REQUEST_URI'];
    $findeq   = '=';
    $pos = strpos($url, $findeq);
    $usr_id = substr($url, $pos+1); 
    $button_view = 'VIEW RESOLUTIONS TO BE EDITED';
    $button_upload = 'UPLOAD EDITED RESOLUTIONS'
  ?>
    
<!DOCTYPE html>
<html>
  <head>
    <title>Page Title</title>
     <link rel="stylesheet" type="text/css" href="css/EditorScreenStyle.css"/>
  </head>
  <body>
<div class="split left">
  <div class="centered">
    <?php
        echo "<a href='EditorViewScreen.php?id=$usr_id'><h2 class='options' id='button'>$button_view</h2></a>";
    ?>
    </div>
</div>

<div class="split right">
  <div class="centered">
    <?php
        echo "<a href='EditorUploadScreen.php?id=$usr_id'><h2 class='options' id='button'>$button_upload</h2></a>";
    ?>
  </div>
</div>
  </body>
</html>

