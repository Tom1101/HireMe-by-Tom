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

    <title>HireMe by Tom - Resume detail</title>

    <!-- Styles -->
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <link href="../assets/css/thejobs.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.ico">
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
<header class="page-header bg-img" style="background-image: url(../assets/img/bg-banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <img src="../assets/img/avatar.jpg" alt="">
            </div>

            <div class="col-xs-12 col-sm-8 header-detail">
                <div class="hgroup">
                    <h1>John Doe</h1>
                    <h3>Front-end developer</h3>
                </div>
                <hr>
                <p class="lead">The front end is the part that users see and interact with, includes the User Interface,
                    the animations, and usually a bunch of logic to talk to the backend. It is the visual bit that the
                    user interacts with. This includes the design, images, colours, buttons, forms, typography,
                    animations and content. It’s basically everything that you as a user of the website can see.</p>

                <ul class="details cols-2">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <span>Mountain view, CA</span>
                    </li>

                    <li>
                        <i class="fa fa-globe"></i>
                        <a href="#">mywebsite.me</a>
                    </li>

                    <li>
                        <i class="fa fa-money"></i>
                        <span>$85 / hour</span>
                    </li>

                    <li>
                        <i class="fa fa-birthday-cake"></i>
                        <span>27 years-old</span>
                    </li>

                    <li>
                        <i class="fa fa-phone"></i>
                        <span>(+1) 123 456 7890</span>
                    </li>

                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="#">hi@mywebsite.me</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="button-group">
            <div class="action-buttons">
                <a class="btn btn-gray" href="#">Download CV</a>
                <a class="btn btn-success" data-toggle="modal" data-target="#modal-contact" href="#">Contact me</a>
            </div>
        </div>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Education -->
    <section>
        <div class="container">

            <header class="section-header">
                <span>Latest degrees</span>
                <h2>Education</h2>
            </header>

            <div class="row">
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <div class="hgroup">
                                <h4>Master
                                    <small>Computer Science</small>
                                </h4>
                                <h5>Massachusetts Institute of Technology</h5>
                            </div>
                            <h6 class="time">2012 - 2014</h6>
                        </header>
                        <div class="item-body">
                            <p>The Massachusetts Institute of Technology (MIT) is a private research university in
                                Cambridge, Massachusetts. Founded in 1861 in response to the increasing
                                industrialization of the United States, MIT adopted a European polytechnic university
                                model and stressed laboratory instruction in applied science and engineering.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END Education -->


    <!-- Work Experience -->
    <section class="bg-alt">
        <div class="container">
            <header class="section-header">
                <span>Past positions</span>
                <h2>Work Experience</h2>
            </header>

            <div class="row">

                <!-- Work item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <div class="hgroup">
                                <h4>Google</h4>
                                <h5>Senior front-end developer</h5>
                            </div>
                            <h6 class="time">Jan 2016 - Present</h6>
                        </header>
                        <div class="item-body">
                            <p>Responsibilities:</p>
                            <ul>
                                <li>Developed front-end for world-class online social viewing video and chat platform
                                    using xHTML, CSS, ActionScript 2-3, Javascript, and XML.
                                </li>
                                <li>Developed built-in chat application into Flash video player in ActionScript 3.</li>
                                <li>Built and developed sites for ABC Family properties such as Gilmore Girls, The
                                    Middleman, Secret Life of an American Teenager, Greek, and Kyle XY.
                                </li>
                                <li>Translate designs into responsive web interfaces</li>
                                <li>Collaboration with the graphic designer on the front-end aspect of development.</li>
                                <li>Cross-platform cross-browser development.</li>
                                <li>Some back-end development in collaboration with senior developer.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END Work item -->

            </div>

        </div>
    </section>
    <!-- END Work Experience -->


    <!-- Skills -->
    <section>
        <div class="container">
            <header class="section-header">
                <span>Expertise Areas</span>
                <h2>Skills</h2>
            </header>

            <br>
            <ul class="skills cols-3">
                <li>
                    <div>
                        <span class="skill-name">HTML</span>
                        <span class="skill-value">100%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">CSS</span>
                        <span class="skill-value">95%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 95%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">Javascript</span>
                        <span class="skill-value">80%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 80%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">Photoshop</span>
                        <span class="skill-value">60%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 60%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">ReactJS</span>
                        <span class="skill-value">70%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%;"></div>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="skill-name">Team work</span>
                        <span class="skill-value">90%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 90%;"></div>
                    </div>
                </li>
            </ul>

        </div>
    </section>
    <!-- END Skills -->


</main>
<!-- END Main container -->

<!-- Footer -->
<?php include '../footer.php' ?>


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
