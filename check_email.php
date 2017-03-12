<?php
require 'inc/db_config.php';
$email = mysqli_real_escape_string($mysqli,$_POST['email']);
$query = mysqli_query($mysqli, "Select count(*) from users where user_email='$email'");

    $row = mysqli_fetch_row($query);
    $count = $row[0];
	    if($count>0) echo "<span class='status-not-available alert alert-danger'> This email is already registered with us!</span>";
		else echo "";
?>
