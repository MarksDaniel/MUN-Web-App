
<?php
include 'include/config.php';
?>

<html>
<head>
    <title>Fail Login</title>
    <link rel="stylesheet" href="css/loginStyle.css" type="text/css"/>	
</head>

<body>

		
		 <form class='form' action="process_login.php" method="POST">
         <p class="text">Incorrect username or password.<br>Please try again or if you aren't already registered follow the link <a href = "register.php">Register here</a></p><br>
         
      <table class='table'>
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
