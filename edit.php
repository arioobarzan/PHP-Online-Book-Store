<?php


if(!isset($_SERVER['HTTP_COOKIE']))
	die(require "index.php");
else
{	  $pos1 = strpos($_SERVER['HTTP_COOKIE'] ,"=");
    $pos2 = strpos($_SERVER['HTTP_COOKIE'] ,";");

    $usernames = substr($_SERVER['HTTP_COOKIE'], 0 , $pos1);
    if(!$pos2)
 	  $passwords = substr($_SERVER['HTTP_COOKIE'], $pos1 + 1);
    else
  	$passwords = substr($_SERVER['HTTP_COOKIE'], $pos1 + 1, $pos2 - $pos1 -1);}


if(isset($_POST['Submit']))
 {
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$pass3 = $_POST['pass3'];
		$names = $_POST['name'];
		$age   = $_POST['age'];
		$adres = $_POST['adres'];
		$code  = $_POST['code'];
		$email = $_POST['email'];
		$tel   = $_POST['tel'];
		$mob   = $_POST['mob'];
		$error = 0;
    $err = "";


    if($pass3 != $passwords && $pass3)
    {    	 			$err .= "<br /><br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام:گذر واژه اشتباه است.
			</font></b></center>
			";
			$error = 1;    }
		if($pass1 != $pass2)
		{
			$err .= "<br /><br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام:گذرواژه ها همانند نيستند.
			</font></b></center>
			";
			$error = 1;
		}
		if(!$error)
    	$changepass = ($pass1 && $pass2 && $pass3)? "`pass` = '$pass1'," : "";
    if($changepass)setcookie($usernames,$pass1, time()+300, "/");
    else {$err .= "<br /> <br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام:گذرواژه ها همانند نيستند.
			</font></b></center>";     $error=1;}

require_once "main.php";
$check = mysql_query("SELECT * FROM users WHERE user = '$username' and pass='$password'");
$me = dbarray($check);
		if(!$name || !$age || !$adres || !$code ||!$tel ||!$mob ||!$email)
		 {
			$err .= "<br /><br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام: لطفا همه ي فيلد ها را پر کنيد
			</font></b></center>
			";
			$error = 1;
		}


		if($error)
		{
			die($err ."<br /><br /><center>Click <a href='edit.php'>Here</a> For Back</center>");
		}


$res = mysql_query("UPDATE `users` SET ".$changepass."
`name` = '$names',
`age` = '$age',
`mob` = '$mob',
`tel` = '$tel',
`adres` = '$adres',
`email` = '$email',
`code` = '$code' WHERE CONVERT( `user` USING utf8 ) = '$username' ");
if(!$res){die("<font color='#FF0000'>خطا در ثبت نام دوباره سعي کنيد</font>". mysql_error());}
echo"<b><br><br><font color='#00F000'><center>Succesfully Registered
تغييرات  با موفقيت انجام شد.
</font>
<SCRIPT>window.location.replace('edit.php');</script>";
}
  else{require_once "main.php";
	$check = mysql_query("SELECT * FROM users WHERE user = '$username' and pass='$password'");
	$me = dbarray($check);}

echo "

<form method='POST'action='edit.php'>
<div align='center'>
<table class='MsoNormalTable' dir='rtl' border='0' cellpadding='0' style='width: 413; margin-left: 3.75pt'>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span lang='FA' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>گذرواژه كنوني:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' style='text-align: justify; text-justify: kashida; text-kashida: 0%' dir='ltr'>
      <span style='font-family: Tahoma,sans-serif; font-size: 8pt; font-weight:700' dir='LTR'>
      <input type='password' name='pass3' size='32' dir='ltr' /></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span style='font-family: Tahoma,sans-serif; font-size: 8pt' lang='fa'>گذر واژه جديد:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <input type='password' name='pass1' size='32' dir='ltr' /></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span style='font-family: Tahoma,sans-serif; font-size: 8pt' lang='fa'>
      &#1578;&#1603;&#1585;&#1575;&#1585; &#1711;&#1584;&#1585; &#1608;&#1575;&#1688;&#1607;</span><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:black'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <input type='password' name='pass2' size='32' dir='ltr' /></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span style='font-size: 8pt' lang='fa'><b>
      <span style='font-family: Tahoma,sans-serif'>&#1606;&#1575;&#1605; &#1608; &#1606;&#1575;&#1605; &#1582;&#1575;&#1606;&#1608;&#1575;&#1583;&#1711;&#1610;</span></b></span><b><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:black'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <input type='text' name='name' size='30' dir='ltr' value='".$me['name']."' /></span></td>
    </tr>
        <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span style='font-size: 8pt' lang='fa'><b>
      <span style='font-family: Tahoma,sans-serif'>سن</span></b></span><b><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:black'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <input type='text' name='age' size='30' dir='ltr' value='".$me['age']."'/></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span style='font-size: 8pt' lang='fa'><b>
      <span style='font-family: Tahoma,sans-serif'>&#1570;&#1583;&#1585;&#1587;</span></b></span><b><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:black'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <textarea rows='4' name='adres' cols='24' dir='rtl' >".$me['adres']."</textarea></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span style='font-family: Tahoma,sans-serif; font-weight: 700; font-size: 8pt' lang='fa'>
      &#1603;&#1583; &#1605;&#1604;&#1610;:</span></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;
  color:black; font-weight:700'>
      <input type='text' name='code' size='30' dir='ltr' value='".$me['code']."'/></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span lang='FA' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>
      &#1578;&#1604;&#1601;&#1606; &#1579;&#1575;&#1576;&#1578;</span><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;; font-weight:700'>
      <input type='text' name='tel' size='30' dir='ltr' value='".$me['tel']."'/></span></td>
    </tr>
    <tr>
      <td style='width:145;padding:0cm; '>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span lang='FA' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>
      &#1578;&#1604;&#1601;&#1606; &#1607;&#1605;&#1585;&#1575;&#1607;</span><span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>:</span></b></td>
      <td style='width:262;padding:0cm; ' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;; font-weight:700'>
      <input type='text' name='mob' size='30' dir='ltr' value='".$me['mob']."'/></span></td>
    </tr>
    <tr style='height: 10.15pt'>
      <td style='width:145;padding:0cm;height:10.15pt'>
      <p class='MsoNormal' dir='RTL' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <b>
      <span lang='FA' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>
      &#1575;&#1610;&#1605;&#1610;&#1604;</span><span dir='LTR' style='font-size:8.0pt;
  font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;'>:&nbsp;</span></b></td>
      <td style='width:262;padding:0cm;height:10.15pt' align='left' dir='ltr'>
      <p class='MsoNormal' dir='ltr' style='text-align:justify;text-justify:kashida;
  text-kashida:0%'>
      <span dir='LTR' style='font-size:8.0pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;; font-weight:700'>
      <input type='text' name='email' size='30' dir='ltr' value='".$me['email']."'/></span></td>
    </tr>
  </table>
</div>
<p>
<br><br></p>
<center>
	<input type='submit' value='به روز رساني' name='Submit' style='font-family: Tahoma'/><br>
</center>
</form>


";

require_once "footer.php";
?>