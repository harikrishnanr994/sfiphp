<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/db_config.php';?>
<?php
$one->l_sidebar_visible_desktop = true;
$one->inc_sidebar               = true;

$user_sql = mysqli_query($mysqli, "Select * from users");
?>
<?php require 'inc/views/template_footer_start.php'; ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css">
<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>


<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Registered Users</h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th class="hidden-xs">Email</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_array($user_sql)) {
                                          $url = "profile_adn.php?id=".$row['user_id'];
                                    ?>
                    <tr>
                        <td class="text-center"><?=$row['user_id']; ?></td>
                        <td class="font-w600"><a href="<?=$url;?>"><?=$row['user_name']?></a></td>
                        <td class="hidden-xs"><?=$row['user_email']?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

    <!-- Dynamic Table Full Pagination -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs" style="width: 15%;">Access</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i < 31; $i++) { ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="font-w600"><?php $one->get_name(); ?></td>
                        <td class="hidden-xs">client<?php echo $i; ?>@example.com</td>
                        <td class="hidden-xs">
                            <?php $one->get_label(); ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full Pagination -->

    <!-- Dynamic Table Simple -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Dynamic Table <small>With only sorting and pagination</small></h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-simple class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped js-dataTable-simple">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs" style="width: 15%;">Access</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i < 41; $i++) { ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td class="font-w600"><?php $one->get_name(); ?></td>
                        <td class="hidden-xs">client<?php echo $i; ?>@example.com</td>
                        <td class="hidden-xs">
                            <?php $one->get_label(); ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Simple -->
</div>
<!-- END Page Content -->

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_tables_datatables.js"></script>
<?php require 'inc/views/base_footer.php'; ?>


<?php require 'inc/views/template_footer_end.php'; ?>
