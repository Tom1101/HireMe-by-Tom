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

    <title>HireMe by Tom - Apply for a job</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/vendors/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav">

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
<header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container no-shadow">
        <h1 class="text-center">Apply for the job</h1>
        <p class="lead text-center">Apply with your online resume, create new resume for the job, or make a custom application.</p>

        <hr>

        <!-- Job detail -->
        <a class="item-block item-block-flat" href="job-detail.html">
            <header>
                <img src="assets/img/logo-google.jpg" alt="">
                <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5>
                </div>
                <div class="header-meta">
                    <span class="location">Menlo park, CA</span>
                    <time datetime="2016-03-10 20:00">34 min ago</time>
                </div>
            </header>
        </a>
        <!-- END Job detail -->

        <div class="button-group">
            <div class="action-buttons">
                <a class="btn btn-gray" href="#sec-custom">Custom application</a>
                <a class="btn btn-primary" href="#sec-resume">Apply with a resume</a>
            </div>
        </div>

    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Apply with resume -->
    <section id="sec-resume">
        <div class="container">

            <header class="section-header">
                <span>Apply with a resume</span>
                <h2>Select a resume</h2>
                <p>Applied for this job with one of your online available resumes</p>
            </header>


            <!-- Resume item -->
            <div class="item-block">
                <header>
                    <a href="resume-detail.html"><img class="resume-avatar" src="assets/img/avatar.jpg" alt=""></a>
                    <div class="hgroup">
                        <h4><a href="resume-detail.html">John Doe</a></h4>
                        <h5>Front-end developer</h5>
                    </div>
                    <div class="header-meta">
                        <span class="location">Menlo park, CA</span>
                        <span class="rate">$55 per hour</span>
                    </div>
                </header>

                <footer>
                    <p class="status"><strong>Updated on:</strong> March 10, 2016</p>

                    <div class="action-btn">
                        <a class="btn btn-xs btn-gray" href="#">Edit</a>
                        <a class="btn btn-xs btn-success" href="#">Select</a>
                    </div>
                </footer>
            </div>
            <!-- END Resume item -->


            <!-- Resume item -->
            <div class="item-block">
                <header>
                    <a href="resume-detail.html"><img class="resume-avatar" src="assets/img/avatar.jpg" alt=""></a>
                    <div class="hgroup">
                        <h4><a href="resume-detail.html">John Doe</a></h4>
                        <h5>Full stack developer</h5>
                    </div>
                    <div class="header-meta">
                        <span class="location">Menlo park, CA</span>
                        <span class="rate">$85 per hour</span>
                    </div>
                </header>

                <footer>
                    <p class="status"><strong>Updated on:</strong> March 03, 2016</p>

                    <div class="action-btn">
                        <a class="btn btn-xs btn-gray" href="#">Edit</a>
                        <a class="btn btn-xs btn-success" href="#">Select</a>
                    </div>
                </footer>
            </div>
            <!-- END Resume item -->


            <!-- Resume item -->
            <div class="item-block">
                <header>
                    <a href="resume-detail.html"><img class="resume-avatar" src="assets/img/avatar.jpg" alt=""></a>
                    <div class="hgroup">
                        <h4><a href="resume-detail.html">John Doe</a></h4>
                        <h5>PHP developer <span class="label label-info">Hidden</span></h5>
                    </div>
                    <div class="header-meta">
                        <span class="location">Menlo park, CA</span>
                        <span class="rate">$60 per hour</span>
                    </div>
                </header>

                <footer>
                    <p class="status"><strong>Updated on:</strong> Feb 27, 2016</p>

                    <div class="action-btn">
                        <a class="btn btn-xs btn-gray" href="#">Edit</a>
                        <a class="btn btn-xs btn-success" href="#">Select</a>
                    </div>
                </footer>
            </div>
            <!-- END Resume item -->

            <br>

            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <a class="btn btn-block btn-primary" href="resume-add.html">Add new resume</a>
                </div>
            </div>

        </div>
    </section>
    <!-- END Apply with resume -->


    <!-- Custom application -->
    <section id="sec-custom" class="bg-alt">
        <div class="container">
            <header class="section-header">
                <span>Custom application</span>
                <h2>Apply now</h2>
                <p>Apply for this job with a custom application.</p>
            </header>

            <form>
                <div class="row">
                    <div class="form-group col-xs-12 col-md-6">
                        <input type="text" class="form-control input-lg" placeholder="Name">
                    </div>

                    <div class="form-group col-xs-12 col-md-6">
                        <input type="email" class="form-control input-lg" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                </div>

                <div class="form-group">

                </div>

                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="upload-button upload-button-block">
                            <button class="btn btn-block btn-success">Attach your CV</button>
                            <input name="cv" type="file">
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <button type="submit" class="btn btn-block btn-primary">Submit application</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <!-- END Custom application -->


</main>
<!-- END Main container -->


<!-- Site footer -->
<?php include '../footer.php' ?>
<!-- END Site footer -->


<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<!-- END Back to top button -->

<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/vendors/summernote/summernote.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
