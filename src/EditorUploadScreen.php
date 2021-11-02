<?php
  
  // retrieve editor's id from the URL
    $url = $_SERVER['REQUEST_URI'];
    $findeq   = '=';
    $pos = strpos($url, $findeq);
    $usr_id = substr($url, $pos+1);
    
             
         
  $cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

  //  Check connection
  if ($cnx->connect_error) {
     die("Connection failed: " . $cnx->connect_error);
  } 
  
  $sql_all_comms= "SELECT `CommitteeName` FROM committees ORDER BY `id`";
  $result= mysqli_query($cnx, $sql_all_comms)
     or die("SELECT Error: ".mysqli_error($cnx));         
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Edited Resolution Upload Form</title>
      <link rel="stylesheet" type="text/css" href="css/EditorUploadScreenStyle.css"/>
</head>
<body>
    <h2>Edited Resolution Upload Form</h2>
  
  <div>
    <?php 
       echo "<form action='EditorProcessUpload.php?id=$usr_id' method='post' enctype='multipart/form-data' class='form'>";
  ?>
  
     
      <table class='table'>
        <tr>
          <td><label>Committee: </label></td>
          <td>
           <?php
           print "<select class='field' name='committee' id='committee'>";
           
           while ($row = mysqli_fetch_array($result)){
                                            
              print "<option value='". $row['CommitteeName'] ."'>" .$row['CommitteeName'] ."</option>";
              
           }
           print "</select>";
            ?>          
                  
          </td>
       </tr>
       <tr><td colspan="2"><input class= "btnchoose" type="file" name="file"/></td></tr>
       <tr></tr>
       <tr><td colspan="2"><input class= "button" type="submit" name="submit" value="Upload Resolution"/></td></tr>
  
      </table>
      
  </div>
</form>

</body>
</html>