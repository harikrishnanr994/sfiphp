<?php
/**
 * frontend_header_navigation.php
 *
 * Author: pixelcave
 *
 * The header with main navigation example (Frontend)
 *
 */
?>

<!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <div class="content-boxed">
        <!-- Header Navigation Right -->
        <ul class="nav-header pull-right">
            <li>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                <!--div class="btn-group">
                    <button class="btn btn-link text-white dropdown-toggle" data-toggle="dropdown" type="button">
                        <i class="si si-drop"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right sidebar-mini-hide font-s13">
                        <li>
                            <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo $one->assets_folder; ?>/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo $one->assets_folder; ?>/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo $one->assets_folder; ?>/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo $one->assets_folder; ?>/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="<?php echo $one->assets_folder; ?>/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                            </a>
                        </li>
                    </ul>
                </div-->
            </li>
            <li class="hidden-md hidden-lg">
                <!-- Toggle class helper (for main header navigation below in small screens), functionality initialized in App() -> uiToggleClass() -->
                <button class="btn btn-link text-white pull-right" data-toggle="class-toggle" data-target=".js-nav-main-header" data-class="nav-main-header-o" type="button">
                    <i class="fa fa-navicon"></i>
                </button>
            </li>
        </ul>
        <!-- END Header Navigation Right -->

        <!-- Main Header Navigation -->
        <ul class="js-nav-main-header nav-main-header pull-right">
            <li class="text-right hidden-md hidden-lg">
                <!-- Toggle class helper (for main header navigation in small screens), functionality initialized in App() -> uiToggleClass() -->
                <button class="btn btn-link text-white" data-toggle="class-toggle" data-target=".js-nav-main-header" data-class="nav-main-header-o" type="button">
                    <i class="fa fa-times"></i>
                </button>
            </li>
            <li><a <?php echo ($page_t == 'index') ? "class='active'" : ""; ?> href="index.php">Home</a>
                    </li>
                    <li><a <?php echo ($page_t == 'services') ? "class='nav-submenu active'" : "class='nav-submenu'"; ?> href="#">Services</a>
                        <ul>
                            <li><a <?php echo ($sub_page == 'library') ? "class='active'" : ""; ?> href="library.php">Library</a>
                            </li>
                            <li><a <?php echo ($sub_page == 'bloodbank') ? "class='active'" : ""; ?> href="#">Blood Bank</a>
                            </li>
                            <li><a <?php echo ($sub_page == 'news') ? "class='active'" : ""; ?> href="#">News</a>
                            </li>
                        </ul>
                    </li>
                    <li><a <?php echo ($page_t == 'about') ? "class='active'" : ""; ?> href="#">About</a>
                    </li>
                    <li><a <?php echo ($page_t == 'forum') ? "class='active'" : ""; ?> href="#">Forum</a>
                    </li>
                    <li><a <?php echo ($page_t == 'blog') ? "class='active'" : ""; ?> href="blog.php">Blog</a>
                    </li>
                    <li><a <?php echo ($page_t == 'gallery') ? "class='active'" : ""; ?> href="#">Gallery</a>
                    </li>
                    <li><a <?php echo ($page_t == 'contact') ? "class='active'" : ""; ?> href="#">Contact Us</a>
                    </li>
        </ul>
        <!-- END Main Header Navigation -->

        <!-- Header Navigation Left -->
        <ul class="nav-header pull-left">
            <li class="header-content">
                <a class="h5" href="index.php">
                    <i class="fa fa-star text-danger"></i> <span class="h5 font-w600 text-white">SFI NSSCE</span>
                </a>
            </li>
        </ul>
        <!-- END Header Navigation Left -->
    </div>
</header>
<!-- END Header -->
