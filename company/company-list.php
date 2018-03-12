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

    <title>HireMe by Tom - Company list</title>

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
        <h1 class="text-center">Browse companies</h1>
        <p class="lead text-center">Use following search box to find companies that fits you better</p>
    </div>

    <div class="container">
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-12">
                    <input type="text" class="form-control" placeholder="Keyword">
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

                <!-- Company detail -->
                <div class="col-xs-12">
                    <a class="item-block" href="company-detail.html">
                        <header>
                            <img src="../assets/img/logo-google.jpg" alt="">
                            <div class="hgroup">
                                <h4>Google</h4>
                                <h5>Internet and computer software</h5>
                            </div>
                        </header>

                        <div class="item-body">
                            <p>Google Inc. is an American multinational technology company specializing in Internet-related services and products. These include online advertising technologies, search, cloud computing, and software. Most of its profits are derived from AdWords, an online advertising service that places advertising near the list of search results.</p>
                        </div>
                    </a>
                </div>
                <!-- END Company detail -->
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
                        <li>
                            <a href="#" aria-label="Next">
                                <i class="ti-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- END Page navigation -->

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
