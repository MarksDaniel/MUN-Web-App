<?php
// error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

$username = $_POST['user'];
$password = $_POST['pass'];

// connect to db
$cxn = mysqli_connect("localhost", "root", "", "cgsmun_db");


// get user's role and id 
$login_query = "SELECT id, role FROM users WHERE username=\"{$username}\" AND password=\"{$password}\"";
$login_result = $cxn->query($login_query);
$login_row = mysqli_fetch_array($login_result);

 if (!empty($login_row))
{
	if ($login_row['role'] == "editor"){
	  header("Location:EditorScreen.php?id={$login_row['id']}");
	} 
elseif ($login_row['role'] == "comm"){ 
	 header("Location:CommitteeUploadScreen.php?id={$login_row['id']}");
  	}
elseif ($login_row['role'] == "secret"){ 
	 header("Location:SecretariatScreen.php?id={$login_row['id']}");
  	}   
elseif ($login_row['role'] == "admin"){ 
	 header("Location:AdminViewScreen.php?id={$login_row['id']}");
  }
}
else
{
	header("Location:login_fail.php");
}


?>