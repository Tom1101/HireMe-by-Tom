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

    <title>HireMe by Tom - Manage company</title>

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
<header class="page-header bg-img size-lg" style="background-image: url(../assets/img/bg-banner1.jpg)">
    <div class="container no-shadow">
        <h1 class="text-center">Manage companies</h1>
        <p class="lead text-center">Here's the list of your registered companies. You can edit or delete them, or even add a new one.</p>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row item-blocks-condensed">

                <div class="col-xs-12 text-right">
                    <br>
                    <a class="btn btn-primary btn-sm" href="company-add.php">Add new company</a>
                </div>


                <!-- Company item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="company-detail.html"><img src="../assets/img/logo-google.jpg" alt=""></a>
                            <div class="hgroup">
                                <h4><a href="company-detail.html">Google</a></h4>
                                <h5>Internet and computer software <a href="company-detail.html#open-positions"><span class="label label-info">15 jobs</span></a></h5>
                            </div>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Edit</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </header>
                    </div>
                </div>
                <!-- END Company item -->


                <!-- Company item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="company-detail.html"><img src="../assets/img/logo-facebook.png" alt=""></a>
                            <div class="hgroup">
                                <h4><a href="company-detail.html">Facebook</a></h4>
                                <h5>Internet <a href="company-detail.html#open-positions"><span class="label label-info">6 jobs</span></a></h5>
                            </div>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Edit</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </header>
                    </div>
                </div>
                <!-- END Company item -->


                <!-- Company item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="company-detail.html"><img src="../assets/img/logo-envato.png" alt=""></a>
                            <div class="hgroup">
                                <h4><a href="company-detail.html">Envato</a></h4>
                                <h5>Internet, Web Design, Web Development <a href="company-detail.html#open-positions"><span class="label label-info">2 jobs</span></a></h5>
                            </div>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Edit</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </header>
                    </div>
                </div>
                <!-- END Company item -->


                <!-- Company item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="company-detail.html"><img src="../assets/img/logo-microsoft.jpg" alt=""></a>
                            <div class="hgroup">
                                <h4><a href="company-detail.html">Microsoft</a></h4>
                                <h5>Computer software and hardware <a href="company-detail.html#open-positions"><span class="label label-info">7 jobs</span></a></h5>
                            </div>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Edit</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </header>
                    </div>
                </div>
                <!-- END Company item -->


            </div>
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
