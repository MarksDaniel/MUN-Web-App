
<?php
include 'include/config.php';
// Start the session
session_start();
?>

<html>
<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="css/RegisterStyle.css" type="text/css"/>
</head>

<body>
      <form class='form' action="process_register.php" method="POST">
              
        <table class='table'>
        <tr>
          <td><label>Username:</label></td>
        <td><input class="field" type="text" id="username" name="user" placeholder="Username" required></td>
        </tr>
        <tr>
          <td><label>Password:</label></td>
        <td><input class="field" type="password" id="password" name="pass" placeholder="Password" required></td>
        </tr>
        <tr>
          <td><label>Fullname:</label></td>
        <td><input class="field" type="text" id="fullname" name="full" placeholder="Fullname" required></td>
        </tr>
        <tr>
          <td><label>Position:</label></td>
        <td><input class="field" type="text" id="position" name="pos" placeholder="Position" required/></td>
        </tr>
        <tr>
          <td><label>Committee:</label></td>
          <td>
        <?php
        
        // Connect to db
            $cnx = mysqli_connect("localhost", "root", "", "cgsmun_db");

        // Check connection
            if ($cnx->connect_error) {
            die("Connection failed: " . $cnx->connect_error);
            }

            $sql_all_comms= "SELECT `CommitteeName` FROM committees ORDER BY `id`";
            $result= mysqli_query($cnx, $sql_all_comms)
                or die("SELECT Error: ".mysqli_error($cnx));
                
            print "<select class='field' name='comm' id='committee'>";
           
            while ($row = mysqli_fetch_array($result)){
                      
            $committee=$row['CommitteeName'];
                        
            print "<option value='". $row['CommitteeName'] ."'>" .$row['CommitteeName'] ."</option>";
           }
           print "</select>";
         ?>
          </td>
        </tr>
        <tr style="min-height: 15px;"></tr>
        <tr>
          <td colspan="2"><input class="button" type="submit" value="register"></td>
        </tr>
      </table>
    </form>
  
</body>
</html>
