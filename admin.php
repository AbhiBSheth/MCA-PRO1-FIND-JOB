<?php
session_start();
if (isset($_SESSION['lo'])) {
  echo "<audio id='bgAudio' src='assets/admin.mp3' autoplay ></audio>
<script>
  var audio = document.getElementById('bgAudio');
  audio.volume = 0.3;
</script>";
  unset($_SESSION['lo']);
}
if (!isset($_SESSION['adm'])) {
  header("location:index.php");
}
$cn = mysqli_connect("localhost", "root", "", "fj");
if (isset($_GET['key']) && $_GET['key'] == "d") {
  if ($_GET['id'] == 1) {
    echo "<script>alert('Admin Can Not Deleted.');window.location.assign('admin.php');</script>";
  } else {
    $d_query = "DELETE FROM `user` WHERE id=" . $_GET['id'];
    $d_result = mysqli_query($cn, $d_query);
    $d_row = mysqli_affected_rows($cn);
    if ($d_row > 0) {
      echo "<script>alert('Record Deleted Successfully.');window.location.assign('admin.php');</script>";
    }
  }
}
if (isset($_GET['key']) && $_GET['key'] == "du") {
  $d_query = "DELETE FROM `us` WHERE id=" . $_GET['id'];
  $d_result = mysqli_query($cn, $d_query);
  $d_row = mysqli_affected_rows($cn);
  if ($d_row > 0) {
    echo "<script>alert('Record Deleted Successfully.');window.location.assign('admin.php');</script>";
  }
}
if (isset($_GET['key']) && $_GET['key'] == "dc") {
  $d_query = "DELETE FROM `co` WHERE id=" . $_GET['id'];
  $d_result = mysqli_query($cn, $d_query);
  $d_row = mysqli_affected_rows($cn);
  if ($d_row > 0) {
    echo "<script>alert('Record Deleted Successfully.');window.location.assign('admin.php');</script>";
  }
}
if (isset($_GET['key']) && $_GET['key'] == "dj") {
  $d_query = "DELETE FROM `job` WHERE id=" . $_GET['id'];
  $d_result = mysqli_query($cn, $d_query);
  $d_row = mysqli_affected_rows($cn);
  if ($d_row > 0) {
    echo "<script>alert('Record Deleted Successfully.');window.location.assign('admin.php');</script>";
  }
}
if (isset($_GET['key']) && $_GET['key'] == "daj") {
  $d_query = "DELETE FROM `appjob` WHERE id=" . $_GET['id'];
  $d_result = mysqli_query($cn, $d_query);
  $d_row = mysqli_affected_rows($cn);
  if ($d_row > 0) {
    echo "<script>alert('Record Deleted Successfully.');window.location.assign('admin.php');</script>";
  }
}
$pr = mysqli_query($cn, "SELECT * FROM `user` WHERE un = '$_SESSION[adm]'");
$p = mysqli_fetch_array($pr);
?>
<?php
if (isset($_GET['key']) && $_GET['key'] == "e") {
  if ($_GET['id'] == 1) {
    echo "<script>alert('Admin Can Not Edit.');window.location.assign('admin.php');</script>";
  } else {
    $id = $_GET['id'];
    $login1 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE id = '$id'"));
?>

    <body onload="document.getElementById('login1').style.display = 'block'"></body>
<?php
  }
}
?>
<?php
if (isset($_GET['key']) && $_GET['key'] == "eu") {
  $uid = $_GET['id'];
?>

  <body onload="document.getElementById('user1').style.display = 'block'"></body>
<?php
}
?>
<?php
if (isset($_GET['key']) && $_GET['key'] == "ec") {
  $cid = $_GET['id'];
?>

  <body onload="document.getElementById('comp').style.display = 'block'"></body>
<?php
}
?>
<?php
if (isset($_GET['key']) && $_GET['key'] == "ej") {
  $jid = $_GET['id'];
?>

  <body onload="document.getElementById('job1').style.display = 'block'"></body>
<?php
}
?>
<?php
if (isset($_GET['key']) && $_GET['key'] == "eaj") {
  $ajid = $_GET['id'];
?>

  <body onload="document.getElementById('ajob1').style.display = 'block'"></body>
<?php
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
      <a class="logo" href="admin.php"><img src="assets/img/logo.jpg" alt=""></a>
      <h1 class="h1 text-info">Find Job</h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="admin.php">Home</a></li>
          <li><button class="nav-link scrollto" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Profile</button></li>
          <li><a class="nav-link scrollto" href="#login">Login Details</a></li>
          <li><a class="nav-link scrollto" href="#user">User</a></li>
          <li><a class="nav-link scrollto" href="#company">Company</a></li>
          <li><a class="nav-link scrollto" href="#job">Job</a></li>
          <li><a class="nav-link scrollto" href="#ajob">Applied Job</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><button class="nav-link scrollto" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign up</button></li>
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
              <h2 class="animated fadeInDown">Welcome <?php echo $p['fnm']; ?> to <span>Find Job</span></h2>
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

    <!-- ======= Login Section ======= -->
    <section id="login" class="job">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Login Details</h2>
        </div>
        <div class="Table responsive Class" class="col icon-boxes d-flex flex-column align-items-stretch justify-content-center py-2 px-lg-5">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>FULL NAME</th>
                <th scope='col'>EMAIL ID</th>
                <th scope='col'>USER NAME</th>
                <th scope='col'>USER TYPE</th>
                <th scope='col'>DELETE</th>
                <th scope='col'>UPDATE</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['adm'])) {
              $log = mysqli_query($cn, "SELECT * FROM `user`");
              while ($fetch = mysqli_fetch_array($log)) {
                echo "<tr><th scope='row'>" . $fetch['id'] . "</td><td>" . $fetch['fnm'] . "</td><td>" . $fetch['em'] . "</td><td>" . $fetch['un'] . "</td><td>" . $fetch['uac'] . "</td><td><a href='admin.php?key=d&id=" . $fetch['id'] . "'><i class='bi bi-file-earmark-x'></i></a></td><td><a href='admin.php?key=e&id=" . $fetch['id'] . "'><i class='bi bi-pencil-square'></i></a></td></tr></div>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End Login Section -->

    <div id="login1" class="modal">
      <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
          <span onclick="window.location.assign('admin.php');" class="close" title="Close Modal">&times;</span>
          <img src="assets/img/Logo.jpg" class="rounded-4 shadow-4" style="width:70px;">
        </div>
        <div class="imgcontainer">
          <h3>Login</h3>
        </div>
        <div class="col md-1">
          <input type="hidden" name="id" value="<?php echo $login1['id']; ?>" />
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Full Name</b></label></div>
          <div class="col px-3"><input type="text" value="<?php echo $login1['fnm']; ?>" name="fnm" required></div>
          <div class="col px-3"><label><b><i class="bi bi-envelope-at"></i> Email</b></label></div>
          <div class="col px-3"><input type="email" value="<?php echo $login1['em']; ?>" name="em" required></div>
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Username</b></label></div>
          <div class="col px-3"><input type="text" value="<?php echo $login1['un']; ?>" name="un" required></div>
          <div class="col px-3"><label><b><i class="bi bi-key"></i> Password</b></label></div>
          <div class="col px-3"><input type="password" value="<?php echo $login1['ps']; ?>" name="ps" required></div>
          <div class="col px-3"><label><b><i class="bi bi-key"></i> Confirm Password</b></label></div>
          <div class="col px-3"><input type="password" value="<?php echo $login1['ps']; ?>" name="rps" required></div>
          <div class="col px-3"><span><label>Choose Role:</label> <input type="radio" name="uac" value="U" <?php echo ($login1['uac'] == "U" ? 'checked="checked"' : ''); ?> /> User <input type="radio" name="uac" value="C" <?php echo ($login1['uac'] == "C" ? 'checked="checked"' : ''); ?> /> Company <input type="radio" name="uac" value="A" <?php echo ($login1['uac'] == "A" ? 'checked="checked"' : ''); ?> /> Admin</span></div>
          <div class="col text-center"><button class="button1" type="submit" name="adup">UPDATE</button><span> </span><button type="button" onclick="window.location.assign('admin.php');" class="cancelbtn">Cancel</button></span></div>
        </div>
      </form>
    </div>

    <!-- =======User Section ======= -->
    <section id="user" class="job">
      <div class="container-fluid">
        <div class="section-title">
          <h2>User Details</h2>
        </div>
        <div class="Table responsive Class" class="col icon-boxes d-flex flex-column align-items-stretch justify-content-center">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>FULL NAME</th>
                <th scope='col'>EMAIL ID</th>
                <th scope='col'>MOBILE</th>
                <th scope='col'>DATE OF BIRTH</th>
                <th scope='col'>DELETE</th>
                <th scope='col'>UPDATE</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['adm'])) {
              $use = mysqli_query($cn, "SELECT * FROM `us`");
              while ($u = mysqli_fetch_array($use)) {
                $f = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$u[em]'"));
                echo "<tr><th scope='row'>" . $u['id'] . "</td><td>" . $f['fnm'] . "</td><td>" . $u['em'] . "</td><td>" . $u['mob'] . "</td><td>" . $u['dob'] . "</td><td><a href='admin.php?key=du&id=" . $u['id'] . "'><i class='bi bi-file-earmark-x'></i></a></td><td><a href='admin.php?key=eu&id=" . $u['id'] . "'><i class='bi bi-pencil-square'></i></a></td></tr></div>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End User Section -->
    <div id="user1" class="modal">
      <?php
      $u1 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `us` WHERE id = '$uid'"));
      $u11 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$u1[em]'"));
      ?>
      <form class="modal-content animate" action="signup.php" enctype='multipart/form-data' method="post">
        <div class="imgcontainer">
          <span onclick="window.location.assign('admin.php');" class="close" title="Close Modal">&times;</span>
          <div class="col"><img src="photo/<?php echo $u1['photo']; ?>" class="rounded-4 shadow-4" style="width:70px;"></div><label class="custom-upload"><input type="file" name="photo" value="<?php echo $u1['photo']; ?>" /><i class="bi bi-pencil-square"></i></label>
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
        <div class="col px-3"><input type="text" value="<?php echo $u1['hsc']; ?>" name="hsc" required></div>
        <div class="col px-3"><label><b><i class="bi bi-mortarboard"></i> Degree</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $u1['deg']; ?>" name="deg" required></div>
        <div class="col px-3"><label><b><i class="bi bi-mortarboard"></i> Master Degree</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $u1['mas']; ?>" name="mas" required></div>
        <div class="col px-3"><label><b><i class="bi bi-calendar-event-fill"></i> Date Of Birth</b></label></div>
        <div class="col px-3"><input type="date" value="<?php echo $u1['dob']; ?>" name="dob" required></div>
        <div class="col text-center"><button class="button1" type="submit" name="upu">Update</button><span> </span><button type="button" onclick="window.location.assign('admin.php');" class="cancelbtn">Cancel</button></span></div>
      </form>
    </div>

    <!-- =======Company Section ======= -->
    <section id="company" class="job">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Company Details</h2>
        </div>
        <div class="Table responsive Class" class="col icon-boxes d-flex flex-column align-items-stretch justify-content-center">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>FULL NAME</th>
                <th scope='col'>COMPANY</th>
                <th scope='col'>EMAIL ID</th>
                <th scope='col'>MOBILE</th>
                <th scope='col'>ADDRESH</th>
                <th scope='col'>DELETE</th>
                <th scope='col'>UPDATE</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['adm'])) {
              $com = mysqli_query($cn, "SELECT * FROM `co`");
              while ($c = mysqli_fetch_array($com)) {
                $f = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$c[em]'"));
                echo "<tr><th scope='row'>" . $c['id'] . "</td><td>" . $f['fnm'] . "</td><td>" . $c['conm'] . "</td><td>" . $f['em'] . "</td><td>" . $c['mob'] . "</td><td>" . $c['ad'] . "</td><td><a href='admin.php?key=dc&id=" . $c['id'] . "'><i class='bi bi-file-earmark-x'></i></a></td><td><a href='admin.php?key=ec&id=" . $c['id'] . "'><i class='bi bi-pencil-square'></i></a></td></tr></div>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End Company Section -->

    <div id="comp" class="modal">
      <?php
      $c1 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `co` WHERE id = '$cid'"));
      $c11 = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$c1[em]'"));
      ?>
      <form class="modal-content animate" action="signup.php" enctype='multipart/form-data' method="post">
        <div class="imgcontainer">
          <span onclick="window.location.assign('admin.php');" class="close" title="Close Modal">&times;</span>
          <div class="col"><img src="logo/<?php echo $c1['logo']; ?>" class="rounded-4 shadow-4" style="width:70px;"></div><label class="custom-upload"><input type="file" name="logo" value="<?php echo $c1['logo']; ?>" /><i class="bi bi-pencil-square"></i></label>
        </div>
        <input type="hidden" name="id" value="<?php echo $c11['id']; ?>" />
        <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Full Name</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $c11['fnm']; ?>" name="fnm" required></div>
        <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Company Name</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $c1['conm']; ?>" name="conm" required></div>
        <div class="col px-3"><label><b><i class="bi bi-envelope-at"></i> Email</b></label></div>
        <div class="col px-3"><input type="email" value="<?php echo $c11['em']; ?>" name="em" required></div>
        <div class="col px-3"><label><b><i class="bi bi-phone"></i> Mobile</b></label></div>
        <div class="col px-3"><input type="number" value="<?php echo $c1['mob']; ?>" name="mob" required></div>
        <div class="col px-3"><label><b><i class="bi bi-buildings"></i> Addresh</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $c1['ad']; ?>" name="ad" required></div>
        <div class="col text-center"><button class="button1" type="submit" name="upc">Update</button><span> </span><button type="button" onclick="window.location.assign('admin.php');" class="cancelbtn">Cancel</button></span></div>
      </form>
    </div>

    <!-- =======Job Section ======= -->
    <section id="job" class="job">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Job</h2>
        </div>
        <div class="Table responsive Class" class="col icon-boxes d-flex flex-column align-items-stretch justify-content-center py-2 px-lg-5">
          <table class="table">
            <thead class="table-dark">
              <tr>
              <th scope='col'>ID</th>
                <th scope='col'>Company</th>
                <th scope='col'>JOB TYPE</th>
                <th scope='col'>CITY</th>
                <th scope='col'>JOB REQUIREMENT</th>
                <th scope='col'>SALARY</th>
                <th scope='col'>DELETE</th>
                <th scope='col'>UPDATE</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['adm'])) {
              $job = mysqli_query($cn, "SELECT * FROM `job`");
              while ($j = mysqli_fetch_array($job)) {
                echo "<tr><th scope='row'>" . $j['id'] . "</td><td>" . $j['conm'] . "</td><td>" . $j['job'] . "</td><td>" . $j['city'] . "</td><td>" . $j['jobtyp'] . "</td><td>" . $j['sal'] . "</td><td><a href='admin.php?key=dj&id=" . $j['id'] . "'><i class='bi bi-file-earmark-x'></i></a></td><td><a href='admin.php?key=ej&id=" . $j['id'] . "'><i class='bi bi-pencil-square'></i></a></td></tr></div>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End Job Section -->
    <div id="job1" class="modal">
      <?php
        $job = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `job` WHERE id = '$jid'"));
      ?>
      <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
          <span onclick="window.location.assign('admin.php');" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="imgcontainer">
          <h3><?php echo $job['conm']; ?></h3>
        </div>
        <div class="col md-1">
          <input type="hidden" name="id" value="<?php echo $job['id']; ?>" />
          <input type="hidden" name="conm" value="<?php echo $job['conm']; ?>" />
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> JOB TYPE</b></label></div>
          <div class="col px-3"><input type="text" value="<?php echo $job['job']; ?>" name="job" required></div>
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> CITY</b></label></div>
          <div class="col px-3"><input type="text" value="<?php echo $job['city']; ?>" name="city" required></div>
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> JOB REQUIREMENT</b></label></div>
          <div class="col px-3"><input type="text" value="<?php echo $job['jobtyp']; ?>" name="jobtyp" required></div>
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> SALARY</b></label></div>
          <div class="col px-3"><input type="text" value="<?php echo $job['sal']; ?>" name="sal" required></div>
          <div class="col text-center"><button class="button1" type="submit" name="ju">UPDATE</button><span> </span><button type="button" onclick="window.location.assign('admin.php');" class="cancelbtn">Cancel</button></span></div>
        </div>
      </form>
    </div>

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
                <th scope='col'>UPDATE</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['adm'])) {
              $ajob = mysqli_query($cn, "SELECT * FROM `appjob`");
              while ($aj = mysqli_fetch_array($ajob)) {
                $ul = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$aj[em]'"));
                $jo = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `job` WHERE id = '$aj[job]'"));
                echo "<tr><th scope='row'>" . $aj['id'] . "</td><td>" . $aj['em'] . "</td><td>" . $ul['fnm'] . "</td><td>" . $jo['conm'] . "</td><td>" . $aj['job'] . "</td><td>" . $jo['job'] . "</td><td>" . $aj['ans'] . "</td><td><a href='admin.php?key=daj&id=" . $aj['id'] . "'><i class='bi bi-file-earmark-x'></i></a></td><td><a href='admin.php?key=eaj&id=" . $aj['id'] . "'><i class='bi bi-pencil-square'></i></a></td></tr></div>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section><!-- End Job Section -->
    <div id="ajob1" class="modal">
      <?php
        $ajob = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `appjob` WHERE id = '$ajid'"));
        $ul = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `user` WHERE em = '$ajob[em]'"));
        $jo = mysqli_fetch_array(mysqli_query($cn, "SELECT * FROM `job` WHERE id = '$ajob[job]'"));        
      ?>
      <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
          <span onclick="window.location.assign('admin.php');" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="imgcontainer">
          <h3><?php echo $jo['conm']; ?></h3>
          <h3><?php echo $ajob['em']; ?></h3>
        </div>
        <div class="col md-1">
          <input type="hidden" name="id" value="<?php echo $ajob['id']; ?>" />
          <div class="col px-3"><input type="radio" name="ans" value="APPROVE" <?php echo ($ajob['ans'] == "APPROVE" ? 'checked="checked"' : ''); ?> /> APPROVE <input type="radio" name="ans" value="REJECT" <?php echo ($ajob['ans'] == "REJECT" ? 'checked="checked"' : ''); ?> /> REJECT</div>
          <div class="col text-center"><button class="button1" type="submit" name="aju">UPDATE</button><span> </span><button type="button" onclick="window.location.assign('admin.php');" class="cancelbtn">Cancel</button></span></div>
        </div>
      </form>
    </div>
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
      <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <div class="col"><img src="assets/img/Logo.jpg" class="rounded-4 shadow-4" style="width:70px;"></div><label class="custom-upload"><input type="file" name="fu" accept="image/*"><i class="bi bi-pencil-square"></i></label>
        </div>
        <div class="col text-center">
          <h3>Profile</h3>
        </div>
        <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Full Name</b></label></div>
        <div class="col px-3"><input type="text" value="<?php echo $p['fnm']; ?>" name="fnm" required></div>
        <div class="col px-3"><label><b><i class="bi bi-envelope-at"></i> Email</b></label></div>
        <div class="col px-3"><input type="email" value="<?php echo $p['em']; ?>" name="em" required></div>
        <div class="col text-center"><button class="button1" type="submit" name="upa">Update</button><span> </span><button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></span></div>
    </div>
    </form>
    </div><!--END Profile Section-->
    <!--Sign Up Section-->
    <div id="id02" class="modal">
      <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="assets/img/Logo.jpg" class="rounded-4 shadow-4" style="width:70px;">
        </div>
        <div class="imgcontainer">
          <h3>Sign Up</h3>
        </div>
        <div class="col md-1">
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Full Name</b></label></div>
          <div class="col px-3"><input type="text" placeholder="Enter Full Name" name="fnm" required></div>
          <div class="col px-3"><label><b><i class="bi bi-envelope-at"></i> Email</b></label></div>
          <div class="col px-3"><input type="email" placeholder="Enter Email" name="em" required></div>
          <div class="col px-3"><label><b><i class="bi bi-person-fill"></i> Username</b></label></div>
          <div class="col px-3"><input type="text" placeholder="Enter Username" name="un" required></div>
          <div class="col px-3"><label><b><i class="bi bi-key"></i> Password</b></label></div>
          <div class="col px-3"><input type="password" placeholder="Enter Password" name="ps" required></div>
          <div class="col px-3"><label><b><i class="bi bi-key"></i> Confirm Password</b></label></div>
          <div class="col px-3"><input type="password" placeholder="Confirm Password" name="rps" required></div>
          <div class="col px-3"><span><label>Choose Role:</label> <input type="radio" name="uac" value="C"> Company <input type="radio" name="uac" value="A"> Admin</span></div>
          <div class="col text-center"><button class="button1" type="submit" name="adok">Sign Up</button></div>
          <div class="col px-3"><span class="psw">Alrady User Then <span><a href="logout.php">Logout</a></span></span></div>
        </div>
      </form>
    </div><!--End Sign Up Section-->
    <script>
      function Id1() {
        document.getElementById('id01').style.display = 'none';
      }

      function Id2() {
        document.getElementById('id02').style.display = 'none';
      }
      var modal1 = document.getElementById('id02');
      var modal = document.getElementById('id01');
      var login1 = document.getElementById('login1');
      var user1 = document.getElementById('user1');
      var comp = document.getElementById('comp');
      var job1 = document.getElementById('job1');
      var ajob1 = document.getElementById('ajob1');
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
        if (event.target == modal1) {
          modal1.style.display = "none";
        }
        if (event.target == login1) {
          window.location.assign('admin.php');
        }
        if (event.target == user1) {
          window.location.assign('admin.php');
        }
        if (event.target == comp) {
          window.location.assign('admin.php');
        }
        if (event.target == job1) {
          window.location.assign('admin.php');
        }
        if (event.target == ajob1) {
          window.location.assign('admin.php');
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
                  <li><i class="bx bx-chevron-right"></i> <a href="#user">User</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#company">Company</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#job">Job</a></li>
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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