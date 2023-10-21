<?php
require_once "main.php";



$fact=0;
if(isset($_GET['fact']))
	$fact=$_GET['fact'];
if($fact!=0)
	{		$fac  = dbarray(dbquery("Select * from factors where fact='$fact' AND user='$username'"));
		if($fac['no']){
			dbquery("UPDATE `factors` SET `stat` = 'second'  WHERE `fact`= '$fact';");
			echo "سفارش شما ثبت گرديد";
			$s = dbarray(dbquery("SELECT sum(price) as fee FROM `factors` WHERE `fact`='$fact'"));
			$fee = $s['fee'];
			//echo $s['fee'].$fee.$fact."<br />";

			$acc = dbarray(dbquery("select * from `users` where `user`='$username'"));
			$ac = $acc['acc'];
      //echo $ac;

			$price = $ac-$fee;

      $tal = $acc['talab'];
      $tal=$tal+$fee;
			//echo " --> ".$price;
			dbquery("UPDATE `users` SET `talab` = '$tal',`acc`='$price'  WHERE `user`= '$username';");
			echo "<br />پول از حساب شما كم شد";

			}

	}
require_once "footer.php";
?>