<?php
session_start();
if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {
    header('location:homepage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by HireMe!">
    <meta name="keywords" content="">

    <title>HireMe by Tom</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
  </head>

  <body class="nav-on-header smart-nav">

    <!-- Navigation bar -->
    <nav class="navbar">
      <div class="container">

        <!-- Logo -->
        <div class="pull-left">
          <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

          <div class="logo-wrapper">
            <a class="logo" href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
            <a class="logo-alt" href="index.php"><img src="assets/img/logo-alt.png" alt="logo-alt"></a>
          </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        <div class="pull-right user-login">
          <a class="btn btn-sm btn-primary" href="user-login.php">Login</a> <span style="color: black; margin-right: 7px;">or</span> <a class="btn btn-round btn-sm btn-info" href="user-register.php">register</a>
        </div>
        <!-- END User account -->
      </div>
    </nav>
    <!-- END Navigation bar -->


    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="col-xs-12">
          <br><br>
          <h2>We offer <mark>1,259</mark> job vacancies right now!</h2>
          <h5 class="font-alt">Find your desire one in a minute</h5>
          <br><br><br>
          <form class="header-job-search" action="user-login.php">
            <div class="input-keyword">
              <input type="text" class="form-control" placeholder="Job title, skills, or company">
            </div>

            <div class="btn-search">
              <button class="btn btn-primary" type="submit">Find jobs</button>
            </div>
          </form>
        </div>

      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>



      <!-- Recent jobs -->
      <section>
        <div class="container">
          <header class="section-header">
            <span>Latest</span>
            <h2>Recent jobs</h2>
          </header>

          <div class="row item-blocks-connected">

            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="user-login.php">
                <header>
                  <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">Menlo park, CA</span>
                    <span class="label label-success">Full-time</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->
              <!-- Job item -->
              <div class="col-xs-12">
                  <a class="item-block" href="user-login.php">
                      <header>
                          <div class="hgroup">
                              <h4>Senior front-end developer</h4>
                              <h5>Google</h5>
                          </div>
                          <div class="header-meta">
                              <span class="location">Menlo park, CA</span>
                              <span class="label label-success">Full-time</span>
                          </div>
                      </header>
                  </a>
              </div>
              <!-- END Job item -->
              <!-- Job item -->
              <div class="col-xs-12">
                  <a class="item-block" href="user-login.php">
                      <header>
                          <div class="hgroup">
                              <h4>Senior front-end developer</h4>
                              <h5>Google</h5>
                          </div>
                          <div class="header-meta">
                              <span class="location">Menlo park, CA</span>
                              <span class="label label-success">Full-time</span>
                          </div>
                      </header>
                  </a>
              </div>
              <!-- END Job item -->
              <!-- Job item -->
              <div class="col-xs-12">
                  <a class="item-block" href="user-login.php">
                      <header>
                          <div class="hgroup">
                              <h4>Senior front-end developer</h4>
                              <h5>Google</h5>
                          </div>
                          <div class="header-meta">
                              <span class="location">Menlo park, CA</span>
                              <span class="label label-success">Full-time</span>
                          </div>
                      </header>
                  </a>
              </div>
              <!-- END Job item -->
          </div>

          <br><br>
          <p class="text-center"><a class="btn btn-info" href="user-login.php">Browse all jobs</a></p>
        </div>
      </section>
      <!-- END Recent jobs -->


      <!-- Facts -->
      <section class="bg-img bg-repeat no-overlay section-sm" style="background-image: url(assets/img/bg-pattern.png)">
        <div class="container">

          <div class="row">
            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="6890"></span>+</p>
              <h6>Jobs</h6>
            </div>

            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="1200"></span>+</p>
              <h6>Members</h6>
            </div>

            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="36800"></span>+</p>
              <h6>Resume</h6>
            </div>

            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="15400"></span>+</p>
              <h6>Company</h6>
            </div>
          </div>

        </div>
      </section>
      <!-- END Facts -->
      
      <!-- Newsletter -->
      <section class="bg-img text-center" style="background-image: url(assets/img/bg-facts.jpg)">
        <div class="container">
          <h2><strong>Subscribe</strong></h2>
          <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
          <br><br>
          <form class="form-subscribe" action="#">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Your eamil address">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
            </div>
          </form>
        </div>
      </section>
      <!-- END Newsletter -->


    </main>
    <!-- END Main container -->
    <?php include 'scriptphp/footer.php';?>
    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
    <!-- END Back to top button -->

    <!-- Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/thejobs.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
