<?php require 'inc/config.php'; require 'inc/frontend_config.php'; require 'inc/db_config.php';
mysqli_set_charset($mysqli, 'utf8');
$book_id = $_GET['id'];
$book_sql = mysqli_query($mysqli, "select * from books where book_id = '$book_id'");
while($row = mysqli_fetch_array($book_sql)) {
  $name = $row['book_name'];
  $name_ml = $row['book_name_mal'];
  $author = $row['author'];
  $pub = $row['publisher'];
  $img = $row['book_image'];
  $desc = $row['description'];
  $avail_num = $row['avail_num'];
}


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

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.css">

<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/frontend_head.php'; ?>

<!-- Hero Content -->
<div class="bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/books/<?=$img;?>');">
    <div class="bg-primary-dark-op">
        <section class="content content-full content-boxed overflow-hidden">
            <!-- Section Content -->
            <div class="push-30-t push-30 text-center">
                <h1 class="h2 text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><?=$name;?></h1>
                <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><?=$name_ml;?></h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
</div>
<!-- END Hero Content -->


<!-- e-Commerce Header -->
<div class="bg-white">
    <section class="content content-mini content-boxed">
        <div class="row items-push">
            <div class="col-xs-6 col-sm-3">
                <form action="frontend_ecom_search.php" method="post">
                    <div class="input-group">
                        <input type="text" id="ecom-search" name="ecom-search" class="form-control" placeholder="Search..">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-6 col-sm-9 text-right">

            </div>
        </div>
    </section>
</div>
<!-- END e-Commerce Header -->

<!-- Side Content and Product -->
<div class="bg-gray-lighter">
    <section class="content content-boxed">
        <div class="row">
            <div class="col-lg-12">
                <!-- Product -->
                <div class="block">
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-sm-6">
                                <!-- Images -->
                                <div class="row js-gallery">
                                    <div class="col-xs-12 push-10">
                                        <a class="img-link" href="<?php echo $one->assets_folder; ?>/img/books/<?=$img;?>">
                                            <img class="img-responsive" src="<?php echo $one->assets_folder; ?>/img/books/<?=$img;?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- END Images -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Vital Info -->
                                <div class="clearfix">
                                    <span class="h5">
                                      <? if($avail_num != 0){
                                        echo '<span class="font-w600 text-danger">IN STOCK</span><br><small>'.$avail_num.' Available</small>';
                                      } else {
                                        echo '<span class="font-w600 text-success">OUT OF STOCK</span>';
                                      }
                                      ?>
                                    </span>
                                </div>
                                <hr>
                                <form class="form-inline pull-left" action="" method="post" autocomplete="off">
                                    <div class="form-group" id="fieldPwd">
                                        <div class="col-xs-12">
                                            <div class="form-material form-material-primary floating">
                                                <input class="form-control" type="password" id="password" name="password" required>
                                                <label for="login-password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="forPwd" type="button" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus push-5-r"></i> Order now</button>
                                </form>
                                <?php echo $desc; ?>
                                <!-- END Vital Info -->
                            </div>
                            <div class="col-xs-12">
                                <!-- Extra Info -->
                                <div class="block">
                                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                        <li class="active">
                                            <a href="#ecom-product-info">Info</a>
                                        </li>
                                        <li>
                                            <a href="#ecom-product-reviews">Reviews</a>
                                        </li>
                                    </ul>
                                    <div class="block-content tab-content">
                                        <!-- Info -->
                                        <div class="tab-pane pull-r-l active" id="ecom-product-info">
                                            <table class="table table-striped table-borderless remove-margin-b">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 20%;"><i class="fa fa-calendar text-muted push-5-r"></i> Author</td>
                                                        <td><?=$author;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa fa-anchor text-muted push-5-r"></i> Publisher</td>
                                                        <td><?=$pub;?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END Info -->

                                        <!-- Reviews -->
                                        <div class="tab-pane pull-r-l" id="ecom-product-reviews">
                                            <!-- Average Rating -->
                                            <div class="block block-rounded">
                                                <div class="block-content bg-gray-lighter text-center">
                                                    <p class="h2 text-warning push-10">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                    <p>
                                                        <strong>5.0</strong>/5.0 out of <strong>5</strong> Ratings
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- END Average Rating -->

                                            <!-- Ratings -->
                                            <div class="media push-15">
                                                <div class="media-left">
                                                    <a href="javascript:void(0)">
                                                        <?php echo $one->get_avatar(0, 'male', 32); ?>
                                                    </a>
                                                </div>
                                                <div class="media-body font-s13">
                                                    <span class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                    <a class="font-w600" href="javascript:void(0)"><?php echo $one->get_name('male'); ?></a>
                                                    <div class="push-5">Awesome Quality!</div>
                                                    <div class="font-s12">
                                                        <span class="text-muted"><em>2 hours ago</em></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media push-15">
                                                <div class="media-left">
                                                    <a href="javascript:void(0)">
                                                        <?php echo $one->get_avatar(0, 'female', 32); ?>
                                                    </a>
                                                </div>
                                                <div class="media-body font-s13">
                                                    <span class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                    <a class="font-w600" href="javascript:void(0)"><?php echo $one->get_name('female'); ?></a>
                                                    <div class="push-5">So cool badges!</div>
                                                    <div class="font-s12">
                                                        <span class="text-muted"><em>5 hours ago</em></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media push-15">
                                                <div class="media-left">
                                                    <a href="javascript:void(0)">
                                                        <?php echo $one->get_avatar(0, 'male', 32); ?>
                                                    </a>
                                                </div>
                                                <div class="media-body font-s13">
                                                    <span class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                    <a class="font-w600" href="javascript:void(0)"><?php echo $one->get_name('male'); ?></a>
                                                    <div class="push-5">They look great, thank you!</div>
                                                    <div class="font-s12">
                                                        <span class="text-muted"><em>15 hours ago</em></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media push-15">
                                                <div class="media-left">
                                                    <a href="javascript:void(0)">
                                                        <?php echo $one->get_avatar(0, 'male', 32); ?>
                                                    </a>
                                                </div>
                                                <div class="media-body font-s13">
                                                    <span class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                    <a class="font-w600" href="javascript:void(0)"><?php echo $one->get_name('male'); ?></a>
                                                    <div class="push-5">Badges for life!</div>
                                                    <div class="font-s12">
                                                        <span class="text-muted"><em>20 hours ago</em></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media push-15">
                                                <div class="media-left">
                                                    <a href="javascript:void(0)">
                                                        <?php echo $one->get_avatar(0, 'female', 32); ?>
                                                    </a>
                                                </div>
                                                <div class="media-body font-s13">
                                                    <span class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                    <a class="font-w600" href="javascript:void(0)"><?php echo $one->get_name('female'); ?></a>
                                                    <div class="push-5">So good, keep it up!</div>
                                                    <div class="font-s12">
                                                        <span class="text-muted"><em>22 hours ago</em></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Ratings -->
                                        </div>
                                        <!-- END Reviews -->
                                    </div>
                                </div>
                                <!-- END Extra Info -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Product -->
            </div>
        </div>
    </section>
</div>
<!-- END Side Content and Product -->

<?php require 'inc/views/frontend_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/magnific-popup/magnific-popup.min.js"></script>

<!-- Page JS Code -->
<script>
$(document).ready(function(){
  $("#fieldPwd").css('display', 'none', 'important');
   $("#forPwd").click(function(){
      username=$("#username").val();
      password=$("#password").val();
      $.ajax({
       type: "POST",
       url: "action_order.php",
      data: "username="+username+"&password="+password,
       success: function(html){
      if(html=='true')    {
       //$("#add_err").html("right username or password");
       window.location="index.php";
      }
      else    {
        $("#loader").replaceWith("<button class='btn btn-sm btn-block btn-primary' type='submit' id='login'>Log in</button>");
        $("#add_err").css('display', 'inline', 'important');
      }
       },
       beforeSend:function()
       {
      $("#login").replaceWith("<img id='loader' style='height:50px' src='assets/img/loading.gif'>");
       }
      });
    return false;
  });
});
</script>
<script>
    jQuery(function(){
        // Init page helpers (Appear + Magnific Popup plugins)
        App.initHelpers(['appear', 'magnific-popup']);
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>
