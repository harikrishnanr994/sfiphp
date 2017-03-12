<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">

<?php
// Specific Page Options
$one->inc_sidebar               = false;
$one->inc_header                = 'frontend_header_navigation.php';
$one->l_sidebar_mini            = false;
$one->l_sidebar_visible_desktop = false;
$one->l_side_scroll             = true;
?>

<div class="bg-primary-dark" style="height:60px">
</div>
<!-- Page Content -->
<div class="content content-narrow">
    <!-- Breadcrumb -->
    <ol class="breadcrumb push-15">
        <li><a class="text-muted" href="forum_topic.php">Forums</a></li>
        <li><a class="link-effect" href="forum_newtopic.php"><i class="fa fa-plus"></i> New Topic</a></li>
    </ol>
    <!-- END Breadcrumb -->

    <!-- New Topic -->
    <div class="block">
        <div class="block-header bg-gray-lighter">
            
            <h3 class="block-title"><i class="fa fa-plus"></i> New Topic</h3>
        </div>
        <div class="block-content block-content-full block-content-narrow">
            <form class="form-horizontal push-10-t" action="forum_newtopic_submit.php" method="post" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-md-7">
                        <!-- Select2 (.js-select2 class is initialized in App() -> uiHelperSelect2()) -->
                        <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                        <div class="form-material form-material-primary">
                            <select class="js-select2 form-control" id="topic-forum" name="topic-forum" style="width: 100%;" data-placeholder="Please select a category">
                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="college">College</option>
                                <option value="district">District</option>
                                <option value="state">State</option>
                                <option value="national">National</option>

                            </select>
                            <label for="topic-forum">Forum <span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-7">
                        <div class="form-material form-material-primary">
                            <input class="form-control" type="text" id="topic-title" name="topic-title" placeholder="Please enter a title">
                            <label for="topic-title">Topic Title <span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-7">
                        <div class="form-material form-material-primary">
                            <input class="form-control" type="text" id="topic-description" name="topic-description" placeholder="Please enter a description">
                            <label for="topic-description">Topic Description</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-7">
                        <!-- jQuery Tags Input (.js-tags-input class is initialized in App() -> uiHelperTagsInput()) -->
                        <!-- For more info and examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->
                        <div class="form-material form-material-primary">
                            <input class="js-tags-input form-control" type="text" id="topic-tags" name="topic-tags" value="Question">
                            <label for="topic-tags">Topic Tags <span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <!-- CKEditor (js-ckeditor id is initialized in App() -> uiHelperCkeditor()) -->
                        <!-- For more info and examples you can check out http://ckeditor.com -->
                        <textarea id="js-ckeditor" name="ckeditor"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-plus"></i> Add Topic</button>
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-eye"></i> Preview</button>
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-floppy-o"></i> Draft</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END New Topic -->
</div>
<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/ckeditor/ckeditor.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function(){
        // Init page helpers (CKEditor + Select2 + Tags Inputs plugins)
        App.initHelpers(['ckeditor', 'select2', 'tags-inputs']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
