<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");

        $profile_pic = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM staff_users WHERE Email ='".$_SESSION['email']."'"));
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from utouchdesign.com/themes/envato/escort/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:42 GMT -->
<head>

<?php
include("views/header.php");
?>


</head>
<body class="utf_skin_area">
<div class="page_preloaderr"></div>
<!-- ======================= Start Navigation ===================== -->
<nav class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
  <?php
  include("views/navigation.php");
  ?>

</nav>
<!-- ======================= End Navigation ===================== -->

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>CV Package</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> CV Package</p>
    </div>
  </div>
</div>
<!-- =====
<!-- ======================= End Page Title ===================== -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">
        <div class="col text-center">
          <div class="sec-heading mx-auto">
            <p>Our Packages</p>
            <h2>Our Best Pricing Plan</h2>
          </div>
        </div>
      </div>

      <div class="row align-items-center m-0">
        <div class="col-lg-4 col-md-12">
          <div class="pr-table-box">

            <div class="pr-pricing-price-container">
              <h4 class="pr-price-value"><sup class="pr-currency">$</sup>49</h4>
              <div class="pr-pricing-container">Startup Package</div>
            </div>

            <div class="pr-pricing-list-container">
              <ul class="pr-pricing-list">
                <li>Business &amp; Finance Analysing</li>
                <li>SEO Optimization</li>
                <li>Managment &amp; Marketing</li>
                <li>24/7 Customer Support</li>
                <li>SEO Optimization</li>
              </ul>
            </div>

            <div class="pr-button-wrap">
              <a class="btn price-btn bg-theme" href="#">Sign up<i class="ti-arrow-right ml-2"></i></a>
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-12">
          <div class="pr-table-box featured">

            <div class="pr-pricing-price-container bg-theme">
              <h4 class="pr-price-value"><sup class="pr-currency">$</sup>89</h4>
              <div class="pr-pricing-container">Business Package</div>
            </div>

            <div class="pr-pricing-list-container">
              <ul class="pr-pricing-list">
                <li>Business &amp; Finance Analysing</li>
                <li>SEO Optimization</li>
                <li>Managment &amp; Marketing</li>
                <li>24/7 Customer Support</li>
                <li>SEO Optimization</li>
              </ul>
            </div>

            <div class="pr-button-wrap">
              <a class="btn price-btn btn-black" href="#">Sign up<i class="ti-arrow-right ml-2"></i></a>
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-12">
          <div class="pr-table-box">
            <div class="pr-pricing-price-container">
              <h4 class="pr-price-value"><sup class="pr-currency">$</sup>149</h4>
              <div class="pr-pricing-container">Ultimate Package</div>
            </div>

            <div class="pr-pricing-list-container">
              <ul class="pr-pricing-list">
                <li>Business &amp; Finance Analysing</li>
                <li>SEO Optimization</li>
                <li>Managment &amp; Marketing</li>
                <li>24/7 Customer Support</li>
                <li>SEO Optimization</li>
              </ul>
            </div>

            <div class="pr-button-wrap">
              <a class="btn price-btn bg-theme" href="#">Sign up<i class="ti-arrow-right ml-2"></i></a>
            </div>

          </div>
        </div>
      </div>
</div>
</section>



<section class="newsletter theme-bg" style="background-image:url(assets/img/bg-new.png)">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading light">
          <h2>Subscribe Our Newsletter!</h2>
          <p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
        <div class="newsletter-box text-center">
          <div class="input-group"> <span class="input-group-addon"><span class="ti-email theme-cl"></span></span>
            <input type="text" class="form-control" placeholder="Enter your Email...">
          </div>
          <button type="button" class="btn theme-btn btn-radius btn-m">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= footer start ========================= -->
<?php
include("views/footer.php");
?>

<!-- Signup Code -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="myModalLabel1">
      <div class="modal-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
          <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#employer" role="tab"> <i class="ti-user"></i> Job Seeker</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#candidate" role="tab"> <i class="ti-user"></i> Job Provider</a> </li>
        </ul>
        <!-- Nav tabs -->
        <!-- Tab panels -->
        <div class="tab-content">
          <!-- Employer Panel 1-->
          <div class="tab-pane fade in show active" id="employer" role="tabpanel">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group"> <span class="custom-checkbox">
                <input type="checkbox" id="4">
                <label for="4"></label>
                Remember Me </span> <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
			  </div>
              <div class="form-group text-center">
                <button type="button" class="btn theme-btn full-width btn-m">LogIn</button>
              </div>
            </form>
			<div class="log-option"><span>OR</span></div>
			<div class="row">
              <div class="col-md-6"> <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i> Facebook</a> </div>
              <div class="col-md-6"> <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google"></i> Google</a> </div>
            </div>
          </div>
          <!--/.Panel 1-->

          <!-- Candidate Panel 2-->
          <div class="tab-pane fade" id="candidate" role="tabpanel">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group"> <span class="custom-checkbox">
                <input type="checkbox" id="44">
                <label for="44"></label>
                Remember Me </span> <a href="#" title="Forget" class="fl-right">Forgot Password?</a>
			  </div>
              <div class="form-group text-center">
                <button type="button" class="btn theme-btn full-width btn-m">LogIn</button>
              </div>
            </form>
			<div class="log-option"><span>OR</span></div>
			<div class="row">
              <div class="col-md-6"> <a href="#" title="" class="fb-log-btn log-btn"><i class="fa fa-facebook"></i> Facebook</a> </div>
              <div class="col-md-6"> <a href="#" title="" class="gplus-log-btn log-btn"><i class="fa fa-google"></i> Google</a> </div>
            </div>
          </div>
        </div>
        <!-- Tab panels -->
      </div>
    </div>
  </div>
</div>
<!-- End Signup -->
<div><a href="#" class="scrollup">Scroll</a></div>

<!-- Jquery js-->
<!-- jQuery -->
<?php
include("views/script.php");
?>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/add-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:04:34 GMT -->
</html>
