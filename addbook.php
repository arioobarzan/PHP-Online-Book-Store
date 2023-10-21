<?php
require_once "main.php";
if(!$admin)
	die(require "index.php");

if(isset($_POST['Submit']))
{$name     = $_POST['name'];
$isbn     = $_POST['isbn'];
$auth     = $_POST['author'];
$subj     = $_POST['subject'];
$publ     = $_POST['publisher'];
$year     = $_POST['year'];
$page     = $_POST['page'];
$pric     = $_POST['price'];

$res = mysql_query("INSERT INTO books (name,isbn,author,subject,company,year,page,price)
	VALUES ('$name','$isbn','$auth','$subj','$publ','$year','$page','$pric')");
	if(!$res){die("<br /><a href='viewpage.php?page_id=5' >Click for Try Again</a><br /><font color='#FF0000'>خطا در ثبت كتاب لطفا دوباره سعي کنيد</font>". mysql_error());}
echo "<br />ثبت كتاب به پايان رسيد <br /> ";
}
else
{
		echo "<form method='post' action='addbook.php'>
		<center><table border='1' cellpadding='0' cellspacing='0' width='100%'>\n<tr>\n
		<td valign='top' align='center'>نام كتاب</td>\n
		<td valign='top' align='center'>ISBN</td>\n
		<td valign='top' align='center'>نويسنده</td>\n
		<td valign='top' align='center'>موضوع</td>\n
		<td valign='top' align='center'>انتشارات</td>\n
		<td valign='top' align='center'>سال چاپ</td>\n
		<td valign='top' align='center'>تعداد صفحات</td>\n
		<td valign='top' align='center'>مبلغ</td>\n
		";
			echo "</tr>\n<tr>\n";
			echo "<td valign='top' align='center'><input name='name' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='isbn' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='author' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='subject' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='publisher' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='year' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='page' type='text' size='15'></td>\n";
			echo "<td valign='top' align='center'><input name='price' type='text' size='15'></td>\n";
			echo "</tr>\n</table>\n";

   echo "<br /><input type='Submit' value='Submit' name='Submit'>
   </form>";
}
require_once "footer.php";
?>
