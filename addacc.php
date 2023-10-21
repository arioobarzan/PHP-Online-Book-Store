<?php
require_once "main.php";

if(!$admin)
	die(require "index.php");

if(isset($_POST['ok']))
{	$us = $_POST['user'];

	$result = dbquery("SELECT * FROM users WHERE user = '$us'");
	$me = dbarray($result);
	if(!$me){die( "User Not Found");}
echo "
<form  action='' method='post'>
نام كاربر:";
echo $us."<br /><br />";
echo"
 <input name='user' type='hidden' value=".$us.">
 <input name='acc' type='text' value=".$me['acc'].">  <br /><br /> &nbsp;&nbsp;&nbsp;&nbsp;
 <input type='submit' value='Ok' name='ok2'>
</form>
";
}
elseif(isset($_POST['ok2']))
{	$us = $_POST['user'];
	$ac = $_POST['acc'];

$res = mysql_query("UPDATE `users` SET  `acc` = '$ac' WHERE CONVERT( `user` USING utf8 ) = '$us' ");
if(!$res){die("<font color='#FF0000'>خطا در ثبت شارژ دوباره سعي کنيد</font>". mysql_error());}
echo "تغييرات انجام شد";
}
else
echo "
<form  action='' method='post'>
نام كاربر:
 <input name='user' type='text'>  <br /><br /> &nbsp;&nbsp;&nbsp;&nbsp;
 <input type='submit' value='Search' name='ok'>
</form>
";
require_once "footer.php";
?>