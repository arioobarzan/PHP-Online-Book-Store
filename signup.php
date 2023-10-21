<?php
require_once "main.php";
if($username)
	die(require "index.php");
if(isset($_POST['Submit']))
 {
		$user  = $_POST['user'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$name  = $_POST['name'];
		$age   = $_POST['age'];
		$adres = $_POST['adres'];
		$code  = $_POST['code'];
		$email = $_POST['email'];
		$tel   = $_POST['tel'];
		$mob   = $_POST['mob'];
		$error = 0;


		if(!$user || !$pass1 || !$pass2 || !$name || !$age || !$adres || !$code ||!$tel ||!$mob ||!$email)
		 {
			echo "<br /><br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام: لطفا همه ي فيلد ها را پر کنيد
			</font></b></center>
			";
			$error = 1;
		}

		if($pass1 != $pass2)
		{			echo "<br /><br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام:گذرواژه ها همانند نيستند.
			</font></b></center>
			";
			$error = 1;		}



	$check = mysql_query("SELECT * FROM users WHERE user = '$user'");
	$me = dbarray($check);
	$check2 = mysql_num_rows($check);
		if($check2 != '0')
		{
			echo "<br /><br /><center><b><font size='4.5' color='#FF0000'>
			خطا در ثبت نام:نام كاربري موجود است.
			</font></b></center>
			";
			$error = 1;

		}
		if($error)
		{			die("<br /><br /><center>Click <a href='signup.php'>Here</a> For Try Again</center>");		}
$res = mysql_query("INSERT INTO users (user,pass,name,adres,code,tel,mob,email,type,acc,age)
	VALUES ('$user','$pass1','$name','$adres','$code','$tel','$mob','$email','0','0','$age')");
if(!$res){die("<font color='#FF0000'>خطا در ثبت نام لطفا دوباره سعي کنيد</font>". mysql_error());}
echo"<b><br><br><font color='#00F000'><center>Succesfully Registered... ثبت نام با موفقيت انجام شد.</font>
<br />You Can Sign in Now <a href='signin.php'>Click Here</a></center>";}
else {

echo "

<form method='POST'action='signup.php'>
<div align='center'>
<font size='4' face='b nazanin' color='#FF0000'>دقت كنيد تمامي فيلدها بايد پر گردد.</font>
  <br></font><table class='MsoNormalTable' dir='rtl' border='0' cellpadding='0' style='width: 413; margin-left: 3.75pt'>
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
      <input type='text' name='user' size='30' dir='ltr' /></span></td>
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
      <input type='text' name='name' size='30' dir='ltr' /></span></td>
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
      <input type='text' name='age' size='30' dir='ltr' /></span></td>
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
      <textarea rows='4' name='adres' cols='24' dir='rtl'></textarea></span></td>
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
      <input type='text' name='code' size='30' dir='ltr' /></span></td>
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
      <input type='text' name='tel' size='30' dir='ltr' /></span></td>
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
      <input type='text' name='mob' size='30' dir='ltr' /></span></td>
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
      <input type='text' name='email' size='30' dir='ltr' /></span></td>
    </tr>
  </table>
</div>
<p>
<br><br></p>
<center>
	<input type='submit' value='&#1578;&#1705;&#1605;&#1610;&#1604; &#1579;&#1576;&#1578; &#1606;&#1575;&#1605;' name='Submit' style='font-family: Tahoma'/><br>
</center>
</form>


";
}

require_once "footer.php";
?>