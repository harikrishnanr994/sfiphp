<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/simplemde/simplemde.min.css">

<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Text Editors <small>Text editing at its finest. Powered by Summernote and CKeditor.</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Forms</li>
                <li><a class="link-effect" href="">Text Editors</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Summernote (.js-summernote + .js-summernote-air classes are initialized in App() -> uiHelperSummernote()) -->
    <!-- For more info and examples you can check out http://summernote.org/ -->
    <h2 class="content-heading">Summernote</h2>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Air Mode <small>Inline Editing</small></h3>

        </div>
        <div class="block-content block-content-full">
            <!-- Summernote Container -->
            <div class="js-summernote-air">
                <h3 class="h4 push">This is an Air-mode editable area.</h3>
                <ul>
                  <li>Select a text to reveal the toolbar.</li>
                  <li>Edit rich document on-the-fly, so elastic!</li>
                </ul>
                <p>End of air-mode area!</p>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Full Editor</h3>

			<?php echo htmlspecialchars($_POST['content']); ?>

        </div>
        <div class="block-content block-content-full">
            <!-- Summernote Container -->
            <form class="span12" id="postForm" action="/SFI_PHP/src/base_forms_e.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <textarea class="js-summernote" name="content">Hello Summernote!</textarea>
            <button type="submit" class="btn btn-primary">Save changes</button>
			      <button type="button" id="cancel" class="btn">Cancel</button>
          </form>
        </div>
    </div>
    <!-- END Summernote -->

    <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in App() -> uiHelperCkeditor()) -->
    <!-- For more info and examples you can check out http://ckeditor.com -->
    <h2 class="content-heading">CKEditor</h2>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">In-place Editor</h3>
        </div>
        <div class="block-content">
            <form class="form-horizontal" action="page_forms_editors.php" method="post" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-xs-12">
                        <!-- CKEditor Container -->
                        <div id="js-ckeditor-inline" contenteditable="true">Hello inline CKEditor! Click this text to edit it!</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Full Editor</h3>
        </div>
        <div class="block-content">
            <form class="form-horizontal" action="page_forms_editors.php" method="post" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-xs-12">
                        <!-- CKEditor Container -->
                        <textarea id="js-ckeditor" name="ckeditor">Hello CKEditor!</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END CKEditor -->

    <!-- SimpleMDE Editor (js-simplemde class is initialized in App() -> uiHelperSimpleMDE()) -->
    <!-- For more info and examples you can check out https://github.com/NextStepWebs/simplemde-markdown-editor -->
    <h2 class="content-heading">SimpleMDE</h2>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Markdown Editor</h3>
        </div>
        <div class="block-content">
            <form class="form-horizontal" action="page_forms_editors.php" method="post" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-xs-12">
                        <!-- SimpleMDE Container -->
                        <textarea class="js-simplemde" id="simplemde" name="simplemde">Hello SimpleMDE!</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END SimpleMDE Editor -->
</div>
<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/simplemde/simplemde.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function(){
        // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)
        App.initHelpers(['summernote', 'ckeditor', 'simplemde']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
