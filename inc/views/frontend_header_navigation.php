<?php
/**
 * frontend_header_navigation.php
 *
 * Author: pixelcave
 *
 * The header with main navigation example (Frontend)
 *
 */
 if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
   $user = $_SESSION['user'];
   $htm = '<li><a href="">'.$user.'</a> </li>
            <li> <a href="logout.php">Logout</a></li>';
 } else {
   $htm = '<li><a href="login.php">Login</a>
   </li>';
 }

 $page_t = pathinfo($_SERVER['REQUEST_URI'])['filename'];
?>

<!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <div class="content-boxed">
        <!-- Header Navigation Right -->
        <ul class="nav-header pull-right">

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
            <li><a <?php echo ($page_t == 'index' or $page_t == 'sfiphp') ? "class='active'" : ""; ?> href="index.php">Home</a>
                    </li>
                    <li><a <?php echo ($page_t == 'library' or $page_t == 'bloodbank' or $page_t == 'news' or $page_t == 'book') ? "class='nav-submenu active'" : "class='nav-submenu'"; ?> href="#">Services</a>
                        <ul>
                            <li><a <?php echo ($page_t == 'library' or $page_t == 'book') ? "class='active'" : ""; ?> href="library.php">Library</a>
                            </li>
                            <li><a <?php echo ($page_t == 'bloodbank') ? "class='active'" : ""; ?> href="#">Blood Bank</a>
                            </li>
                            <li><a <?php echo ($page_t == 'news') ? "class='active'" : ""; ?> href="#">News</a>
                            </li>
                        </ul>
                    </li>
                    <li><a <?php echo ($page_t == 'forum') ? "class='active'" : ""; ?> href="#">Forum</a>
                    </li>
                    <li><a <?php echo ($page_t == 'blog' or $page_t == 'blog_post' or $page_t == 'blog_story') ? "class='active'" : ""; ?> href="blog.php">Blog</a>
                    </li>
                    <li><a <?php echo ($page_t == 'gallery') ? "class='active'" : ""; ?> href="gallery.php">Gallery</a>
                    </li>
                    <li><a <?php echo ($page_t == 'contact') ? "class='active'" : ""; ?> href="#">Contact Us</a>
                    </li>
                    <li>
                      <a class='nav-submenu' href="#"><i class="fa fa-user-circle fa-lg"></i></a>
                          <ul>
                              <?=$htm;?>
                          </ul>
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
