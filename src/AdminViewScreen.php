<?php

$table = "resolutions"; 

$cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

// Check connection
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
} 


$sql_all_files= "SELECT `id`, `committee`, `topic`, `username`, `fullname`, `position`, `resolution_filename`, `status`, `editor`, `approver` FROM $table ORDER BY `id`";
$result= mysqli_query($cnx, $sql_all_files)
or die("SELECT Error: ".mysqli_error($cnx));

print "<table id='adminstbl' border=1>\n";

/*** print the header ***/
print "<tr>\n";
print "<th onclick='sortTable(0)'>ResId</th>";
print "<th style='width:90px' onclick='sortTable(1)'>Committee</th>";
print "<th onclick='sortTable(2)'>Topic</th>";
print "<th style='width:200px' onclick='sortTable(3)'>Full Name</th>";
print "<th onclick='sortTable(4)'>Filename</th>";
print "<th style='width:95px' onclick='sortTable(5)'>Status</th>";
print "<th style='width:110px' onclick='sortTable(6)'>Editor</th>";
print "<th style='width:110px' onclick='sortTable(7)'>Approver</th>";
print "</tr>\n";

/*** print the rest of the table (while there are rows meeting the criteria ***/ 
while ($row = mysqli_fetch_array($result)){
$idvalue=$row['id'];
$committeevalue=$row['committee'];
/*** use the CommitteeShort name for less screen space */
    
$commshort_query = "SELECT CommitteeShort FROM committees WHERE CommitteeName = \"{$committeevalue}\"";
$commshort_result = mysqli_query($cnx, $commshort_query);
$commshort_row = mysqli_fetch_array($commshort_result);
$commshort_name = $commshort_row['CommitteeShort'];

    
$topicvalue= $row['topic'];
$usernamevalue=$row['username'];
$fullnamevalue=$row['fullname'];
$positionvalue= $row['position'];
$statusvalue= $row['status'];
$files_field= $row['resolution_filename'];
$editorvalue= $row['editor'];

if($editorvalue == NULL){
  $editorvalue = "N/A";
}

$approvervalue= $row['approver'];

if($approvervalue == NULL){
  $approvervalue = "N/A";
}

print "<tr>\n";
print "<td>$idvalue</td>";
print "<td>$commshort_name</td>";
print "<td>$topicvalue</td>";
print "<td>$fullnamevalue</td>";

/*** according to it's status the file link points to the secretariat, committee or editor upload folder*/

if($statusvalue == 'approved'){
  print "<td><div align=center><a href='uploads/secretariat_uploads/$files_field'>$files_field</a></div></td>";
} elseif (($statusvalue == 'edited') or ($statusvalue == 'being approved')){
   print "<td><div align=center><a href='uploads/editor_uploads/$files_field'>$files_field</a></div></td>";
} else {
   print "<td><div align=center><a href='uploads/committee_uploads/$files_field'>$files_field</a></div></td>"; 
}


print "<td>$statusvalue</td>";
print "<td>$editorvalue</td>";
print "<td>$approvervalue</td>";

print "</tr>\n";
} 

mysqli_close($cnx);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Admin View</title>
   <link rel="stylesheet" type="text/css" href="css/AdminViewScreenStyle.css"/>
   
</head>

<body>
   <h2>All Resolutions - Quick View</h2>
   
<div class="text"><strong>Click the headers to sort the table accordingly.</strong></div> <p>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("adminstbl");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      
      var cmpX=isNaN(parseInt(x.innerHTML))?x.innerHTML.toLowerCase():parseInt(x.innerHTML);
      var cmpY=isNaN(parseInt(y.innerHTML))?y.innerHTML.toLowerCase():parseInt(y.innerHTML);

      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (cmpX > cmpY) {
        /*if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {*/
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (cmpX < cmpY) {
        /*if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {*/
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script> 

</body>
</html>

