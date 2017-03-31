<?php
require 'inc/db_config.php';
mysqli_set_charset($mysqli, 'utf8');
session_start();
$ds          = DIRECTORY_SEPARATOR;
 
$storeFolder = 'assets'. $ds.'img'. $ds.'photos';
 
if (!empty($_POST)) { 
	$img_id = mysqli_real_escape_string($mysqli,$_POST['img_id']);
	$sql = "DELETE FROM gallery WHERE img_name=".$img_id;
	$query = mysqli_query($mysqli, $sql);
	$num_row = mysqli_num_rows($query);          
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
    $targetFile =  $targetPath.$img_id;
    if( $num_row == 1 ) {
	    if(!unlink($targetFile)) {
	    	$_SESSION['deleted'] = false;
	    	echo "<script>window.open('index.php','_self')</script>";
	    } else {
	    	$_SESSION['deleted'] = true;
	    	echo "<script>window.open('index.php','_self')</script>";

	    }
	}
} else {
	echo "no data";
}
?>