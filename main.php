<?php  include("config.php");

$msg = "";
	if(isset($_SERVER['HTTP_COOKIE']))
		{
			$visitor = false;

    $pos1 = strpos($_SERVER['HTTP_COOKIE'] ,"=");
    $pos2 = strpos($_SERVER['HTTP_COOKIE'] ,";");

    $username = substr($_SERVER['HTTP_COOKIE'], 0 , $pos1);
    if(!$pos2)
 	    $password = substr($_SERVER['HTTP_COOKIE'], $pos1 + 1);
    else
  	  $password = substr($_SERVER['HTTP_COOKIE'], $pos1 + 1, $pos2 - $pos1 -1);
    $msg = "Hello ".$username;
    }
    else
    {
    	$msg = "Hello Guest,Wellcome";
    	$visitor = true;
    }
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="fa">
<head>
<title>--> Online Book Shop <--<?php print $_SERVER['PHP_SELF']?></title>
</head>

<body>
<?php

$link = mysql_connect ($host, $user, $pass) or die ('Error: ' . mysql_error());
mysql_select_db ($name) or die ('Error: ' . mysql_error());

$admin=0;
$check = dbquery("SELECT * FROM users WHERE user = '$username' and pass = '$password'");
if($check && $username)
{
	$me = dbarray($check);
	$admin = $me['type'];
	if ($admin)
		$msg .= ". You Are Admin.";
	else
		$msg .= ". You Are Normal User.";
}



echo "

<style>
<!--
p
	{margin-right:0cm;
	margin-left:0cm;
	font-size:12.0pt;
	font-family:'Times New Roman','serif';
	}
 p.MsoNormal
	{mso-style-parent:'';
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:'Perpetua','serif';
	color:black}
table.MsoTableMediumGrid1Accent2
	{border:1.0pt solid #CF7B79;
	font-size:10.0pt;
	font-family:'Times New Roman','serif'}
table.MsoTableMediumGrid2Accent2
	{border:1.0pt solid #C0504D;
	font-size:10.0pt;
	font-family:'Cambria','serif';
	color:black;
	}
h1
	{margin-top:24.0pt;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	line-height:115%;
	page-break-after:avoid;
	font-size:14.0pt;
	font-family:'Cambria','serif';
	color:#365F91;
	font-weight:bold}
p.section
	{margin-top:16.0pt;
	margin-right:0cm;
	margin-bottom:2.0pt;
	margin-left:0cm;
	font-size:14.0pt;
	font-family:'Franklin Gothic Book','sans-serif';
	color:#9B2D1F;
	font-weight:bold}
-->
</style>
";
echo "
<div align='right'>
  <table class='MsoTableMediumGrid1Accent2' dir='rtl' border='1' cellspacing='0' cellpadding='0' style='border-collapse: collapse; border: medium none'>
    <tr style='height: 7.8pt'>
      <td width='1233' style='width: 924.75pt; height: 7.8pt; border: 1.0pt solid #CF7B79; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0cm; padding-bottom: 0cm; background: #EFD3D2'>
      <p class='MsoNormal' align='center' dir='RTL' style='text-align: center; direction: rtl; unicode-bidi: embed'>
      <b>
      <span lang='AR-SA' style='font-size: 2.0pt; line-height: 115%; font-family: B Nazanin'>
      &nbsp;</span></b></td>
    </tr>
    <tr style='height: 42.9pt'>
      <td width='1233' style='width: 924.75pt; height: 42.9pt; border-left: 1.0pt solid #CF7B79; border-right: 1.0pt solid #CF7B79; border-top: medium none; border-bottom: 1.0pt solid #CF7B79; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0cm; padding-bottom: 0cm; background: #DFA7A6'>
      <p class='MsoNormal' align='center' dir='RTL' style='text-align: center; direction: rtl; unicode-bidi: embed'>
      <b>
      <span dir='LTR' style='font-size: 36.0pt; line-height: 115%; color: #9B2D1F'>
      Online Book Shop</span></b></td>
    </tr>
    <tr>
      <td width='1233' style='width: 924.75pt; border-left: 1.0pt solid #CF7B79; border-right: 1.0pt solid #CF7B79; border-top: medium none; border-bottom: 1.0pt solid #CF7B79; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0cm; padding-bottom: 0cm; background: #EFD3D2'>
      <p class='MsoNormal' align='center' dir='RTL' style='text-align: center; direction: rtl; unicode-bidi: embed'>
      <b>
      <span lang='AR-SA' style='font-size: 2.0pt; line-height: 115%; font-family: B Nazanin'>
      &nbsp;</span></b></td>
    </tr>
  </table>
</div>

<div align='right'>
  <table class='MsoTableMediumGrid2Accent2' dir='rtl' border='1' cellspacing='0' cellpadding='0' style='border-collapse: collapse; border: medium none'>
    <tr style='height: 344.8pt'>
      <td width='219' valign='top' style='width: 164.2pt; height: 344.8pt; border: medium none; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0cm; padding-bottom: 0cm; background: white'>
      <ul>


        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span style='color: #FFC000; font-weight: normal'><b>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000'>
        <a href='index.php' style='text-decoration: none'><font color='#FFC000'>
        صفحه اصلي</font></a></span></b></span></h1>
        </li>

        ";

        if(!$visitor)
        echo"
        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000; font-weight: normal'>
        <a href='edit.php' style='color: blue; text-underline: single; text-decoration: none'>
        <b><span style='color: #FFC000'>
        ويرايش مشخصات</span></b></a></span></h1>
        </li>

        ";
        if($visitor)
        echo"
        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000; font-weight: normal'>
        <a href='signin.php' style='color: blue; text-underline: single; text-decoration: none'>
        <b><span style='color: #FFC000'>
        ورود به سيستم</span></b></a></span></h1>
        </li>

        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000; font-weight: normal'>
        <a href='signup.php' style='color: blue; text-underline: single; text-decoration: none'>
        <b><span style='color: #FFC000'>
        ثبت نام</span></b></a></span></h1>
        </li>
        ";
        if($admin)
        echo"
        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000; font-weight: normal'>
        <a href='admin.php' style='color: blue; text-underline: single; text-decoration: none'>
        <b><span style='color: #FFC000'>
        پنل مديريت</span></b></a></span></h1>
        </li>
        ";
        echo"
        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000; font-weight: normal'>
        <a href='search.php' style='color: blue; text-underline: single; text-decoration: none'>
        <b><span style='color: #FFC000'>
        جستجوي كتاب</span></b></a></span></h1>
        </li>


        <li dir='rtl'>
        <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
        <span lang='AR-SA' style='font-family: B Nazanin; color: #FFC000; font-weight: normal'>
        <a href='aboutus.php' style='color: blue; text-underline: single; text-decoration: none'>
        <b><span style='color: #FFC000'>
        درباره ما</span></b></a></span></h1>
        </li>


      </ul>
      <h1 dir='RTL' style='text-align: right; direction: rtl; unicode-bidi: embed'>
      <font color='#FFC000'><span dir='LTR' style='font-weight: normal'>&nbsp;</span></font></h1>
      </td>


      <td width='1005' valign='top' style='width: 753.85pt; height: 344.8pt; border: 1.0pt solid #C0504D; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0cm; padding-bottom: 0cm; background: #EFD3D2'>
<p style='text-align:left;direction:rtl;font-size: 9.0pt; font-family: B Nazanin;'>";
echo $msg;
if(!$visitor)
	echo "  <a href='signout.php?username=".$username."' name='exit' value='Submit'>Sign Out</a>";
echo "</p>";

function dbquery($query) {
	$result = @mysql_query($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbcount($field, $table, $conditions = "") {
	$cond = ($conditions ? " WHERE ".$conditions : "");
	$result = @mysql_query("SELECT Count".$field." FROM ".$table.$cond);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		$rows = mysql_result($result, 0);
		return $rows;
	}
}

function dbresult($query, $row) {
	$result = @mysql_result($query, $row);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbrows($query) {
	$result = @mysql_num_rows($query);
	return $result;
}

function dbarray($query) {
	$result = @mysql_fetch_assoc($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbarraynum($query) {
	$result = @mysql_fetch_row($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbconnect($db_host, $db_user, $db_pass, $db_name) {
	$db_connect = @mysql_connect($db_host, $db_user, $db_pass);
	$db_select = @mysql_select_db($db_name);
	if (!$db_connect) {
		die("<div style='font-family:Verdana;font-size:11px;text-align:center;'><b>Unable to establish connection to MySQL</b><br />".mysql_errno()." : ".mysql_error()."</div>");
	} elseif (!$db_select) {
		die("<div style='font-family:Verdana;font-size:11px;text-align:center;'><b>Unable to select MySQL database</b><br />".mysql_errno()." : ".mysql_error()."</div>");
	}
}
?>