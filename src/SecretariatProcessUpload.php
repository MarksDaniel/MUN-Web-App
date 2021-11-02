<?php

// retrieve user's id from the URL
$url = $_SERVER['REQUEST_URI'];
$findeq   = '=';
$pos = strpos($url, $findeq);
$usr_id = substr($url, $pos+1);

$committee = $_POST['committee'];

//properties of file to be uploaded 
$name = $_FILES['file']['name'];
$filesize= $_FILES['file']['size'];
$tmp_name= $_FILES['file']['tmp_name'];
$maxsize= 2000*1024;

$submitbutton = $_POST['submit'];
$path = 'Uploads/secretariat_uploads/';
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$target_file = $path . basename($name);
$fileOK = "yes";
$dbOK = "yes";

/*** submit w/o choosing file ***/
if (empty($_FILES['file']['name'])) {
    die("Choose a file to upload.");
    $fileOK="no";
}

/*** big size ***/
 if($filesize > $maxsize) {
    die("Error: File size is larger than the allowed limit.");
    $fileOK="no";
 }
 
  /*** wrong type ***/
  $extensions= array("docx");
     
if(in_array($fileextension,$extensions)== false){
    die("Error: Extension $fileextensionUPPER is not allowed. Please choose a DOCX file.");
   /*echo "extension $fileextensionUPPER is not allowed, please choose a DOCX file.";*/
   $fileOK="no";
}

 /*** can be uploaded (moved from temp area to target area) ***/
 if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $fileOK="yes";
    } else {
        $fileOK="no";
}

/********** connect to the db and update resolution status and approver info************/

if ($fileOK=="yes") {
    
$dbase = 'cgsmun_db'; 

$cnx = mysqli_connect('localhost', 'root', '', 'cgsmun_db');

// Check connection
if ($cnx->connect_error) {
    die('Connection failed: ' . $cnx->connect_error);
} 

//get approver's info
$approver_query = "SELECT fullname FROM users WHERE id = '{$usr_id}'";
$approver_result = mysqli_query($cnx, $approver_query);
$approver_row = mysqli_fetch_array($approver_result);
$approver_fullname = $approver_row['fullname'];


//get resolution id in order to update its status
$res_id_query = "SELECT id FROM resolutions WHERE committee = '{$committee}' and resolution_filename = '{$name}'";
$res_id_result = mysqli_query($cnx, $res_id_query);
$res_id_row = mysqli_fetch_array($res_id_result);
$res_id = $res_id_row['id'];

//update resolution's approver & status
$status = "approved";

mysqli_query($cnx,"UPDATE resolutions SET status='{$status}', approver='{$approver_fullname}' WHERE id='$res_id'");


if ($fileOK=="yes" && $dbOK=="yes") {
 
  print "<table border=0 align=center>\n"; 
echo "<tr>\n"; 
echo "<td><font face=arial size=4/>Your resolution has been successfully uploaded</font></td>";
echo "</tr>\n";
echo "<tr></tr>"; echo "<tr></tr>";
echo "<tr><td align=center><a href='SecretariatScreen.php?id=$usr_id'><input type='submit' name='submit' value='Return'></a></td></tr>";
print "</table>";
}

mysqli_close($cnx);

}

?>