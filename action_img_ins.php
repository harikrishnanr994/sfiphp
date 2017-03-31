<?php
require 'inc/db_config.php';
mysqli_set_charset($mysqli, 'utf8');
$ds          = DIRECTORY_SEPARATOR;
 
$storeFolder = 'assets'. $ds.'img'. $ds.'photos';
 
if (!empty($_FILES)) { 
	$imgName = $_FILES['file']['name'];

    $tempFile = $_FILES['file']['tmp_name'];            
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
    $targetFile =  $targetPath. $_FILES['file']['name'];
    if(move_uploaded_file($tempFile,$targetFile)) {
    	$mysqli->query("INSERT INTO gallery (img_name, uploaded) VALUES('".$imgName."','".date("Y-m-d H:i:s")."')");
    }
}
?>