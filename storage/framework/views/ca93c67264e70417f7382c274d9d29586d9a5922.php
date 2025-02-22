<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="favicon.png">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@0;1&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="front-assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="front-assets/css/animate.min.css">
  <link rel="stylesheet" href="front-assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="front-assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="front-assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="front-assets/fonts/feather/style.css">
  <link rel="stylesheet" href="front-assets/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="front-assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="front-assets/css/aos.css">
  <link rel="stylesheet" href="front-assets/css/style.css">

  <title>Talent Base</title>
</head>
<body>
  <div class="lines-wrap">
    <div class="lines-inner">
      <div class="lines"></div>
    </div>
  </div>
  <!-- END lines -->


  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  <nav class="site-nav">
    <div class="container">
      <div class="site-navigation">
        <a href="<?php echo e(route('frontend.home')); ?>" class="logo float-left m-0">Talent Base<span class="text-primary">.</span></a>

        <ul class="js-clone-nav d-none d-lg-inline-none site-menu">
          <li class="active mb-3 text-center logo"><h4>Contact Us</h4></li>
          <li class="text-center h5 my-2">Email<a class="logo"> info@talentbase.com</a></li>
          <li class="text-center h5 my-2">Address<a class="logo"> City abc, street xyz</a></li>
          <li class="text-center h5 my-2">Phone<a class="logo"> +066 896675840</a></li>
          <li class="text-center h5 my-3 py-1 btn btn-primary"><a class="logo text-light" href="<?php echo e(route('home')); ?>" target="_blank">Login / Sign-Up</a></li>
        </ul>

        <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-block" data-toggle="collapse" data-target="#main-navbar">
          <span></span>
        </a>

      </div>
    </div>
  </nav>

  <?php echo $__env->yieldContent('content'); ?>

  <div class="custom-hero section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h1>Hire a Talent</h1>
          <p>At Talent Base, our mission goes beyond showcasing talent. We're dedicated to empowering artists by providing them with a platform to share their stories.</p>
          <p><a href="<?php echo e(route('home')); ?>" target="_blank" class="btn btn-primary">Sign In</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-footer">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4">
          <div class="widget">
            <h3>About</h3>
            <p>Join us on this journey as we celebrate art in all its forms, weaving together the threads of our diverse and interconnected world. Welcome to Talent Base, where creativity knows no boundaries.</p>
          </div>
          <div class="widget">
            <h3>Connect with us</h3>
            <ul class="social list-unstyled">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-dribbble"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center copyright">
        <div class="col-md-8">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved.
          </p>
        </div>
      </div>
    </div>
  </div>


  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="front-assets/js/jquery-3.5.1.min.js"></script>
  <script src="front-assets/js/jquery-migrate-3.0.0.min.js"></script>
  <script src="front-assets/js/popper.min.js"></script>
  <script src="front-assets/js/bootstrap.min.js"></script>
  <script src="front-assets/js/owl.carousel.min.js"></script>
  <script src="front-assets/js/aos.js"></script>
  <script src="front-assets/js/imagesloaded.pkgd.js"></script>
  <script src="front-assets/js/isotope.pkgd.min.js"></script>
  <script src="front-assets/js/jquery.animateNumber.min.js"></script>
  <script src="front-assets/js/jquery.stellar.min.js"></script>
  <script src="front-assets/js/jarallax.min.js"></script>
  <script src="front-assets/js/jarallax-element.min.js"></script>
  <script src="front-assets/js/jquery.waypoints.min.js"></script>
  <script src="front-assets/js/jquery.fancybox.min.js"></script>

  <script src="front-assets/js/jquery.lettering.js"></script>


  <script src="front-assets/js/TweenMax.min.js"></script>
  <script src="front-assets/js/ScrollMagic.min.js"></script>
  <script src="front-assets/js/scrollmagic.animation.gsap.min.js"></script>
  <script src="front-assets/js/debug.addIndicators.min.js"></script>


  <script src="front-assets/js/custom.js"></script>

  
</body>
</html>

<?php /**PATH D:\Ainigma Dev\model_agency\resources\views/layouts/front.blade.php ENDPATH**/ ?>