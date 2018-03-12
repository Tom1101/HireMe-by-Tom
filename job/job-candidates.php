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

    <title>HireMe by Tom - Job candidates</title>

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
    <div class="container page-name">
        <h1 class="text-center">Job Candidates</h1>
        <p class="lead text-center">Use following search box to find best candidates for your openning position</p>
    </div>

    <div class="container">
        <h5>Applicants for</h5>
        <a class="item-block item-block-flat" href="job-detail.html">
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

        <hr>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">


                <!-- Candidate item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.html"><img class="resume-avatar" src="../assets/img/avatar-1.jpg" alt=""></a>
                            <div class="hgroup">
                                <h4>
                                    <a href="resume-detail.html">John Doe</a>
                                    <select class="form-control selectpicker label-style">
                                        <option data-content="<span class='label label-default'>New</span>" selected>New</option>
                                        <option data-content="<span class='label label-warning'>Contacted</span>">Contacted</option>
                                        <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed</option>
                                        <option data-content="<span class='label label-success'>Hired</span>">Hired</option>
                                        <option data-content="<span class='label label-danger'>Archived</span>">Archived</option>
                                    </select>
                                </h4>
                                <h5>Front-end developer</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Menlo park, CA</span>
                                <span class="rate">$55 per hour</span>
                            </div>
                        </header>

                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>

                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Download CV</a>
                                <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </footer>
                    </div>
                </div>
                <!-- END Candidate item -->


                <!-- Candidate item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.html"><img class="resume-avatar" src="../assets/img/avatar-2.jpg" alt=""></a>
                            <div class="hgroup">
                                <h4>
                                    <a href="resume-detail.html">Bikesh Soltanian</a>
                                    <select class="form-control selectpicker label-style">
                                        <option data-content="<span class='label label-default'>New</span>">New</option>
                                        <option data-content="<span class='label label-warning'>Contacted</span>" selected>Contacted</option>
                                        <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed</option>
                                        <option data-content="<span class='label label-success'>Hired</span>">Hired</option>
                                        <option data-content="<span class='label label-danger'>Archived</span>">Archived</option>
                                    </select>
                                </h4>
                                <h5>Java developer</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Fairfield, IA</span>
                                <span class="rate">$60 per hour</span>
                            </div>
                        </header>

                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>

                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Download CV</a>
                                <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </footer>
                    </div>
                </div>
                <!-- END Candidate item -->


                <!-- Candidate item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.html"><img class="resume-avatar" src="../assets/img/avatar-4.jpg" alt=""></a>
                            <div class="hgroup">
                                <h4>
                                    <a href="resume-detail.html">Chris Hernandeziyan</a>
                                    <select class="form-control selectpicker label-style">
                                        <option data-content="<span class='label label-default'>New</span>">New</option>
                                        <option data-content="<span class='label label-warning'>Contacted</span>">Contacted</option>
                                        <option data-content="<span class='label label-info'>Interviewed</span>" selected>Interviewed</option>
                                        <option data-content="<span class='label label-success'>Hired</span>">Hired</option>
                                        <option data-content="<span class='label label-danger'>Archived</span>">Archived</option>
                                    </select>
                                </h4>
                                <h5>Front-end developer</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Seattle, WA</span>
                                <span class="rate">$50 per hour</span>
                            </div>
                        </header>

                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>

                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Download CV</a>
                                <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </footer>
                    </div>
                </div>
                <!-- END Candidate item -->


                <!-- Candidate item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="resume-detail.html"><img class="resume-avatar" src="../assets/img/avatar-3.jpg" alt=""></a>
                            <div class="hgroup">
                                <h4>
                                    <a href="resume-detail.html">Maryam Amiri</a>
                                    <select class="form-control selectpicker label-style">
                                        <option data-content="<span class='label label-default'>New</span>">New</option>
                                        <option data-content="<span class='label label-warning'>Contacted</span>">Contacted</option>
                                        <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed</option>
                                        <option data-content="<span class='label label-success'>Hired</span>" selected>Hired</option>
                                        <option data-content="<span class='label label-danger'>Archived</span>">Archived</option>
                                    </select>
                                </h4>
                                <h5>Javascript developer</h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">Fremont, CA</span>
                                <span class="rate">$70 per hour</span>
                            </div>
                        </header>

                        <footer>
                            <div class="status"><strong>Applied on:</strong> July 16, 2016</div>

                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="#">Download CV</a>
                                <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </footer>
                    </div>
                </div>
                <!-- END Candidate item -->


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


<!-- Contact modal -->
<div class="modal fade" id="modal-contact" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="myModalLabel">Send message</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="subject" class="control-label">Subject</label>
                        <input type="text" class="form-control" id="subject">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Message</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../assets/js/app.min.js"></script>
<script src="../assets/js/thejobs.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>
