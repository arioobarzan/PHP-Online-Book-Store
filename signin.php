<?php

include "config.php";
$link = mysql_connect ($host, $user, $pass) or die ('Error: ' . mysql_error());
mysql_select_db ($name) or die ('Error: ' . mysql_error());

function dbarray1($query) {
	$result = @mysql_fetch_assoc($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}
function dbquery1($query) {
	$result = @mysql_query($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}
$content = "<br /><br /><br /><br />
<form method='POST' action='signin.php'>
<div align='center'>
<table class='MsoNormalTable' dir='rtl' border='0' cellpadding='0' style='width: 413; margin-left: 3.75pt'>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span lang='FA' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>
      &#1606;&#1575;&#1605;</span><span style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>
      <span lang='fa'>&#1603;&#1575;&#1585;&#1576;&#1585;&#1610;</span></span><span dir='LTR' style='font-size:8.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' style='text-align: justify; text-justify: kashida; text-kashida: 0%' dir='ltr'>
      <span style='font-family: Tahoma,sans-serif; font-size: 8pt; font-weight:700' dir='LTR'>
      <input name='user' size='15' dir='ltr' style='float: right' /></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span style='font-family: Tahoma,sans-serif; font-size: 8pt' lang='fa'>&#1711;&#1584;&#1585;
      &#1608;&#1575;&#1688;&#1607;</span><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:black'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <input type='password' name='pass' size='17' dir='ltr' style='float: right' /></span></td>
    </tr>
</table>
<center>
	&nbsp;<p>
	<input type='submit' value='ورود' name='Submit' style='font-family: Tahoma'/><br>
    </p>
</center></form>";

if(isset($_POST['Submit']))
{
		$user  = $_POST['user'];
		$pass = $_POST['pass'];

	$check = dbquery1("SELECT * FROM users WHERE user = '$user'");
	$me = dbarray1($check);
	if ($me['pass']==$pass) {
	setcookie($_POST['user'], $_POST['pass'], time()+30000, "/");
    require_once "main.php";		echo "You Are Signed In ".$user;
		echo "<SCRIPT>window.location.replace('index.php');</script>";
 }
 else {  require_once "main.php";
   echo "Not Login Bad User Name Or Password".$content;
 }

}
else
{	require_once "main.php";
	echo $content;
}
require_once "footer.php";
?>