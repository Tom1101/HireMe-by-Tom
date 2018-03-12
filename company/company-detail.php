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

    <title>HireMe by Tom - Company detail</title>

    <!-- Styles -->
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <link href="../assets/css/thejobs.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

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
<header class="page-header bg-img size-lg" style="background-image: url(../assets/img/bg-banner2.jpg)">
    <div class="container">
        <div class="header-detail">
            <img class="logo" src="../assets/img/logo-google.jpg" alt="">
            <div class="hgroup">
                <h1>Google</h1>
                <h3>Internet and computer software</h3>
            </div>
            <hr>
            <p class="lead">Google Inc. is an American multinational technology company specializing in Internet-related services and products. These include online advertising technologies, search, cloud computing, and software. Most of its profits are derived from AdWords, an online advertising service that places advertising near the list of search results.</p>

            <ul class="details cols-3">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>Menlo Park, CA</span>
                </li>

                <li>
                    <i class="fa fa-globe"></i>
                    <a href="#">Google.com</a>
                </li>

                <li>
                    <i class="fa fa-users"></i>
                    <span>50,000 - 70,000 employer</span>
                </li>

                <li>
                    <i class="fa fa-birthday-cake"></i>
                    <span>From 1998</span>
                </li>

                <li>
                    <i class="fa fa-phone"></i>
                    <span>(+1) 123 456 7890</span>
                </li>

                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="#">info@google.com</a>
                </li>
            </ul>

            <div class="button-group">
                <div class="action-buttons">
                    <a class="btn btn-success" href="#">Contact</a>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Company detail -->
    <section>
        <div class="container">

            <header class="section-header">
                <span>About</span>
                <h2>Company detail</h2>
            </header>

            <p>Google was founded by Larry Page and Sergey Brin while they were Ph.D. students at Stanford University. Together they own about 14 percent of its shares but control 56 percent of the stockholder voting power through supervoting stock. They incorporated Google as a privately held company on September 4, 1998. An initial public offering followed on August 19, 2004. Its mission statement from the outset was "to organize the world's information and make it universally accessible and useful," and its unofficial slogan was "Don't be evil". In 2004, Google moved to its new headquarters in Mountain View, California, nicknamed the Googleplex. In August 2015, Google announced plans to reorganize its interests as a holding company called Alphabet Inc. When this restructuring took place on October 2, 2015, Google became Alphabet's leading subsidiary, as well as the parent for Google's Internet interests.</p>
            <p>Rapid growth since incorporation has triggered a chain of products, acquisitions and partnerships beyond Google's core search engine (Google Search). It offers online productivity software (Google Docs) including email (Gmail), a cloud storage service (Google Drive) and a social networking service (Google+). Desktop products include applications for web browsing (Google Chrome), organizing and editing photos (Google Photos), and instant messaging (Hangouts). The company leads the development of the Android mobile operating system and the browser-only Chrome OS for a class of netbooks known as Chromebooks. Google has moved increasingly into communications hardware: it partners with major electronics manufacturers in the production of its "high-quality low-cost" Nexus devices. In 2012, a fiber-optic infrastructure was installed in Kansas City to facilitate a Google Fiber broadband service.</p>

        </div>
    </section>
    <!-- END Company detail -->
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
