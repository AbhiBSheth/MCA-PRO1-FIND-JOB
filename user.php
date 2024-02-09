<?php
session_start();
if(!isset($_SESSION['usr'])){
  header("location:index.php");
}
if(isset($_SESSION['lo'])){
  echo "<audio id='bgAudio' src='assets/user.mp3' autoplay ></audio>
<script>
  var audio = document.getElementById('bgAudio');
  audio.volume = 0.3;
</script>";
unset($_SESSION['lo']);
}
$cn = mysqli_connect("localhost", "root", "", "fj");
$u11 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE un = '$_SESSION[usr]'"));
$u1 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `us` WHERE em = '$u11[em]'"));
if (isset($_POST['search'])) {
  $company = strtoupper($_POST['company']);
  $jobtype = strtoupper($_POST['jobtype']);
  $city = strtoupper($_POST['city']);
  $salary = $_POST['salary'];
  $log = mysqli_query($cn, "SELECT * FROM `job` WHERE conm like '$company' OR job like '$jobtype' OR city like '$city' OR sal like '$salary'");
}
else{
  $log = mysqli_query($cn, "SELECT * FROM `job`");
}
if (isset($_GET['key']) && $_GET['key'] == "daj") {
  $d_query = "DELETE FROM `appjob` WHERE id=" . $_GET['id'];
  $d_result = mysqli_query($cn, $d_query);
  $d_row = mysqli_affected_rows($cn);
  if ($d_row > 0) {
    echo "<script>alert('Record Deleted Successfully.');window.location.assign('admin.php');</script>";
  }
}
if (isset($_GET['key']) && $_GET['key'] == "aaj") {
  $id = $_GET['id'];
  $insert = mysqli_query($cn ,"INSERT INTO `appjob`( `em`, `job`) VALUES ('$u11[em]','$id')");
    echo "<script>alert('Applye Successfully.');window.location.assign('admin.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Find Job</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
      <a class="logo" href=""><img src="assets/img/logo.jpg" alt=""></a>
      <h1 class="h1 text-info">Find Job</h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><button class="nav-link scrollto" onclick="document.getElementById('id01').style.display='block'"
              style="width:auto;">Profile</button></li>
          <li><a class="nav-link scrollto" href="https://cvmkr.com/CV/new#0" target="_blank">Make Resume</a></li>
          <li><a class="nav-link scrollto" href="#job">Job Search</a></li>
          <li><a class="nav-link scrollto" href="#company">Company</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Welcome <?php echo $u11['fnm']; ?> to <span>Find Job</span></h2>
              <p class="animated fadeInUp">Find Best Job Opportunities in our Find A Job Portal and get Best Experience
                of User Friendly Portal</p>
            </div>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Find Best Job And Get Best Experience</h2>
              <p class="animated fadeInUp">In our WebSite User Can Find Job And Directly Apply In User Panel And Company
                Can Add Job Proposiol in Our WebSite </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= job Section ======= -->
    <section id="job" class="job">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Job Search</h2>
        </div>
        <form action="" method="post">
        <div class="col text-center">
        <label>COMPANY</label>
        <input type="text" placeholder="Enter Company" name="company" style="width:10%">
        <label>JOB TYPE</label>
        <input type="text" placeholder="Enter Jobtype" name="jobtype" style="width:10%">
        <label>CITY</label>
        <input type="text" placeholder="Enter City" name="city" style="width:10%">
        <label>SALARY</label>
        <input type="text" placeholder="Enter Salary" name="salary" style="width:10%">
        </div>
        <div class="col text-center"><button class="button1" type="submit" name="search">Search</button><span> </span><button type="button" onclick="window.location.assign('index.php');" class="cancelbtn">Cancel</button></span></div>
        </form>
        <div class="Table responsive Class" class="col icon-boxes d-flex flex-column align-items-stretch justify-content-center py-2 px-lg-5">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope='col'>Company</th>
                <th scope='col'>JOB TYPE</th>
                <th scope='col'>CITY</th>
                <th scope='col'>JOB REQUIREMENT</th>
                <th scope='col'>SALARY</th>
                <th scope='col'>APPLAY</th>
              </tr>
            </thead>
            <?php
            
            while ($fetch = mysqli_fetch_array($log)) {
              echo "<tr><th scope='row'>" . $fetch['conm'] . "</td><td>" . $fetch['job'] . "</td><td>" . $fetch['city'] . "</td><td>" . $fetch['jobtyp'] . "</td><td>" . $fetch['sal'] . "</td><td><a href='user.php?key=aaj&id=" . $fetch['id'] . "'><i class='bi bi-pencil-square'></i></a></td></tr></div>";
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End job Section -->
<section id="ajob" class="job">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Job</h2>
        </div>
        <div class="Table responsive Class" class="col icon-boxes d-flex flex-column align-items-stretch justify-content-center py-2 px-lg-5">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope='col'>ID </th>
                <th scope='col'>USER EMAIL </th>
                <th scope='col'>NAME </th>
                <th scope='col'>COMPANY NAME</th>
                <th scope='col'>JOB ID </th>
                <th scope='col'>JOB TYPE </th>
                <th scope='col'>APPROVE OR REJECT </th>
                <th scope='col'>DELETE</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['usr'])) {
              $ajob = mysqli_query($cn, "SELECT * FROM `appjob` WHERE em = '$u11[em]'");
              while ($aj = mysqli_fetch_array($ajob)) {
                $ul = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$aj[em]'"));
                $jo = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `job` WHERE id = '$aj[job]'"));
                echo "<tr><th scope='row'>" . $aj['id'] . "</td><td>" . $aj['em'] . "</td><td>" . $ul['fnm'] . "</td><td>" . $jo['conm'] . "</td><td>" . $aj['job'] . "</td><td>" . $jo['job'] . "</td><td>" . $aj['ans'] . "</td><td><a href='admin.php?key=daj&id=" . $aj['id'] . "'><i class='bi bi-file-earmark-x'></i></a></td></tr></div>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End Job Section -->
    <!-- =======Company Section ======= -->
    <section id="company" class="Company">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Company</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">

            <div class="row">
              <div class="col-lg-2">
                <a href="https://www.tcs.com/" target="_blank" rel="noopener noreferrer">
                  <img src="assets/img/tcs.png" alt="" />
                </a>
              </div><!-- End Company-item -->
              <div class="col-lg-2">
                <a href="https://www.infosys.com/" target="_blank" rel="noopener noreferrer">
                  <img src="assets/img/infosys.png" alt="" />
                </a>
              </div><!-- End Company-item -->
              <div class="col-lg-2">
                <a href="https://www.wipro.com/" target="_blank" rel="noopener noreferrer">
                  <img src="assets/img/wipro.png" alt="" />
                </a>
              </div><!-- End Company-item -->
              <div class="col-lg-2">
                <a href="https://careers.google.com/" target="_blank" rel="noopener noreferrer">
                  <img src="assets/img/google.png" alt="" />
                </a>
              </div><!-- End Company-item -->
              <div class="col-lg-2">
                <a href="https://careers.microsoft.com/" target="_blank" rel="noopener noreferrer">
                  <img src="assets/img/microsoft.png" alt="" />
                </a>
              </div><!-- End Company-item -->
              <div class="col-lg-2">
                <a href="https://www.oracle.com/in/careers/" target="_blank" rel="noopener noreferrer">
                  <img src="assets/img/oracle.png" alt="" />
                </a>
              </div><!-- End Company-item -->
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Company Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Get In Touch With <span>Us</span></h3>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">

              <div class="col-lg-6">

                <div class="row justify-content-center">

                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-map"></i>
                    <h4>Address</h4>
                    <p>Addresh Line 1,<br>Addresh Line 2</p>
                  </div>
                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-phone"></i>
                    <h4>Call Us</h4>
                    <p>+91 9999999999</p>
                  </div>
                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-envelope"></i>
                    <h4>Email Us</h4>
                    <p>contact@example.com<br>test@example.com</p>
                  </div>
                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-time-five"></i>
                    <h4>Working Hours</h4>
                    <p>Mon to Sat <br> 9:30 AM to 6:00 PM</p>
                  </div>

                </div>

              </div>

              <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 form-group mt-2 md-0">
                      <label for="name">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="col-md-6 form-group mt-2 md-0">
                      <label for="email">Your Email</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" rows="8" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->
    <!--Profile Section-->
    <div id="id01" class="modal">
    <form class="modal-content animate" action="signup.php" enctype='multipart/form-data' method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <div class="col"><img src="photo/<?php echo $u1['photo']; ?>" class="rounded-4 shadow-4" style="width:70px;"></div><label class="custom-upload"><input type="file" name="photo" value="" /><i class="bi bi-pencil-square"></i></label>
        </div>
        <div class="imgcontainer">
          <h3>Profile</h3>
        </div>
        <input type="hidden" name="id" value="<?php echo $u11['id']; ?>" />
        <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Full Name</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $u11['fnm']; ?>" name="fnm" required></div>
        <div class="col px-3"><label><b><i class="bi bi-envelope-at"></i> Email</b></label></div>
        <div class="col px-3"><input type="email" value="<?php echo $u11['em']; ?>" name="em" required></div>
        <div class="col px-3"><label><b><i class="bi bi-phone"></i> Mobile</b></label></div>
        <div class="col px-3"><input type="number" value="<?php echo $u1['mob']; ?>" name="mob" required></div>
        <div class="col px-3"><label><b><i class="bi bi-buildings"></i> Addresh</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $u1['ad']; ?>" name="ad" required></div>
        <div class="col px-3"><label><b><i class="bi bi-mortarboard"></i> Greduation</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $u1['greduation']; ?>" name="greduation" required></div>
        <div class="col px-3"><label><b><i class="bi bi-mortarboard"></i> H.S.C</b></label></div>
        <div class="col px-3"><input type="number" value="<?php echo $u1['hsc']; ?>" name="hsc" required></div>
        <div class="col px-3"><label><b><i class="bi bi-mortarboard"></i> Degree</b></label></div>
        <div class="col px-3"><input type="number" value="<?php echo $u1['deg']; ?>" name="deg" required></div>
        <div class="col px-3"><label><b><i class="bi bi-mortarboard"></i> Master Degree</b></label></div>
        <div class="col px-3"><input type="number" value="<?php echo $u1['mas']; ?>" name="mas" required></div>
        <div class="col px-3"><label><b><i class="bi bi-calendar-event-fill"></i> Date Of Birth</b></label></div>
        <div class="col px-3"><input type="date" value="<?php echo $u1['dob']; ?>" name="dob" required></div>
        <div class="col text-center"><button class="button1" type="submit" name="upu">Update</button><span> </span><button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></span></div>
      </form>
    </div><!--END Profile Section-->
    <script>
      // Get the modal
      function Id1() {
        document.getElementById('id01').style.display = 'none'
      }
      var modal = document.getElementById('id01');
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 pt-4">
            <h4>Subscribe For New Job Notification</h4>
            <p>Enter Email And Subscribe Our New Job Related Information</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter Email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">

              <div class="col-lg-4 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#job">Job Search</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#company">Company</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-6 footer-contact">
                <h4>Contact Us</h4>
                <p>
                  Addresh <br>
                  Addresh Line 1<br>
                  Addresh Line 2<br><br>
                  <strong>Phone:</strong> +91 9999999999<br>
                  <strong>Email:</strong> test@example.com<br>
                </p>

              </div>

              <div class="col-lg-4 col-md-6 footer-info">
                <h3>Folow US</h3>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Find Job</span></strong>. 2023 All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        Designed by <a href="https://abhibsheth.github.io/Cv/" target="_blank">Abhi Sheth</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>