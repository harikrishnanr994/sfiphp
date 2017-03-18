<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "blog";
mysqli_set_charset($mysqli, 'utf8');

$page = isset($_GET['page']) && $_GET['page'] >= 1 ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 9;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql = 'SELECT * FROM blog_posts where post_id < 68 ORDER BY post_id DESC  LIMIT '.$start.','.$perPage;
$total_sql = mysqli_query($mysqli, "Select * from blog_posts where post_id < 68 ORDER BY post_id DESC"); // Query the posts table
$total = mysqli_num_rows($total_sql);
$pages = ceil($total / $perPage);
?>
<?php
// Specific Page Options
$one->inc_sidebar               = false;
$one->inc_header                = 'frontend_header_navigation.php';
$one->l_sidebar_mini            = false;
$one->l_sidebar_position        = false;
$one->l_sidebar_visible_desktop = false;
$one->l_side_scroll             = true;
?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>
<style>
.grid-item { width: 350px; }
</style>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- Hero Content -->
<div class="bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/blog/photo24@2x.jpg');">
    <div class="bg-primary-dark-op">
        <section class="content content-full content-boxed overflow-hidden">
            <!-- Section Content -->
            <div class="push-100-t push-50 text-center">
                <h1 class="h2 text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">The latest stories only for you.</h1>
                <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Feel free to explore and read.</h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
</div>
<!-- END Hero Content -->

<!-- Grid Content -->
<section class="content content-boxed">
    <!-- Section Content -->
    <div class="push-50-t push-50">
        <div class="row grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 350 }'>
          <?php
            try {
              $query = mysqli_query($mysqli, $sql);
              while($row = mysqli_fetch_array($query)) {
                try {
                  $user_sql = mysqli_query($mysqli, "Select user_name from users where user_id =".$row['owner_id']);
                  $user_row = mysqli_fetch_array($user_sql);
                  $user = $user_row["user_name"];
                } catch (Exception $e) {}
                echo '
                <!-- Story -->
                <div class="col-md-4 visibility-hidden grid-item" data-toggle="appear" data-offset="50" data-class="animated fadeIn">
                    <a class="block block-link-hover2" href="blog_story.php?id='.$row['post_id'].'">
                        <img style="height: 100%; width: 100%; object-fit: contain;" class="img-responsive" src="'.$one->assets_folder.'/img/blog/'.$row['blog_head_image'].'">
                        <div class="block-content">
                            <div class="font-s12 push">
                                <span class="text-primary">'.$user.'</span> on '.$row['post_date'].'
                            </div>
                            <h4 class="push-10">'.$row['post_title'].'</h4>
                            <p>'.$row['blog_post_desc'].'</p>
                        </div>
                    </a>
                </div>
                <!-- END Story -->
                ';
              }
            } catch(PDOException $e) {
              echo $e->getMessage();
            }
          ?>

        </div>

        <!-- Pagination -->

        <!-- END Pagination -->
    </div>
    <!-- END Section Content -->
</section>
<!-- END Grid Content -->
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

<!-- Page JS Code -->
<script>
    jQuery(function(){
        // Init page helpers (Appear plugin)
        App.initHelpers('appear');
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
