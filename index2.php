
<?php
session_start();
include("controllers/setup/connect.php");
require_once("controllers/auth/auth.php");
?>

<!DOCTYPE html>
<html class="" lang="zxx">

<!-- Mirrored from utouchdesign.com/themes/envato/escort/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:01:02 GMT -->
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

<!-- ======================= Start Banner ===================== -->
<div class="utf_main_banner_area" style="background-image:url(assets/img/slider_bg.jpg);" data-overlay="8">
  <div class="container">
    <div class="col-md-8 col-sm-10">
      <div class="caption cl-white home_two_slid">
        <h2>Search Between More Then <span class="theme-cl">50,000</span> Open Jobs.</h2>
        <p>Trending Jobs Keywords: <span class="trending_key"><a href="#">Web Designer</a></span> <span class="trending_key"><a href="#">Web Developer</a></span> <span class="trending_key"><a href="#">IOS Developer</a></span> <span class="trending_key"><a href="#">Android Developer</a></span></p>
      </div>
      <form>
        <fieldset class="utf_home_form_one">
          <div class="col-md-4 col-sm-4 padd-0">
            <input type="text" class="form-control br-1" placeholder="Search Keywords..." />
          </div>
          <div class="col-md-3 col-sm-3 padd-0">
            <select class="wide form-control br-1">
              <option data-display="Location">All Country</option>
              <option value="1">Afghanistan</option>
              <option value="2">Albania</option>
              <option value="3">Algeria</option>
			  <option value="4">Brazil</option>
              <option value="5">Burundi</option>
              <option value="6">Bulgaria</option>
			  <option value="7">Germany</option>
              <option value="8">Grenada</option>
              <option value="9">Guatemala</option>
              <option value="10" disabled>Iceland</option>
            </select>
          </div>
          <div class="col-md-3 col-sm-3 padd-0">
            <select class="wide form-control">
              <option data-display="Category">Show All</option>
              <option value="1">Software Developer</option>
              <option value="2">Java Developer</option>
              <option value="3">Software Engineer</option>
			  <option value="4">Web Developer</option>
              <option value="5">PHP Developer</option>
              <option value="6">Python Developer</option>
			  <option value="7">Front end Developer</option>
              <option value="8">Associate Developer</option>
              <option value="9">Back end Developer</option>
			  <option value="10">XML Developer</option>
              <option value="11">.NET Developer</option>
			  <option value="12" disabled>Marketting Developer</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-2 padd-0 m-clear">
            <button type="submit" class="btn theme-btn cl-white seub-btn">Search</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!-- ======================= End Banner ===================== -->

<!-- ================= Job start ========================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
      <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#recent" role="tab"> Latest Jobs</a> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#" role="tab"> Recent Jobs</a> </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in show active" id="recent" role="tabpanel">
        <div class="row">

          <?php
    $sql_query1 =  mysqli_query($dbc,"SELECT * FROM job_posting  ORDER BY id");

    $number = 1;
    if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
    {?>
      <?php
      $no = 1;
       $sql = mysqli_query($dbc,"SELECT * FROM job_posting  ORDER BY id DESC");
       while($row = mysqli_fetch_array($sql)){
       ?>
          <div class="col-md-3 col-sm-6">
            <?php
              if($row['emp_type'] == 'Permanent')
                {
                  ?>
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type"><?php echo $row['emp_type'] ;?></span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox" checked>
                  <i class="fa fa-heart"></i>
        </label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_1.png" alt=""> </a> </div>
              <?php
            }
              else {
                ?>
                  <div class="utf_grid_job_widget_area"> <span class="job-type part-type"><?php echo $row['emp_type'] ;?></span>
                    <div class="utf_job_like">
                      <label class="toggler toggler-danger">
                        <input type="checkbox" checked>
                        <i class="fa fa-heart"></i>
              </label>
                    </div>
                    <div class="u-content">
                      <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_2.png" alt=""> </a> </div>
                            <?php
              }
                    ?>

                <h5><a href="employer-detail.html"><?php echo $row['job_title'] ;?></a></h5>
                <p class="text-muted">       <?php echo $row['job_location'] ;?>,  <?php echo $row['country'] ;?> <br/>
                        </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <?php
     }
   ?>
          <?php
          }
          else
          {
                ?>
              <br/>
          <div class="alert alert-info">
          <strong><i class="fa fa-info-circle"></i> No Job Posted</strong>
          </div>

            <?php
          }
          ?>
          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox" checked>
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_1.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Product Redesign</a></h5>
                <p class="text-muted">2708 Scenic Way, IL 62373</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_2.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">New Product Mockup</a></h5>
                <p class="text-muted">2708 Scenic Way, IL 62373</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox" checked>
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_3.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Custom Php Developer</a></h5>
                <p class="text-muted">3765 C Street, Worcester</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_4.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Wordpress Developer</a></h5>
                <p class="text-muted">2719 Duff Avenue, Winooski</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type internship-type">Internship</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox" checked>
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_5.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Web Maintenence</a></h5>
                <p class="text-muted">2708 Scenic Way, IL 62373</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_6.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Photoshop Designer</a></h5>
                <p class="text-muted">2865 Emma Street, Lubbock</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_7.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">HTML5 & CSS3 Coder</a></h5>
                <p class="text-muted">2719 Burnside Avenue, Logan</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox" checked>
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_8.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">.Net Developer</a></h5>
                <p class="text-muted">3815 Forest Drive, Alexandria</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Featured Job -->
      <div class="tab-pane fade" id="featured" role="tabpanel">
        <div class="row">
          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_6.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">.Net Developer</a></h5>
                <p class="text-muted">2708 Scenic Way, IL 62373</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_4.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Java Developer</a></h5>
                <p class="text-muted">2708 Scenic Way, IL 62373</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_5.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Web Maintenence</a></h5>
                <p class="text-muted">3765 C Street, Worcester</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_1.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Wordpress Developer</a></h5>
                <p class="text-muted">2719 Duff Avenue, Winooski</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type internship-type">Internship</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_7.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Custom Php Developer</a></h5>
                <p class="text-muted">2708 Scenic Way, IL 62373</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_8.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">New Product Mockup</a></h5>
                <p class="text-muted">2865 Emma Street, Lubbock</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_3.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Product Redesign</a></h5>
                <p class="text-muted">2719 Burnside Avenue, Logan</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>

          <!-- Single Job -->
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area"> <span class="job-type part-type">Part Time</span>
              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
				</label>
              </div>
              <div class="u-content">
                <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/img/company_logo_6.png" alt=""> </a> </div>
                <h5><a href="employer-detail.html">Front End Designer</a></h5>
                <p class="text-muted">3815 Forest Drive, Alexandria</p>
              </div>
              <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 mrg-top-20 text-center">
      <a href="job-layout-one.html" class="btn theme-btn btn-m">Browse All Jobs</a>
    </div>
  </div>
</section>

<!-- ================= Category start ========================= -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>Job Categories</h2>
		  <p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
        </div>
      </div>
    </div>
    <div class="row">
		<div class="col-md-12">
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="icon-bargraph" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Web & Software Dev</h4>
					  <p>122 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="icon-tools" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Data Science & Analitycs</h4>
					  <p>155 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="ti-briefcase" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Accounting & Consulting</h4>
					  <p>300 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="ti-ruler-pencil" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Writing & Translations</h4>
					  <p>80 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="icon-briefcase" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Sales & Marketing</h4>
					  <p>120 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="icon-wine" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Graphics & Design</h4>
					  <p>78 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="ti-world" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Digital Marketing</h4>
					  <p>90 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-3 col-sm-6">
			<a href="browse-job.html" title="">
				<div class="utf_category_box_area">
				  <div class="utf_category_desc">
					<div class="utf_category_icon"> <i class="ti-desktop" aria-hidden="true"></i> </div>
					<div class="category-detail utf_category_desc_text">
					  <h4>Education & Training</h4>
					  <p>210 Jobs</p>
					</div>
				  </div>
				</div>
			</a>
		  </div>
		  <div class="col-md-12 mrg-top-20 text-center">
			<a href="browse-category.html" class="btn theme-btn btn-m">View All Categories</a>
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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootsnav.js"></script>
<script src="assets/js/viewportchecker.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
<script src="assets/plugins/aos-master/aos.js"></script>
<script src="assets/plugins/nice-select/js/jquery.nice-select.min.js"></script>
<script src="assets/js/custom.js"></script>

<!--jquery autosize-->
<script src="assets/js/jquery.autosize.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="assets/libs/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/libs/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/libs/datatables/datatables.min.js"></script>
<!-- datepicker -->
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<!-- maxlength -->
<script src="assets/js/bootstrap-maxlength.js"></script>

<!--highcharts -->
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="assets/js/offline-exporting.js"></script>
<!-- autosave forms sisyphus -->
<script src="assets/js/sisyphus.min.js"></script>

<!--Typed js -->
<script src="assets/js/typed.js"></script>
<script src="assets/js/jq-ajax-progress.js"></script>

<!-- shimmer js -->
<script src="assets/libs/shimmerjs/shimmer.js"></script>

<!-- simpleticker  js -->
<script src="assets/libs/vticker/jquery.vticker-min.js"></script>

<!-- pace min js -->
<script data-pace-options='{ "ajax": true }' src='assets/js/pace.min.js'></script>

<!-- animated event calendar  js -->
<script src="assets/libs/animated-event-calendar/src/jquery.simple-calendar.js"></script>

<!-- roadmap -->
<script src="assets/libs/roadmap/dist/jquery.roadmap.min.js"></script>

<!-- gantt -->
<script src="assets/libs/gantt/js/jquery.fn.gantt.js"></script>

<!-- color schemes for the charts -->
<script src="assets/js/chartjs-plugin-colorschemes.min.js"></script>

<script src="assets/libs/smartwizard/jquery.smartWizard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script src="assets/js/jquery.lettering.js"></script>
<script src="assets/js/jquery.textillate.js"></script>
<!-- routes -->
<script src="controllers/routes.js?v41"></script>

<!-- custom -->
<script src="controllers/custom.js?v=55"></script>

<!-- skeleton -->
<script src="controllers/skeletons.js?v=22"></script>

<!-- validators -->
<script src="controllers/validators.js"></script>

<!-- forms -->
<script src="controllers/forms.js?v=69"></script>

<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="fd25f24e-2c7d-4a3e-8307-766c1a69a4ec";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>

<script>
$crisp.push(["set", "user:nickname", ["<?php echo $_SESSION['fName']; ?>"]]);
</script>

<script>
	$(window).load(function() {
	  $(".page_preloaderr").fadeOut("slow");;
	});
	AOS.init();
</script>

</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 07:02:10 GMT -->
</html>
