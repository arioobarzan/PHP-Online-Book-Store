<?php
require_once "main.php";

$time = date("Y/m/d  G:i:s", time());

if(!$username)
	die(require "index.php");
$us  = dbarray(dbquery("Select * from users where user='$username'"));
$ssn = $us['name'];
$tel = $us['tel'];
$adr = $us['adres'];
$acc = $us['acc'];

$no=0;
  if(isset($_GET['no']))
  	$no = $_GET['no'];

$fact=0;
  if(isset($_GET['fact']))
  	$fact = $_GET['fact'];

if($fact==0)
{  $sp  = dbarray(dbquery("Select max(fact) from factors"));
	$fact = (int)$sp['max(fact)']+1;}

$sp  = dbarray(dbquery("Select max(no) from factors"));
$col = (int)$sp['max(no)']+1;

if($no!= 0)
{	  echo "تاريخ:".$time."<br />نام خريدار:".$ssn."<br />شماره فاكتور:".$fact."<br />آدرس:".$adr."<br />شماره تماس:".$tel;
		echo "<center><form method='post' action='buy.php?fact=".$fact."&no=".$no."'>
		<table border='1' cellpadding='0' cellspacing='0' width='100%' dir='rtl'>\n<tr>\n
		<td valign='top' align='center'>رديف</td>\n

		<td valign='top' align='center'>نام كتاب</td>\n
		<td valign='top' align='center'>ISBN</td>\n

		<td valign='top' align='center'>مبلغ</td>\n
		<td valign='top' align='center'>وضعيت</td>\n
		</tr>
		";}
$mm = "";
if(isset($_POST['submit']))
  {  	$allow="";  	$sum=0;
  	$radif=1;    for($i = 1; $i <= $no; $i++)
    {      if($_POST["buys".$i]=="Add To Basket")
      {      	$status = "first";      	$isb = $_POST["buy".$i];      	$bok  = dbarray(dbquery("Select * from books where isbn='$isb'"));
				$nam = $bok['name'];
				$pri = $bok['price'];      	$res = mysql_query("INSERT INTO factors (no,fact,date,user,tel,adres,book,isbn,stat,price)
      		VALUES ('$col','$fact','$time','$username','$tel','$adr','$nam','$isb','$status','$pri')");
      	if(!$res){echo mysql_error();}
      	$col++;
      	echo"<tr>\n
      	<td valign='top' align='center'>".$radif."</td>\n
				<td valign='top' align='center'>".$nam."</td>\n
				<td valign='top' align='center'>".$isb."</td>\n

				<td valign='top' align='center'>".$pri."</td>\n
				<td valign='top' align='center' dir='ltr'><select name='sta".$radif."'><option selected>OK</option>
			<option>DELETE</option></select><input type='hidden' name='stas".$radif."' value='".$isb."'></td>\n
				</tr>
				";
				$sum=$sum+$pri;
				$radif++;      }

      if($_POST["ints".$i]!="Select")
      {      	$point = (int)$_POST["ints".$i];
        $isb = $_POST["int".$i];
      	$qu = dbarray(dbquery("Select intavg from books where isbn=".$isb));
      	$avg = (int)$qu['intavg'];

      	$qu = dbarray(dbquery("Select intno from books where isbn=".$isb));
      	$ino = (int)$qu['intno'];

      	$nno = $ino + 1;
      	$navg = ((double)($ino * $avg) + $point) / $nno;

      	dbquery("UPDATE `books` SET `intavg` = '$navg' , `intno` = '$nno' WHERE `isbn`= '$isb';");
      	$mm = "<br />امتياز دهي شما ثبت شد.";      }
    }
    if($acc>=$sum) {
			$allow="ok";
		}
    echo "</table><input type='submit' value='بازخواني سفارش' name='sub'></form><br />
    وضعيت فاكتور:
     تاييد نشده
     <br />جمع كل:".$sum;
     if($allow=="ok")
   			echo "<br><form method='post' action='final.php?fact=".$fact."'>
			<input type='submit' value='تاييد نهايي' name='sub'></form>";
		 else
				echo"<br />حساب شما براي خريد كافي نيست";
			echo "</center><br /><br />".$mm;  }
  elseif(isset($_POST['sub']))
  {		$sp  = dbarray(dbquery("Select count(no) as con from factors where fact='$fact'"));
		$radif = (int)$sp['con'];  	for($i = 1; $i <= $radif; $i++)
    {    	if($_POST["sta".$i]=="DELETE")
    	{
    	  $isb = $_POST["stas".$i];
    	 	dbquery("DELETE FROM `factors` WHERE `isbn`='$isb' AND `fact`='$fact'");
    	}    }
    loader($fact,$username);  }
  else loader($fact,$username);
function loader($fac,$use)
{
	 $num = 0;
	 $sum = 0;   $qu = dbquery("Select * from factors where fact='$fac' AND user='$use'");
   $sec =0;
   $st="تاييد نشده";
   $allow = "";

   		while ($data = dbarray($qu)) {
			$num++;
			echo "</tr>\n<tr>\n";
			echo "<td valign='top' align='center'>".$num."</td>\n";
			echo "<td valign='top' align='center'>".$data['book']."</td>\n";
			echo "<td valign='top' align='center'>".$data['isbn']."</td>\n";
			echo "<td valign='top' align='center'>".$data['price']."</td>\n";
			$sum = $sum + (int)$data['price'];
			if($data['stat']=='first')
      	echo "<td valign='top' align='center' dir='ltr'><select name='sta".$num."'><option selected>OK</option>
			<option>DELETE</option></select><input type='hidden' name='stas".$num."' value='".$data['isbn']."'></td>\n";
			else{$sec=1;
         echo "<td valign='top' align='center'>تاييد شده</td>\n";
         $st="تاييد شده";
         }
		}
		$quu = dbquery("Select * from users where user='$use'");
		if((int)$quu['acc']>=$sum)$allow="ok";
		echo "</tr>\n</table>\n";
    if($num==0)
    	return;
    if($sec==0)
			echo "<input type='submit' value='بازخواني سفارش' name='sub'></form>";
		echo "<br />
    وضعيت فاكتور:
      ".$st."
     <br />جمع كل:".$sum;
    if($sec == 0 && $allow == "ok")
    	echo "<br><form method='post' action='final.php?fact=".$fac."'>
			<input type='submit' value='تاييد نهايي' name='sub'></form>";
		else
			echo"<br />حساب شما براي خريد كافي نيست";}
require_once "footer.php";
?>