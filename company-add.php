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

    <title>HireMe by Tom - Add company</title>

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

<form action="#">

    <!-- Page header -->
    <header class="page-header">
        <div class="container page-name">
            <h1 class="text-center">Add your company</h1>
            <p class="lead text-center">Create a profile for your company and put it online.</p>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="row">

                        <div class="col-xs-12 col-sm-4 col-lg-2">
                            <div class="form-group">
                                <input type="file" class="dropify" data-default-file="assets/img/logo-default.png">
                                <span class="help-block">A square logo</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-lg-10">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Comapny name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Headline (e.g. Internet and computer software)">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Short description"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="row">

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control" placeholder="Location, e.g. Melon Park, CA">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control selectpicker">
                                    <option>0 - 9</option>
                                    <option selected>10 - 99</option>
                                    <option>100 - 999</option>
                                    <option>1,000 - 9,999</option>
                                    <option>10,000 - 99,999</option>
                                    <option>100,000 - 999,999</option>
                                </select>
                                <span class="input-group-addon">Employer</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input type="text" class="form-control" placeholder="Website address">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                <input type="text" class="form-control" placeholder="Founded on, e.g. 2013">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email address">
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>

        <!-- Company detail -->
        <section class=" bg-alt">
            <div class="container">

                <header class="section-header">
                    <span>About</span>
                    <h2>Company detail</h2>
                    <p>Write about your company, culture, benefits of working there, etc.</p>
                </header>

                <textarea class="summernote-editor"></textarea>

            </div>
        </section>
        <!-- END Company detail -->


        <!-- Submit -->
        <section>
            <div class="container">
                <header class="section-header">
                    <span>Are you done?</span>
                    <h2>Submit it</h2>
                    <p>Please review your information once more and press the below button to put your company online.</p>
                </header>

                <p class="text-center"><button class="btn btn-success btn-xl btn-round">Submit your company</button></p>

            </div>
        </section>
        <!-- END Submit -->

    </main>
    <!-- END Main container -->

</form>

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
