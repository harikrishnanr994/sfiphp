<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "gallery";
mysqli_set_charset($mysqli, 'utf8');

$page = isset($_GET['page']) && $_GET['page'] >= 1 ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 12;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql = 'SELECT * FROM books where id < 68 ORDER BY id  LIMIT '.$start.','.$perPage;
$total_sql = mysqli_query($mysqli, "Select * from books where id < 68"); // Query the users table
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

    <div class="col-xs-12">
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

    <div class="row items-push js-gallery-advanced">
      <?php
        try {

          $query = mysqli_query($mysqli, $sql);
          while($row = mysqli_fetch_array($query)) {
            $book_img = (!empty($row['book_image']))?$row['book_image']:'ecom_product2.png';
            echo '

            <div class="col-sm-6 col-md-4 col-lg-3 animated fadeIn">
                <div class="img-container fx-img-rotate-r">
                  <img class="img-responsive" src="'.$one->assets_folder.'/img/books/'.$book_img.'" alt="">
                    <div class="img-options">
                        <div class="img-options-content">
                            <h3 class="font-w400 text-white push-5">Image Caption</h3>
                            <h4 class="h6 font-w400 text-white-op push-15">Some Extra Info</h4>
                            <a class="btn btn-sm btn-default img-lightbox" href="'.$one->assets_folder.'/img/books/'.$book_img.'">
                                <i class="fa fa-search-plus"></i> View
                            </a>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-times"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
          }
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
      ?>
    </div>
    <!-- END Gallery -->
    <div class="col-xs-12">
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
</div>
<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function(){
        // Init page helpers (Magnific Popup plugin)
        App.initHelpers(['magnific-popup','appear']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
