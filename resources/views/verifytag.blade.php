<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Partnership Economy Nigeria</title>
  <meta content="" name="Partnership Economy Nigeria">
  <meta content="" name="PEN">
  <meta content="" name="PECONG">

  <!-- Favicons -->
  <link href="assets/img/pen-logo.png" rel="icon">
  <link href="assets/img/pen-logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Multi - v2.1.0
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="https://pecong.org"><img src="{{ asset('assets/img/pen-logo-modified.png') }}" alt="" height="200px"></a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="https://pecong.org" class="logo mr-auto"><img src="{{ asset('assets/img/pen-logo-modified.png') }}" alt="PEN" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="https://pecong.org/">Home</a></li>
          <li><a href="https://pecong.org/services/">About PEN</a></li>
          <li><a href="https://pecong.org/team/">Myk Psymmons</a></li>
          <li><a href="https://pecong.org/contact/">Contact Us</a></li>
          <li class="active"><a href="https://pecong.org/pen/">Registration</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('login') }}" class="get-started-btn">Log in</a>

    </div>
  </header><!-- End Header -->

  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">


        
        
          
    </section><!-- End About Section -->

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>PEN Summit Abuja, 2020</h2>
          <p>Participant Verification</p>
        </div>
        @isset($user)
        <center><img src="{{ asset('assets/img/verified.png') }}" width="200px;"><br /><h2><b>Verified</b></h2></center>
        <div class="row content">
          <div class="col-lg-2">
              <div class="form-group">
                  <label>Title</label>
                  <p class="form-control">{{ $user[0]->title }}</p>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                  <label>Name</label>
                  <p class="form-control">{{ $user[0]->name }}</p>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="form-group">
                  <label>Member ID</label>
                  <p class="form-control">{{ $user[0]->membershipid }}</p>
              </div>
          </div>
          </div>
        @else
        <center><img src="{{ asset('assets/img/notverified.png') }}" width="200px;"></center>
        <center>
            <div class="form-group">
                  <h2><b>Can't Verify User</b></h2>
              </div>
        </center>
        @endisset
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright {{ date('Y') }} <strong><span>Partnership Economy Nigeria</span></strong> Powered by | <a href="https://andjemztech.com">AndJemz Tech</a>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/multi-responsive-bootstrap-template/ --
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets/js/plugins/sweetalert2.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
@include('process.payments')