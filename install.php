<?php
include ('config.php');
$link = mysql_connect ($host, $user, $pass) or die ('Error: ' . mysql_error());
//$result = mysql_query('CREATE DATABASE '.$name);if (!$result) { die('Error: ' . mysql_error()); }


mysql_select_db ($name);

			$result = mysql_query("CREATE TABLE IF NOT EXISTS `users` (
			`user` VARCHAR(20) NOT NULL DEFAULT '',
			`pass` VARCHAR(20) NOT NULL DEFAULT '',
			`name` VARCHAR(20) NOT NULL DEFAULT '',
			`age` varchar(2) NOT NULL DEFAULT '',
			`adres` VARCHAR(200) NOT NULL DEFAULT '',
			`code` VARCHAR(10) NOT NULL DEFAULT '',
			`tel` VARCHAR(20) NOT NULL DEFAULT '',
			`mob` VARCHAR(20) NOT NULL DEFAULT '',
			`acc` VARCHAR(20) NOT NULL DEFAULT '',
			`email` VARCHAR(20) NOT NULL DEFAULT '',
			`talab` VARCHAR(10) NULL DEFAULT '',
			`type` BINARY NOT NULL DEFAULT '',
			PRIMARY KEY (`user`)
			) TYPE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;");

			if (!$result) { die('Error: ' . mysql_error()); }
			echo '<b>Users</b> Table is Created...<br />';

			$result = mysql_query("CREATE TABLE IF NOT EXISTS `books` (
			`isbn` VARCHAR(20) NOT NULL DEFAULT '',
			`name` VARCHAR(40) NOT NULL DEFAULT '',
			`author` VARCHAR(40) NOT NULL DEFAULT '',
			`subject` VARCHAR(20) NOT NULL DEFAULT '',
			`company` VARCHAR(20) NOT NULL DEFAULT '',
			`year` VARCHAR(4) NOT NULL DEFAULT '',
			`page` VARCHAR(4) NOT NULL DEFAULT '',
			`price` VARCHAR(6) NOT NULL DEFAULT '',
			`intavg` VARCHAR(5) NOT NULL DEFAULT '',
			`intno` VARCHAR(4) NOT NULL DEFAULT '',
			`pic` VARCHAR(40) NOT NULL DEFAULT '',
			PRIMARY KEY (`isbn`)
			) TYPE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;");

			if (!$result) { die('Error: ' . mysql_error()); }
			echo '<b>Books</b> Table is Created...<br />';


			$result = mysql_query("CREATE TABLE IF NOT EXISTS `factors` (

			`no` VARCHAR NOT NULL DEFAULT '',

			`fact` VARCHAR(10) NOT NULL DEFAULT '',
			`date` VARCHAR(20) NOT NULL DEFAULT '',
			`user` VARCHAR(20) NOT NULL DEFAULT '',
			`tel` VARCHAR(20) NOT NULL DEFAULT '',
			`adres` VARCHAR(200) NOT NULL DEFAULT '',
			`book` VARCHAR(40) NOT NULL DEFAULT '',
			`isbn` VARCHAR(20) NOT NULL DEFAULT '',
			`stat` VARCHAR(10) NOT NULL DEFAULT '',
			`price` VARCHAR(20) NOT NULL DEFAULT '',
			PRIMARY KEY (`no`)
			) TYPE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;");

			if (!$result) { die('Error: ' . mysql_error()); }
			echo '<b>Factors</b> Table is Created...<br />';


			$res = mysql_query("INSERT into users (user,pass,name,adres,code,tel,mob,email,type,acc,age)
				VALUES ('Admin','pass','Admin','City-Street-...','123456789','0123456789','0123456789','admin@localhost','1','10000000','24')");
			if(!$res){ die('Error: ' . mysql_error()); }
			echo"<b><br><font color='#00F000'><center>Succesfully Admin Registered... À»  ‰«„ »« „Ê›ﬁÌ  «‰Ã«„ ‘œ</font>
			<br />User = Admin
			<br />Pass = pass
			<br />
			You Can Sign in Now
			<a href='signin.php'>
			Click Here
			</a>
			</center>"
			;


?>