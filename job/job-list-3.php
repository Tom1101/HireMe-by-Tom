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

    <title>HireMe by Tom - Job list</title>

    <!-- Styles -->
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <link href="../assets/css/thejobs.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

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
        <h1 class="text-center">Browse jobs</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better</p>
    </div>

    <div class="container">
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-12">
                    <input type="text" class="form-control" placeholder="Keyword: job title, skills, or company">
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
            <div class="row item-blocks-connected">

                <div class="col-xs-12">
                    <br>
                    <h5>We found <strong>357</strong> matches, you're watching <i>10</i> to <i>20</i></h5>
                    <br>
                </div>

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-google.jpg" alt="">
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
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-linkedin.png" alt="">
                            <div class="hgroup">
                                <h4>Software Engineer (Entry or Senior)</h4>
                                <h5>Linkedin</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Livermore, CA</span>
                                <span class="label label-warning">Part-time</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-envato.png" alt="">
                            <div class="hgroup">
                                <h4>Full Stack Web Developer</h4>
                                <h5>Envato</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">San Francisco, CA</span>
                                <span class="label label-info">Freelance</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-facebook.png" alt="">
                            <div class="hgroup">
                                <h4>Web Applications Developer</h4>
                                <h5>Facebook</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Lexington, MA</span>
                                <span class="label label-danger">Internship</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-microsoft.jpg" alt="">
                            <div class="hgroup">
                                <h4>Sr. SQL Server Developer</h4>
                                <h5>Microsoft</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Palo Alto, CA</span>
                                <span class="label label-success">Remote</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->


                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-google.jpg" alt="">
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
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-linkedin.png" alt="">
                            <div class="hgroup">
                                <h4>Software Engineer (Entry or Senior)</h4>
                                <h5>Linkedin</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Livermore, CA</span>
                                <span class="label label-warning">Part-time</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-envato.png" alt="">
                            <div class="hgroup">
                                <h4>Full Stack Web Developer</h4>
                                <h5>Envato</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">San Francisco, CA</span>
                                <span class="label label-info">Freelance</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-facebook.png" alt="">
                            <div class="hgroup">
                                <h4>Web Applications Developer</h4>
                                <h5>Facebook</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Lexington, MA</span>
                                <span class="label label-danger">Internship</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

                <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="job-detail.html">
                        <header>
                            <img src="../assets/img/logo-microsoft.jpg" alt="">
                            <div class="hgroup">
                                <h4>Sr. SQL Server Developer</h4>
                                <h5>Microsoft</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Palo Alto, CA</span>
                                <span class="label label-success">Remote</span>
                            </div>
                        </header>
                    </a>
                </div>
                <!-- END Job item -->

            </div>


            <!-- Page navigation -->
            <nav class="text-center">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <i class="ti-angle-left"></i>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
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
