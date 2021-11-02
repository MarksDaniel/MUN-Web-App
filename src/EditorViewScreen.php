<?php

// retrieve editor's id from the URL
$url = $_SERVER['REQUEST_URI'];
$findeq   = '=';
$pos = strpos($url, $findeq);
$found_id = substr($url, $pos+1);                                 


// Connect to db
$cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

// Check connection
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
} 
                                                                  

//from all entries in resolutions tbl
$sql_new_files= "SELECT `id`, `committee`, `topic`, `resolution_filename`, `status` FROM resolutions ORDER BY `id`";
$result= mysqli_query($cnx, $sql_new_files)

or die("SELECT Error: ".mysqli_error($cnx));


// draw table with only the "new" resolutions

print "<table id='editorstbl' border=1>\n";

/** print header **/
echo "<tr>\n";
echo "<th onclick='sortTable(0)'>ResId</th>";
echo "<th style='width:260px' onclick='sortTable(1)'>Committee</th>";
echo "<th onclick='sortTable(2)'>Topic</th>";
echo "<th onclick='sortTable(3)'>Filename</th>"; 
echo "<th>Action</th>"; 
echo "</tr>\n";

/** print the rest of the table **/
while ($row = mysqli_fetch_array($result)){
    if ($row['status'] == "new"){
$resolution_id_value = $row['id'];                          
$committeevalue=$row['committee'];
$topicvalue= $row['topic'];
$files_field= $row['resolution_filename'];
$statusvalue= $row['status'];

echo "<tr>\n";
echo "<td>$resolution_id_value</td>";
echo "<td>$committeevalue</td>";
echo "<td>$topicvalue</td>";
echo "<td><div align=center>$files_field</div></td>";
echo "<td><div align=center><form action='EditorProcessView.php?id=$resolution_id_value&$found_id' method='post' enctype='multipart/form-data'><input type='submit' name='submit' value='Download File'/></form></div></td>";
echo "</tr>\n";
}
}

mysqli_close($cnx);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Resolution Submit Form</title>
    <link rel="stylesheet" type="text/css" href="css/EditorViewScreenStyle.css"/> 
</head>
<body>
  <h2>NEW Resolutions to be edited</h2>
  
  <div class="text"><strong>Click the headers to sort the table accordingly.</strong></div> <p>
  
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("editorstbl");
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


