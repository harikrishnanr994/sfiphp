<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "gallery";
mysqli_set_charset($mysqli, 'utf8');

$page = isset($_GET['page']) && $_GET['page'] >= 1 ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 20;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql = 'SELECT * FROM gallery ORDER BY img_id DESC LIMIT '.$start.','.$perPage;
$total_sql = mysqli_query($mysqli, "Select * from gallery"); // Query the users table
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
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.css">
<!-- Page Header -->
<div class="bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/blog/photo24@2x.jpg');">
    <div class="bg-primary-dark-op">
        <section class="content content-full content-boxed overflow-hidden">
            <!-- Section Content -->
            <div class="push-100-t push-50 text-center">
                <h1 class="h1 text-white push-10 visibility-hidden " data-toggle="appear" data-class="animated fadeInDown">Gallery</h1>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
</div>

<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <!-- Gallery (.js-gallery-advanced class is initialized in App() -> uiHelperMagnific()) -->
    <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->

      <div class="pager">
        <ul class="pagination">
          <li <?=($page==1) ? 'class="disabled"':''; ?>><a href="?page=<?=($page-1);?>&per-page=<?=$perPage;?>"><i class="fa fa-chevron-left"></i></a></li>
          <?php for($x=1;$x<=$pages;$x++):?>
          <li <?=($page==$x) ? 'class="active"':''; ?>><a href="?page=<?=$x;?>&per-page=<?=$perPage;?>"><?=$x;?></a></li>
          <?php endfor; ?>
          <li <?=($page==$pages) ? 'class="disabled"':''; ?>><a href="?page=<?=($page+1);?>&per-page=<?=$perPage;?>"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
        <?php 
        if(isset($_SESSION['admin']) && $_SESSION['admin']){
          echo '<div class="row"><a class="btn btn-primary" href="add_img.php"><i class="fa fa-upload"></i>Upload Image(s)</a></div>';
        }
        ?>
      </div>
    
    <div class="row items-push js-gallery-advanced grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 350 }'>
      <?php try {
          $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)) { 
              ?>
            <div class="col-sm-6 col-md-4 col-lg-3 animated fadeIn grid-item">
                <div class="img-container fx-img-rotate-r">
                  <img class="img-responsive" src="<? echo $one->assets_folder;?>/img/photos/<?=$row['img_name'];?>" alt="">
                    <div class="img-options">
                        <div class="img-options-content">
                            <h3 class="font-w400 text-white push-5">Image Caption</h3>
                            <h4 class="h6 font-w400 text-white-op push-15">Some Extra Info</h4>
                            <a class="btn btn-sm btn-default img-lightbox" href="<?php echo $one->assets_folder;?>/img/photos/<?=$row['img_name'];?>">
                                <i class="fa fa-search-plus"></i> View
                            </a>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-default delete_img" data-toggle="modal" data-target="#modal-delete" data-id="<?=$row['img_name'];?>"><i class="fa fa-times"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
          }
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
      ?>
    </div>
    <div class="pager">
      <ul class="pagination style2">
        <li <?=($page==1) ? 'class="disabled"':''; ?>><a href="?page=<?=($page-1);?>&per-page=<?=$perPage;?>"><i class="fa fa-chevron-left"></i></a></li>
        <?php for($x=1;$x<=$pages;$x++):?>
        <li <?=($page==$x) ? 'class="active"':''; ?>><a href="?page=<?=$x;?>&per-page=<?=$perPage;?>"><?=$x;?></a></li>
        <?php endfor; ?>
        <li <?=($page==$pages) ? 'class="disabled"':''; ?>><a href="?page=<?=($page+1);?>&per-page=<?=$perPage;?>"><i class="fa fa-chevron-right"></i></a></li>
      </ul>
    </div>
  </div>

<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>
<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form id="form-delete" method="post" action="/sfiphp/action_img_delete.php">
            <input type="text" name="img_id" id="img_id"/>
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Delete image</h3>
                </div>
                <div class="block-content">
                    Are you sure ?
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                  <button class="btn btn-sm btn-primary" type="submit" id="btn-del"><i class="fa fa-check"></i> Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.js"></script>

<!-- Page JS Code -->
<script>

 $(document).on("click", ".delete_img", function (e) {
    e.preventDefault();
    var _self = $(this);
    var imageId = _self.attr('data-id');
    document.getElementById("img_id").value = imageId;
});
/*$("#btn-del").click(function(e){
  e.preventDefault();
  var img_id;
 
  this.img_id = imageId;
  alert(img_id);
  $.ajax({
    type: "POST",
    url: "action_login.php",
    data: "img_id="+img_id,
    success: function(html){
      if(html=='true')    {
        window.location="index.php";
      } else {
        $("#loader").replaceWith("<button class='btn btn-sm btn-block btn-primary' type='submit' id='login'>Log in</button>");
        $("#add_err").css('display', 'inline', 'important');
      }
    },
    beforeSend:function() {
      $("#login").replaceWith("<img id='loader' style='height:50px' src='assets/img/loading.gif'>");
    }
  });*/
});
jQuery(function(){
  // Init page helpers (Magnific Popup plugin)
  App.initHelpers(['magnific-popup','appear']);
});
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
