<?php

// retrieve logged-in user's id from the URL
$url = $_SERVER['REQUEST_URI'];
$findeq   = '=';
$pos = strpos($url, $findeq);
$usr_id = substr($url, $pos+1);


$topic= $_POST['topic_entered'];

// Connect to db
$cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

// Check connection
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

$user_query = "SELECT username, fullname, position, committee FROM users WHERE id = \"{$usr_id}\"";
$user_result = mysqli_query($cnx, $user_query);
$user_row = mysqli_fetch_array($user_result);
$username = $user_row['username'];
$fullname = $user_row['fullname'];
$position= $user_row['position'];
$user_committee = $user_row['committee'];

//file to be uploaded properties
$name= $_FILES['file']['name'];
$filesize= $_FILES['file']['size'];
$tmp_name= $_FILES['file']['tmp_name'];
$posit= strpos($name, "."); 
$fileextension= substr($name, $posit + 1);
$fileextensionLOWER= strtolower($fileextension);
$fileextensionUPPER= strtoUPPER($fileextension);
$maxsize= 2000*1024;

$submitbutton= $_POST['submit'];

$path= 'Uploads/committee_uploads/';
$target_file = $path . basename($name); 
$fileOK="yes";
$dbOK="yes";

  
/****************** checks on file if *****************************/

/*** submit w/o choosing file ***/
if (empty($_FILES['file']['name'])) {
    die("Choose a file to upload.");
    $fileOK="no";
}

/*** fille already uploaded ***/
if (file_exists($target_file)) {
    die("Error: File already exists.");
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
    $fileOK="no";
}
 
 
/********** if upload is allowed and file is correct -> upload file & insert resolution data into db ************/

if ($fileOK=="yes") {

 
move_uploaded_file($_FILES['file']['tmp_name'], $target_file); // *** file can be uploaded (moved from temp area to target area) ***

$status = 'new';

$sql_ins = "INSERT INTO `resolutions` (`id`, `committee`, `topic`, `username`, `fullname`, `position`, `resolution_filename`, `status`, `editor`) VALUES ('', '$user_committee', '$topic', '$username', '$fullname', '$position', '$name', '$status', '')";

if (mysqli_query($cnx, $sql_ins)) {
    $dbOK= 'yes';
    } else {
    echo 'Error: ' . $sql_ins . '<br>' . mysqli_error($cnx);
   $dbOK= 'no';
}

mysqli_close($cnx);

}


if ($fileOK=="yes" && $dbOK=="yes") {
    print "<table border=0 align=center>\n"; 
echo "<tr>\n"; 
echo "<td><font face=arial size=4/>Your resolution has been successfully uploaded</font></td>";
echo "</tr>\n";
echo "<tr></tr>"; echo "<tr></tr>";
echo "<tr><td align=center><a href='CommitteeUploadScreen.php?id=$usr_id'><input type='submit' name='submit' value='Return'></a></td></tr>";
print "</table>";

}

?>