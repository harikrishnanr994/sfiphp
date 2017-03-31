<?php
$uName = $_GET['name'];
$code = $_GET['code'];
// Prints the day
echo date("l") . "<br>";

// Prints the day, date, month, year, time, AM or PM
echo date("jS F Y h:i A") . "<br>";

// Prints October 3, 1975 was on a Friday
echo "Oct 3,1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

// Use a constant in the format parameter
echo date(DATE_RFC822) . "<br>";

// prints something like: 1975-10-03T00:00:00+00:00
echo date(DATE_ATOM,mktime(0,0,0,10,3,1975));
?>
Hello , <?=$uName;?>
<br /><br />
We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore this email,
<br /><br />
Click Following Link To Reset Your Password
<br /><br />
<a href='http://www.sfinssce.org/reset_password.php?id=<?=$uName;?>&code=<?$code;?>'>click here to reset your password</a>
<br /><br />
Thank you :)
