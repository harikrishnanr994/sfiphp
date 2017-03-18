<?
require_once 'inc/db_config.php';
session_start();
$uName = mysqli_real_escape_string($mysqli,$_POST['username']);
$message= "
       Hello , $uName
       <br /><br />
       We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore this email,
       <br /><br />
       Click Following Link To Reset Your Password
       <br /><br />
       <a href='http://www.sfinssce.org/reset_password.php?id=$uName&code=$code'>click here to reset your password</a>
       <br /><br />
       Thank you :)
       ";
$subject = "Password Reset";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@sfinssce.org>' . "\r\n";
$qry = "SELECT * FROM users WHERE user_email='$uName' AND active=1";
$res = mysqli_query($mysqli, $qry);
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);
if( $num_row == 1 ) {
  $code = md5(uniqid(rand()));
  $qry_res = "UPDATE users SET reset_token = '$code' WHERE user_email = '$uName'";
  $res_res = mysqli_query($mysqli, $qry_res);
  $num_row_res = mysqli_num_rows($res_res);
  if($num_row_res == 1) {
    if(mail($uName,$subject,$message,$headers)) {
      echo true;
    } else{
      echo true;
    }
  } else {
    echo false;
  }
}
?>
