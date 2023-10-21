<?php
require_once "main.php";
if(!$admin)
	die(require "index.php");
echo "<center><table border=1 width=100% valign='center'><tr>";
echo "<td><div align='center'><p><a href='addbook.php'>اضافه كردن كتاب</a></p></div></td>";
echo "<td><div align='center'><p><a href='addacc.php'>شارژ حساب كاربران</a></p></div></td>";
echo "<td><div align='center'><p><a href='edituser.php'>ويرايش اطلاعات كاربران</a></p></div></td>";
echo "<td><div align='center'><p><a href='check.php'>چك كردن وضعيت فاكتورها</a></p></div></td>";
echo "</tr></table></center>";
require_once "footer.php";
?>