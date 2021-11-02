<?php

// Take the parameters passed in the URL: editor's id & resolution's id 

$url = $_SERVER['REQUEST_URI'];
$findamper   = '&';
$pos = strpos($url, $findamper);
$editor_id = substr($url, $pos+1);

                                                                        

 // Find the resolution id of the file to be downloaded using function extractString() 
$resol_id = extractString($url, '=', '&');
 
// Function that returns the string between two strings.
function extractString($url, $start, $end) {
    $url = " ".$url;
    $ini = strpos($url, $start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($url, $end, $ini) - $ini;
    return substr($url, $ini, $len);
}
                                                                     
 
// connect to the database

$cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

// Check connection
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
} 
                                                                        
// find editor's fullname
$editor_query = "SELECT fullname FROM users WHERE id = \"{$editor_id}\"";
$editor_result = mysqli_query($cnx, $editor_query);
$editor_row = mysqli_fetch_array($editor_result);
$editor_fullname = $editor_row['fullname'];
                                                                  

// find resolution's filename
$resol_query = "SELECT resolution_filename FROM resolutions WHERE id = \"{$resol_id}\"";
$resol_result = mysqli_query($cnx, $resol_query);
$resol_row = mysqli_fetch_array($resol_result);
$resol_filename = $resol_row['resolution_filename'];
                                                                        

$path= 'Uploads/committee_uploads/';
$filePath = $path . $resol_filename;

                                                                        
// download file (and not open it on browser)

function downloadFile($filePath)
{
    header("Content-type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);
}

downloadFile($filePath);

// update resolution with status and editor's name
$status = "being edited";

        mysqli_query($cnx,"UPDATE resolutions SET status='{$status}', editor='{$editor_fullname}'
         WHERE id='$resol_id'");
        
mysqli_close($cnx);

?>