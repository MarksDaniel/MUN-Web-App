
<?php
include 'include/config.php';
// Start the session
session_start();
?>

<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/loginStyle.css" type="text/css"/>
</head>

<body>
      <form class='form' action="process_login.php" method="POST">
              
        <table class='table'>
            
            <tr><td align=center colspan="2">If you aren't already registered please follow the link <a href = "register.php">Register here</a></td></tr>
            <tr></tr>
        <tr>
          <td><label>Username:</label></td>
        <td><input class="field" type="text" id="username" name="user" placeholder="Username"/></td>
        </tr>
        <tr>
          <td><label>Password:</label></td>
        <td><input class="field" type="password" id="password" name="pass" placeholder="Password"/></td>
        </tr>
        <tr style="min-height: 15px;"></tr>
        <tr>
          <td colspan="2"><input class="button" type="submit" value="login"></td>
        </tr>
      </table>
    </form>
  
</body>
</html>
