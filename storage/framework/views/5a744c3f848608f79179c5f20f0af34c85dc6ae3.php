<html xmlns="http://www.w3.org/1999/xhtml" lang="pt" xml:lang="pt">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Talent Base</title>
    <link rel="apple-touch-icon" href="../../../assets/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon"  href="../../../assets/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/morris.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/timeline.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/gallery.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css">
    <link href="https://fonts.cdnfonts.com/css/alarm-clock" rel="stylesheet">
                

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   menu-collapsed fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                        <!-- <img class="brand-logo" alt="stack admin logo" style="height:2rem" src="../../../assets/logo.png"> -->
                            <h2 style="font-size:1.5rem;font-family:alarm clock" class="brand-text">Talent Base</h2>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon feather icon-toggle-right font-medium-3 white" data-ticon="feather.icon-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                
                    <ul class="nav navbar-nav mr-auto float-left">
                        <?php if(Auth::user()->can_write == 1): ?>
                        <li class="nav-item "><a class="nav-link" href="<?php echo e(route('create.talent')); ?>" title="create"><i style="color:orange" class="ficon feather icon-plus-circle"></i></a></li> 
                        <?php endif; ?>
                        
                        <li>
                            <form  action="<?php echo e(route('searchtalent')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                                <span class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon feather icon-search"></i></a>
                                    <div class="search-input">
                                        <input class="input" style="color:black" name="talent_search" type="text" placeholder="Search by Name.." tabindex="0" data-search="">
                                        <div class="search-input-close"><i class="feather icon-x"></i></div>
                                        <ul class=""></ul>  
                                    </div>
                                </span> 
                            </form>
                        </li>
                        <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li> -->
                        
                    </ul>
                    <ul class="nav navbar-nav float-right">
                      
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span style="color:black" class="user-name"><?php echo e(Auth::user()->name); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                                </a> 

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header" style="font-size:1.2rem;font-family:alarm clock">
                <i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
                </li>
                <li class=" nav-item"><a href="<?php echo e(route('home')); ?>"><i class="feather icon-users"></i><span style="color:white" class="menu-title" data-i18n="Dashboard">Talents</span></a>
                
                <?php if(Auth::user()->is_admin == 1): ?>
                    <li class=" nav-item"><a href="<?php echo e(route('create.booker')); ?>"><i class="feather icon-user"></i><span style="color:white" class="menu-title" data-i18n="Dashboard">Bookers</span></a>
                <?php endif; ?>

                <?php if(Auth::user()->can_write == 1): ?>
                <li class='nav-item'><a href='#settings'><i class="feather icon-sliders"></i><span style="color:white" class="menu-title" data-i18n="setting">Setting</span></a>
                    <ul>
                        <li class=" nav-item"><a href="<?php echo e(route('create.category')); ?>"><i class="feather icon-grid"></i><span style="color:white" class="menu-title" data-i18n="Dashboard">Category</span></a></li>
                        <li class=" nav-item"><a href="<?php echo e(route('create.utility')); ?>"><i class="feather icon-sliders"></i><span style="color:white" class="menu-title" data-i18n="Dashboard">Utility</span></a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="" target="_blank">Model Agency </a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="feather icon-heart pink"></i> by <a href="">Ainigma Dev</a></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/tables/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/jquery.raty.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="../../../app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-contacts.js"></script>
    <!-- END: Page JS-->
    <script src="../../../app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js"></script>
    <script src="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js"></script>
    <script src="../../../app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js"></script>
    <script src="../../../app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js"></script>
    
    <script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>

</body>
<!-- END: Body-->
<script>
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
        $(this).parent(".sub-menu").children("ul").slideToggle("100");
        $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });
</script>

</html><?php /**PATH D:\Ainigma Dev\model_agency\resources\views/navbar.blade.php ENDPATH**/ ?>