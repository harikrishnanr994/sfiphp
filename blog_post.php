<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "blog";
mysqli_set_charset($mysqli, 'utf8');
$action = "insert";?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>
<?php
if(isset($_SESSION['user'])){
  $user_id = $_SESSION['user_id'];
} else {
  echo "<script>window.open('login.php','_self')</script>";
}
?>
<!-- Page JS Plugins CSS -->
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
  <h2 class="content-heading">Write Blog Post</h2>
  <div class="block">
      <div class="block-content block-content-full">
          <!-- Post Container -->
          <form class="form-horizontal" id="postForm" action="/SFI_PHP/action_blog_post.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Title</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="example-text-input" name="title" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="example-text-input">Short description</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="example-text-input" name="post_desc" placeholder="Description">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="example-file-input">Main Image</label>
                <div class="col-xs-12">
                    <input type="file" id="example-file-input" name="image">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12" for="example-file-input">Content</label>
                <div class="col-xs-12">
                  <textarea class="js-summernote" name="content" id="tex">Hello Comrade!</textarea>
                </div>
            </div>
            <input type="hidden" value="<?=$user_id?>" name="author">
            <button type="button" class="btn btn-default" id="btn_">View changes</button>
            <? if($action != "update") echo '<button type="submit" name="submit" class="btn btn-primary" id="btn_">Save changes</button>';
              else echo '<button type="update" name="update" class="btn btn-primary" id="btn_">Update changes</button>'; ?>
            <button type="button" id="cancel" class="btn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
  <div class="row push-50-t push-50 nice-copy-story bg-white">
      <div class="col-sm-8 col-sm-offset-2" id="post_text">
      </div>
  </div>

</div>




<?php require 'inc/views/frontend_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>
<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/simplemde/simplemde.min.js"></script>

<!-- Page JS Code -->
<script>

    $('#btn_').click( function(event) {
      var tex = $('textarea#tex').val();
        event.preventDefault();
        $('#post_text').html(tex);
    });
    jQuery(function(){
        // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)
        App.initHelpers(['summernote', 'ckeditor', 'simplemde']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
