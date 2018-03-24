<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 24/03/2018
 * Time: 11:13
 */
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
    <meta name="description" content="Post a job position or create your online resume by HireMe!">
    <meta name="keywords" content="">

    <title>HireMe by Tom</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>
<body>

<!-- Navigation bar -->
<?php
include 'scriptphp/connectDB.php';

if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
};
?>
<!-- END Navigation bar -->

<!-- Page header -->
<header class="site-header text-center" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container page-name">
        <h1 class="text-center">Statistic</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better</p>
    </div>
</header>
<!-- END Page header -->

<!-- Completed Options Pie Widgets -->
<!-- Main container -->
<main>
    <!-- Recent jobs -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-lg-3 col-sm-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title">Recruiters</h5>
                            <p class="card-text">Number of existing recruiter</p>
                            <h4 class="card-title"><?php
                                $req = $pdo ->query('select count(id_user) as total from user_login where type="recruiter"');
                                $data = $req->fetch();
                                echo $data['total'];
                                ?></h4>
                            <br>
                            <a href="user-manage-rec.php" class="btn btn-primary">Check it out !</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-lg-3 col-sm-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Applicants</h5>
                            <p class="card-text">Number of existing applicant</p>
                            <h4 class="card-title"><?php
                                $req = $pdo ->query('select count(id_user) as total from user_login where type="applicant"');
                                $data = $req->fetch();
                                echo $data['total'];
                                ?></h4>
                            <br>
                            <a href="user-manage-app.php" class="btn btn-primary">Check it out !</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-lg-3 col-sm-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jobs</h5>
                            <p class="card-text">Number of  existing jobs</p>
                            <h4 class="card-title"><?php
                                $req = $pdo ->query('select count(id_job) as total from job');
                                $data = $req->fetch();
                                echo $data['total'];
                                ?></h4>
                            <br>
                            <a href="job-list-3.php" class="btn btn-primary">Check it out !</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-lg-3 col-sm-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Resumes</h5>
                            <p class="card-text">Number of existing resumes</p>
                            <h4 class="card-title"><?php
                                $req = $pdo ->query('select count(id_resume) as total from resume');
                                $data = $req->fetch();
                                echo $data['total'];
                                ?></h4>
                            <br>
                            <a href="resume-list.php" class="btn btn-primary">Check it out !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End Completed Options Pie Widgets -->
<!-- END Main container -->
<?php include 'scriptphp/footer.php'; ?>
<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<!-- END Back to top button -->

<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>