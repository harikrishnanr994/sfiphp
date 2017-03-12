<?
require_once 'inc/db_config.php';
session_start();
$uName = mysqli_real_escape_string($mysqli,$_POST['username']);
$pWord = mysqli_real_escape_string($mysqli,$_POST['password']);
$remember = mysqli_real_escape_string($mysqli,$_POST['remember']);
$qry = "SELECT * FROM users WHERE user_email='$uName' AND active=1";
$res = mysqli_query($mysqli, $qry);
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);
if( $num_row == 1 ) {
  if(password_verify($pWord, $row['hash'])) {
    echo 'true';
  	$_SESSION['user'] = $row['user_name'];
  	$_SESSION['email'] = $row['user_email'];
    $_SESSION['user_id'] = $row['user_id'];
    if($remember == "yes") {
        $hour = time() + 3600 * 24 * 30;
        setcookie('username', $username, $hour);
        setcookie('password', $password, $hour);
    }
  } else {
    echo 'false';
  }
} else {
	echo 'false';
}

?>
