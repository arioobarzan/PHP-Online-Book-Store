<?php
require_once "main.php";
$no=0;
  if(isset($_GET['no']))
  	$no = $_GET['no'];
if($no)echo"شماره ي فاكتور :".$no ;

$q = "";
 if(isset($_POST['sub']))
 {
		$con   = $_POST['con'];
		$sel   = $_POST['sel'];


		switch($sel){
			case 'Subject':
           $q = "`subject` LIKE '%".$con."%'";
			break;
			case 'Book Name':
           $q = "`name` LIKE '%".$con."%'";
			break;
			case 'Writer':
           $q = "`author` LIKE '%".$con."%'";
			break;
			case 'Publisher':
           $q = "`company` LIKE '%".$con."%'";
			break;
      case 'All Books':
           $q = "1";
			break;
     }
  $result = dbquery("SELECT * FROM books WHERE ".$q);
	$rows   = dbrows($result);
	prints($rows,$result);
	}
else
	die("
<form method='POST' action='search.php'>
<p>
جستجو بر اساس :
  <select name='sel' dir='rtl'>
  <option>Subject</option>
  <option selected>Book Name</option>
  <option>Writer</option>
  <option>Publisher</option>
  <option>All Books</option>
  </select></p>
<p>
  <input type='text' name='con' size='20'>
</p>
<p>
  <input type='submit' value='Search' name='sub'>
</p>


</form>
");


function prints($rows,$result)
{		$num=0;
		global $username;		if ($rows != 0) {
    global $no;
		echo "<center><table border='1' cellpadding='0' cellspacing='0' width='100%' dir='rtl'>\n<tr>\n
		<td valign='top' align='center'>نام كتاب</td>\n
		<td valign='top' align='center'>ISBN</td>\n
		<td valign='top' align='center'>نويسنده</td>\n
		<td valign='top' align='center'>موضوع</td>\n
		<td valign='top' align='center'>انتشارات</td>\n
		<td valign='top' align='center'>سال چاپ</td>\n
		<td valign='top' align='center'>تعداد صفحات</td>\n
		<td valign='top' align='center'>مبلغ</td>\n
		<td valign='top' align='center'>امتياز از 5</td>\n
		";
		if($username)
		echo"
		<td valign='top' align='center'>سفارش</td>\n
		<td valign='top' align='center'>امتياز بدهيد</td>\n
    <form method='post' action='buy.php?no=".$rows."&fact=".$no."'>
		";
		while ($data = dbarray($result)) {			$num++;
			echo "</tr>\n<tr>\n";
			echo "<td valign='top' align='center'>".$data['name']."</td>\n";
			echo "<td valign='top' align='center'>".$data['isbn']."</td>\n";
			echo "<td valign='top' align='center'>".$data['author']."</td>\n";
			echo "<td valign='top' align='center'>".$data['subject']."</td>\n";
			echo "<td valign='top' align='center'>".$data['company']."</td>\n";
			echo "<td valign='top' align='center'>".$data['year']."</td>\n";
			echo "<td valign='top' align='center'>".$data['page']."</td>\n";
			echo "<td valign='top' align='center'>".$data['price']."</td>\n";
			echo "<td valign='top' align='center'>".$data['intavg']."</td>\n";

		if($username)
			{
			echo "
			<td valign='top' align='center' dir='ltr'><select name='buys".$num."'><option selected>Select</option>
			<option>Add To Basket</option></select><input name='buy".$num."' type='hidden' value='".$data['isbn']."'></td>\n";
			echo "<td valign='top' align='center' dir='ltr'><select name='ints".$num."'><option selected>Select</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			</select><input name='int".$num."' type='hidden' value='".$data['isbn']."'></td>\n";
			}
		}
		echo "</tr>\n</table>\n";
	}
	else {
		die ("<div style='text-align:center'><br />\n Not Found <br /><br />\n</div>\n");
	}
	echo "<br />";
	if($username)
	echo "<input type='submit' name='submit' value='تاييد سفارشات'>&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='button' onclick='window.print();' value='چاپ صفحه'></form>
			 </center>";}
require_once "footer.php";
?>