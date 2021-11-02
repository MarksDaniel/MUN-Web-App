 <?php

 // retrieve logged-in user's id from the URL
$url = $_SERVER['REQUEST_URI'];
$findeq   = '=';
$pos = strpos($url, $findeq);
$usr_id = substr($url, $pos+1);

/* find logged-in user's username & Fullname */

// Connect to db
$cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

// Check connection
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

//find user's committee (user can upload only for his committee)
$user_query = "SELECT username, fullname, position, committee FROM users WHERE id = \"{$usr_id}\"";
$user_result = mysqli_query($cnx, $user_query);
$user_row = mysqli_fetch_array($user_result);

$user_committee = $user_row['committee'];

?>
 
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Resolution Submit Form</title>
    <link rel="stylesheet" type="text/css" href="css/CommitteeUploadScreenStyle.css"/>
</head>
<body>
  <h2>Resolution Form</h2>


<div>
 
  <?php
  
    echo "<form action='CommitteeProcessUpload.php?id=$usr_id' method='post' enctype='multipart/form-data' class='form'>";
  ?>
      <table class='table'>
        <tr></tr>                   
        <tr><td><label><strong>Committee:</strong></label></td>
         <?php
         echo "<td>$user_committee</td>";
         ?>    
          
        </tr>
 
     <tr><td><strong>Resolution topic:</strong></td>
     <td>
      
 <?php
 //select and show the topic's for this committee only
 
$sql_topics= "SELECT `topic` FROM topics WHERE committee = \"{$user_committee}\"";
$res_topics= mysqli_query($cnx, $sql_topics)
      or die("SELECT Error: ".mysqli_error($cnx));   

        print "<select class='field' name='topic_entered' id='topic'>";
           
          while ($row = mysqli_fetch_array($res_topics)){
                      
             $topicvalue=$row['topic'];
                        
              print "<option value='". $row['topic'] ."'>" .$row['topic'] ."</option>";
           }
           print "</select>";
?>
 </td>
     </tr>
     <tr></tr>   
       
       <tr><td colspan="2"><input class= "btnchoose" type="file" name="file"/><br><p class="text"><strong>Note:</strong> Only .docx format is allowed to a max size of 2 Mb.</p></td></tr>
       <tr></tr>
       <tr><td colspan="2"><input class= "button" type="submit" name="submit" value="Upload Resolution"></td></tr>
      </table>
   </div> 
    
 
</form>

</body>
</html>



  

