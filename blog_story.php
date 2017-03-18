<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "blog";
mysqli_set_charset($mysqli, 'utf8');
$post_id = $_GET['id'];
$post_detail_sql = mysqli_query($mysqli, "Select post_text from blog_post_details where post_id ='$post_id' LIMIT 1");
$post = mysqli_fetch_array($post_detail_sql);
$post_text =$post['post_text'];
$post_sql = mysqli_query($mysqli, "select * from blog_posts where post_id = '$post_id'");
while($row = mysqli_fetch_array($post_sql)) {
  $title = $row['post_title'];
  $description = $row['blog_post_desc'];
  $image = $row['blog_head_image'];
  $date = $row['post_date'];
  try {
    $user_sql = mysqli_query($mysqli, "Select user_name from users where user_id =".$row['owner_id']);
    $user_row = mysqli_fetch_array($user_sql);
    $user = $user_row["user_name"];
  } catch (Exception $e) {}
}
?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>
<?php
// Specific Page Options
$one->inc_sidebar               = false;
$one->inc_header                = 'frontend_header_navigation.php';
$one->l_sidebar_mini            = false;
$one->l_sidebar_position        = false;
$one->l_sidebar_visible_desktop = false;
?>

<!-- Hero Content -->
<div class="bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/blog/<?=$image;?>');">
    <div class="bg-primary-op">
        <section class="content content-full content-boxed overflow-hidden">
            <!-- Section Content -->
            <div class="push-150-t push-150 text-center">
                <h1 class="text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><?=$title;?></h1>
                <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><?=$description;?></h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
</div>
<!-- END Hero Content -->

<!-- Story Content -->
<div class="bg-white">
    <section class="content content-boxed">
        <!-- Section Content -->
        <div class="text-center">
            <a class="link-effect font-s13 font-w600" href="javascript:void(0)"><?=$user;?></a> on <?=$date;?> &bull;
        </div>
        <div class="row push-50-t push-50 nice-copy-story">
            <div class="col-sm-8 col-sm-offset-2">

                <?=$post_text;?>
                <!-- END Actions -->
            </div>
        </div>
        <!-- END Section Content -->
    </section>
</div>
<!-- END Story Content -->
<?php if($_SESSION['admin']) {
  echo '<!-- Get Started -->
  <div class="bg-primary-dark">
      <section class="content content-full content-boxed">
          <!-- Section Content -->
          <div class="push-20-t push-20 text-center">
              <h3 class="h4 text-white-op push-20 visibility-hidden" data-toggle="appear">Do you have stories to say ? Sign up today and get started to write one!</h3>
              <a class="btn btn-rounded btn-noborder btn-lg btn-success visibility-hidden" data-toggle="appear" data-class="animated bounceIn" href="blog_post.php">Write Post</a>
          </div>
          <!-- END Section Content -->
      </section>
  </div>
  <!-- END Get Started -->';
}
?>

<?php require 'inc/views/frontend_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function(){
        // Init page helpers (Appear + Magnific Popup plugins)
        App.initHelpers(['appear', 'magnific-popup']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
