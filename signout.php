<?php
if(isset($_GET['username']))
{
	$username=$_GET['username'];
	setcookie($username,"", time()-60, "/");
}
require_once("index.php");
echo "<SCRIPT>window.location.replace('index.php');</script>";
?>