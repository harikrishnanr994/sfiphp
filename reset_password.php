<?php
require 'inc/db_config.php';
mysqli_set_charset($mysqli, 'utf8');
session_start();
$user = $_SESSION['user'];

$pwd = mysqli_real_escape_string($mysqli,$_POST['change_password']);
$cpwd = mysqli_real_escape_string($mysqli,$_POST['confirm_password']);

if($pwd == $cpwd) {
  $hash = password_hash($pwd, PASSWORD_DEFAULT);
  $sql = "UPDATE users SET hash = '$hash' WHERE user_name = '$user'";
  $result = mysqli_query($mysqli, $sql);
  if($result) {
    $_SESSION['msg'] = "success";
    echo "<script>window.open('reset_password_success.php','_self')</script>";
  } else {
    $_SESSION['msg'] = "failed";
    echo "<script>window.open('reset_password.php','_self')</script>";
  }
} else {
  $_SESSION['msg'] = "password mismatch";
  echo "<script>window.open('reset_password.php','_self')</script>";
}
