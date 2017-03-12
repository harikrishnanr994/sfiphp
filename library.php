<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
$page_t = "services";
$sub_page = "library";
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
$one->l_sidebar_visible_desktop = false;
$one->l_side_scroll             = true;
?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>

<!-- e-Commerce Header -->
<div class="bg-primary-dark" style="height:60px">
</div>
<div class="bg-white">
    <section class="content content-mini content-boxed overflow-hidden">
        <div class="row items-push">
            <div class="col-xs-12 col-sm-3">
                <form action="frontend_ecom_search.php" method="post">
                    <div class="input-group">
                        <input type="text" id="ecom-search" name="ecom-search" class="form-control" placeholder="Search..">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<!-- END e-Commerce Header -->

<!-- Side Content and Products -->
<div class="bg-gray-lighter">
    <section class="content content-boxed">
        <div class="row">
            <div class="col-lg-12">
                <!-- Sort and Show Filters -->
                <div class="form-inline clearfix">
                    <select id="ecom-results-show" name="ecom-results-show" class="form-control pull-right" size="1">
                        <option value="0" disabled selected>SHOW</option>
                        <option value="12">12</option>
                        <option value="20">20</option>
                        <option value="32">32</option>
                    </select>
                    <select id="ecom-results-sort" name="ecom-results-sort" class="form-control" size="1">
                        <option value="0" disabled selected>SORT BY</option>
                        <option value="1">Popularity</option>
                        <option value="2">Name (A to Z)</option>
                        <option value="3">Name (Z to A)</option>
                        <option value="4">Sales (Lowest to Highest)</option>
                        <option value="5">Sales (Highest to Lowest)</option>
                    </select>
                </div>
                <!-- END Sort and Show Filters -->

                  <div class="pager">
                    <ul class="pagination">
                      <li <?=($page==1) ? 'class="disabled"':''; ?>><a href="?page=<?=($page-1);?>&per-page=<?=$perPage;?>"><i class="fa fa-chevron-left"></i></a></li>
                      <?php for($x=1;$x<=$pages;$x++):?>
                        <li <?=($page==$x) ? 'class="active"':''; ?>><a href="?page=<?=$x;?>&per-page=<?=$perPage;?>"><?=$x;?></a></li>
                      <?php endfor; ?>
                      <li <?=($page==$pages) ? 'class="disabled"':''; ?>><a href="?page=<?=($page+1);?>&per-page=<?=$perPage;?>"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                  </div>

                <!-- Products -->
                <div class="row items-push js-gallery">
                  <?php
  									try {

  										$query = mysqli_query($mysqli, $sql);
  										while($row = mysqli_fetch_array($query)) {
                        $book_img = (!empty($row['book_image']))?$row['book_image']:'ecom_product2.png';
                        echo '<div class="col-sm-6 col-lg-3">
                        <a class="img-link img-thumb" href="book.php?id='.$row['book_id'].'">
                            <div class="block">
                                <div class="img-container">
                                    <img class="img-responsive" src="'.$one->assets_folder.'/img/books/'.$book_img.'" alt="">

                                </div>
                                <div class="block-content">
                                    <div class="push-10 text-ell">
                                        <a class="h4" href="frontend_ecom_product.php">'.$row['book_name'].'</a>
                                    </div>
                                    <p class="text-muted text-ell">'.$row['book_name_mal'].'</p>
                                </div>
                            </div>
                            </a>
                        </div>';
  										}
  									} catch(PDOException $e) {
  										echo $e->getMessage();
  									}
  								?>
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
                <!-- END Products -->
            </div>
        </div>
    </section>
</div>
<!-- END Side Content and Products -->

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
