<?php
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['username'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <title>HireMe by Tom - List Resume</title>

    <!-- Styles -->
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <link href="../assets/css/thejobs.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav bg-alt">

<!-- Navigation bar -->
<?php
if ($_SESSION['type'] == 'admin') {
    include 'navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'navbar_applicant.php';
} else {
    include 'navbar_recruiter.php';
}
?>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img" style="background-image: url(../assets/img/bg-banner1.jpg);">
    <div class="container page-name">
        <h1 class="text-center">Browse resumes</h1>
        <p class="lead text-center">Use following search box to find resumes that fits your position better</p>
    </div>

    <div class="container">
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-12">
                    <input type="text" class="form-control" placeholder="Keyword: name, skills, or tags">
                </div>
            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>

        </form>

    </div>

</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">
                <!-- Resume detail -->
                <div class="col-xs-12">
                    <a class="item-block" href="resume-detail.html">
                        <header>
                            <img class="resume-avatar" src="../assets/img/avatar.jpg" alt="">
                            <div class="hgroup">
                                <h4>John Doe</h4>
                                <h5>Front-end developer</h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p>20+ years of experience working on front-end development for major companies. I develop
                                well-designed, accessible, and standards-based web sites and applications. Highly
                                effective communicator and team leader with a proven track record of delivering quality
                                work on time and within budget working as a remote employee. Experience and success in
                                both agency and major corporate environments.</p>

                            <div class="tag-list">
                                <span>HTML5</span>
                                <span>CSS3</span>
                                <span>Bootstrap</span>
                                <span>Wordpress</span>
                            </div>
                        </div>

                        <footer>
                            <ul class="details cols-3">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Menlo Park, CA</span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>$55 / hour</span>
                                </li>

                                <li>
                                    <i class="fa fa-certificate"></i>
                                    <span>Master of Computer Science</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <!-- END Resume detail -->
            </div>

            <div class="row">
                <!-- Resume detail -->
                <div class="col-sm-12 col-md-6">
                    <a class="item-block" href="resume-detail.html">
                        <header>
                            <img class="resume-avatar" src="../assets/img/avatar-1.jpg" alt="">
                            <div class="hgroup">
                                <h4>Bikesh Soltanian</h4>
                                <h5>Java developer</h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p>I develop well-designed, accessible, and standards-based web sites and applications.
                                Highly effective communicator and team leader with a proven track record of delivering
                                quality work on time and within budget working as a remote employee.</p>

                            <div class="tag-list">
                                <span>J2EE</span>
                                <span>J2SE</span>
                                <span>Android</span>
                            </div>
                        </div>

                        <footer>
                            <ul class="details cols-2">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Fairfield, IA</span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>$60 / hour</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <!-- END Resume detail -->


                <!-- Resume detail -->
                <div class="col-sm-12 col-md-6">
                    <a class="item-block" href="resume-detail.html">
                        <header>
                            <img class="resume-avatar" src="../assets/img/avatar-2.jpg" alt="">
                            <div class="hgroup">
                                <h4>Chris Hernandeziyan</h4>
                                <h5>.Net developer</h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p>I develop well-designed, accessible, and standards-based web sites and applications.
                                Highly effective communicator and team leader with a proven track record of delivering
                                quality work on time and within budget working as a remote employee.</p>

                            <div class="tag-list">
                                <span>VB.Net</span>
                                <span>C#</span>
                                <span>WPF</span>
                                <span>ASP.Net</span>
                                <span>MVC.Net</span>
                            </div>
                        </div>

                        <footer>
                            <ul class="details cols-2">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Seattle, WA</span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>$50 / hour</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <!-- END Resume detail -->
            </div>

            <div class="row">
                <!-- Resume detail -->
                <div class="col-sm-12 col-md-6">
                    <a class="item-block" href="resume-detail.html">
                        <header>
                            <img class="resume-avatar" src="../assets/img/avatar-3.jpg" alt="">
                            <div class="hgroup">
                                <h4>Mary Amiri</h4>
                                <h5>Quality assurance</h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p>I develop well-designed, accessible, and standards-based web sites and applications.
                                Highly effective communicator and team leader with a proven track record of delivering
                                quality work on time and within budget working as a remote employee.</p>

                            <div class="tag-list">
                                <span>Testcase</span>
                                <span>Unit test</span>
                                <span>jUnit</span>
                                <span>Git</span>
                            </div>
                        </div>

                        <footer>
                            <ul class="details cols-2">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Fremont, CA</span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>$70 / hour</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <!-- END Resume detail -->


                <!-- Resume detail -->
                <div class="col-sm-12 col-md-6">
                    <a class="item-block" href="resume-detail.html">
                        <header>
                            <img class="resume-avatar" src="../assets/img/avatar-4.jpg" alt="">
                            <div class="hgroup">
                                <h4>Sarah Luizgarden</h4>
                                <h5>UI/UX developer</h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p>I develop well-designed, accessible, and standards-based web sites and applications.
                                Highly effective communicator and team leader with a proven track record of delivering
                                quality work on time and within budget working as a remote employee.</p>

                            <div class="tag-list">
                                <span>HTML5</span>
                                <span>CSS3</span>
                                <span>Bootstrap</span>
                                <span>Photoshop</span>
                            </div>
                        </div>

                        <footer>
                            <ul class="details cols-2">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Columbus, OH</span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>$45 / hour</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <!-- END Resume detail -->
            </div>


            <!-- Page navigation -->
            <nav class="text-center">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <i class="ti-angle-left"></i>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <i class="ti-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END Page navigation -->


        </div>
    </section>
</main>
<!-- END Main container -->


<!-- Site footer -->
<?php include '../footer.php' ?>
<!-- END Site footer -->


<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<!-- END Back to top button -->

<!-- Scripts -->
<script src="../assets/js/app.min.js"></script>
<script src="../assets/js/thejobs.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>
