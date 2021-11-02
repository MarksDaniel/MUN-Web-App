<?php
// error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

$username = $_POST['user'];
$password = $_POST['pass'];
$fullname = $_POST['full'];
$position = $_POST['pos'];
$committee = $_POST['comm'];

// connect to db
$cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

// check if user exists - if not, add user
$check="SELECT * FROM users WHERE username = '$username'";   
$chk_result = mysqli_query($cnx,$check);
$data = mysqli_fetch_array($chk_result, MYSQLI_NUM);


if(mysqli_num_rows($chk_result)>=1) {
/*if($data[0] > 1) {*/
     print "<table border=0 align=center>\n"; 
       echo "<tr>\n"; 
       echo "<td align=center><font face=arial size=4/>Username already exists.</font></td>";
       echo "</tr>\n";
       echo "<tr><td align=center><font face=arial size=4/>Please try again or contact the administrator</font></td>";
       echo "</tr>";
       echo "<tr></tr>"; echo "<tr></tr>";       
       echo "<tr><td align=center><a href='register.php'><input type='submit' name='submit' value='Back'></a></td></tr>";
      print "</table>";
}
else
{
    $addUser="INSERT INTO users(username, password, fullname, role, position, committee) values('$username','$password','$fullname','comm', '$position','$committee')";
    if (mysqli_query($cnx,$addUser))
    { 
      print "<table border=0 align=center>\n"; 
       echo "<tr>\n"; 
       echo "<td><font face=arial size=4/>You are now registered</font></td>";
       echo "</tr>\n";
       echo "<tr></tr>"; echo "<tr></tr>"; 
       echo "<tr><td align=center><a href='login.php'><input type='submit' name='submit' value='Go to Login'></a></td></tr>";
      print "</table>";
    }
    
    else
    {
        echo "Error encountered while adding user in database<br/>";
    }
}

?>