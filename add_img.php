<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "Gallery";
mysqli_set_charset($mysqli, 'utf8');
$action = "insert";?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>
<?php
if(isset($_SESSION['admin']) && $_SESSION['admin']){
  $user_id = $_SESSION['user_id'];
} else {
  echo "<script>window.open('index.php','_self')</script>";
}
?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/dropzonejs/dropzone.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/simplemde/simplemde.min.css">

<?php
// Specific Page Options
$one->inc_sidebar               = false;
$one->inc_header                = 'frontend_header_navigation.php';
$one->l_sidebar_mini            = false;
$one->l_sidebar_visible_desktop = false;
?>
<div class="bg-primary-dark" style="height:60px">
</div>

<div class="content content-boxed">
  <div class="col-sm-8 col-sm-offset-2">
  <h2 class="content-heading">Insert images to Gallery</h2>
  <div class="block">
      <div class="block-content block-content-full">
          <!-- Post Container -->
          <form class="form-horizontal dropzone" id="postForm" action="/sfiphp/action_img_ins.php" method="POST" enctype="multipart/form-data">
          </form>
      </div>
    </div>
  </div>
</div>




<?php require 'inc/views/frontend_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>
<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/simplemde/simplemde.min.js"></script>

<!-- Page JS Code -->
<script>

    jQuery(function(){
        // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)
        App.initHelpers(['summernote', 'ckeditor', 'simplemde']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
