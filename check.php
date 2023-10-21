<?php
require_once "main.php";
if(!$admin)
	die(require "index.php");


$fas  = dbquery("SELECT DISTINCT `fact` FROM factors WHERE stat = 'second'");
if(isset($_POST['sub']))
{  while ($data = dbarray($fas)) {  	$fa = $data['fact'];  	switch($_POST["sel".$fa])
  	{  		 case 'Progressed':
  		    dbquery("UPDATE factors SET `stat`='Progressed' where `fact`='$fa'");
  		    echo "انجام شد." ;
  		 break;
  		 case 'Sent':
           dbquery("UPDATE factors SET `stat`='Sent' where `fact`='$fa'");
  		    echo "انجام شد." ;
  		 break;  	}
  }}
else {
echo "<form method='post' action='check.php'>
<table border='1' cellpadding='0' cellspacing='0' width='100%' dir='rtl'>\n<tr>\n
		<td valign='top' align='center'>شماره فاكتور</td>\n
		<td valign='top' align='center'>وضعيت</td>\n
		";

	while ($data = dbarray($fas)) {
			echo "</tr>\n<tr>\n";
			echo "<td valign='top' align='center'>".$data['fact']."</td>\n";
			echo "<td valign='top' align='center'><select name='sel".$data['fact']."' dir='ltr'>
			<option selected>In Progress</option>
			<option>Progressed</option>
			<option>Sent</option>
			</select></td>\n";
			}
			echo "</tr>
			</table><br /><br /><center><input type='submit' name='sub' value='تغيير وضعيت'></center>";
}
require_once "footer.php";
?>