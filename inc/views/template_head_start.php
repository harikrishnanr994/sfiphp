<?php
/**
 * template_head_start.php
 *
 * Author: pixelcave
 *
 * The first block of code used in every page of the template
 *
 */
 session_start();
 if(basename($_SERVER['PHP_SELF']) != "login.php") {
   if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
     $user = $_SESSION['user'];

   } else {
     echo "<script>window.open('login.php','_self')</script>";
   }
 }

?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title><?php echo $one->title; ?></title>

        <meta name="description" content="<?php echo $one->description; ?>">
        <meta name="author" content="<?php echo $one->author; ?>">
        <meta name="robots" content="<?php echo $one->robots; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon.ico">

        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $one->assets_folder; ?>/img/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $one->assets_folder; ?>/img/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo $one->assets_folder; ?>/img/favicons/ms-icon-144x144.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
