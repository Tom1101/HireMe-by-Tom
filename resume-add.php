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

    <title>HireMe by Tom - Add Resume</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/vendors/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav">

<!-- Navigation bar -->
<?php

include 'connectDB.php';

if (isset($_POST['submit_button'])) {
    if (!empty($_POST['title']) && !empty($_POST['company']) && !empty($_POST['description']) && !empty($_POST['url']) && !empty($_POST['location']) && !empty($_POST['hours']) && !empty($_POST['experience']) && !empty($_POST['position']) && !empty($_POST['salary']) && !empty($_POST['level'])) {
        if (is_numeric($_POST['hours']) && is_numeric($_POST['experience']) && is_numeric($_POST['salary'])) {
            $req_re = $pdo->prepare('insert into resume (name, headline, description, location, salary, phone, age, email, website) VALUES (?,?,?,?,?,?,?,?,?)');
            if ($req->execute([$_POST['title'], $_POST['company'], $_POST['description'], $_POST['url'], $_POST['location'], $_POST['hours'], $_POST['experience'], $_POST['position'], $_POST['salary'], $_POST['level']])) {
                $req_idres = $pdo->query('select count(id_resume) as totalid from resume');
                $totalid = $req_idres->fetch();
                $req_ed = $pdo->prepare('insert into education (degree, major, schoolname, datefrom, dateto, id_resume) VALUES (?,?,?,?,?,?)');
                $req_ex = $pdo->prepare('insert into experience (companyname, position, datefrom, dateto, id_resume) VALUES (?,?,?,?,?)');
                if ($req->execute([$_POST['title'], $_POST['company'], $_POST['description'], $_POST['url'], $_POST['location'], $_POST['hours'], $_POST['experience'], $_POST['position'], $_POST['salary'], $_POST['level']])) {
                    if ($req->execute([$_POST['title'], $_POST['company'], $_POST['description'], $_POST['url'], $_POST['location'], $_POST['hours'], $_POST['experience'], $_POST['position'], $_POST['salary'], $_POST['level']])) {
                        echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Well done ! Add Job Success ! </strong></div>";
                    }

                }

            } else {
                echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please enter valid values.</div>";
            }
        } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please verify if Salary, Hours, Years is valid values (Interger).</div>";
        }
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please enter valid values.</div>";
    }
};

if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
}
?>
<!-- END Navigation bar -->

<form method="POST" action="resume-add.php">

    <!-- Page header -->
    <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
        <div class="container page-name">
            <h1 class="text-center">Add your resume</h1>
            <p class="lead text-center">Create your resume and put it online.</p>
        </div>

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <input name="name" type="text" class="form-control input-lg" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <input name="headline" type="text" class="form-control"
                               placeholder="Headline (e.g. Front-end developer)">
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="3"
                                  placeholder="Short description about you"></textarea>
                    </div>

                    <hr class="hr-lg">

                    <h6>Basic information</h6>
                    <div class="row">

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="location" type="text" class="form-control"
                                       placeholder="Location, e.g. Melon Park, CA">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input name="website" type="text" class="form-control" placeholder="Website address">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input name="salary" type="text" class="form-control" placeholder="Salary, e.g. 85">
                                <span class="input-group-addon">Per hour</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                <input name="age" type="text" class="form-control" placeholder="Age">
                                <span class="input-group-addon">Years old</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input name="phone" type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="email" type="text" class="form-control" placeholder="Email address">
                            </div>
                        </div>

                    </div>

                    <hr class="hr-lg">
                    <h6>Education</h6>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <input name="ed_degree" type="text" class="form-control"
                                       placeholder="Degree, e.g. Bachelor">
                            </div>

                            <div class="form-group">
                                <input name="ed_major" type="text" class="form-control"
                                       placeholder="Major, e.g. Computer Science">
                            </div>
                            <div class="form-group">
                                <input name="ed_schoolname" type="text" class="form-control"
                                       placeholder="School name, e.g. Massachusetts Institute of Technology">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Date from</span>
                                    <input name="date_from" type="text" class="form-control" placeholder="e.g. 2012">
                                    <span class="input-group-addon">Date to</span>
                                    <input name="ed_dateto" type="text" class="form-control" placeholder="e.g. 2016">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-lg">
                    <h6>Experiences</h6>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <input name="ex_companyname" type="text" class="form-control"
                                       placeholder="Company name">
                            </div>

                            <div class="form-group">
                                <input name="ex_position" type="text" class="form-control"
                                       placeholder="Position, e.g. UI/UX Researcher">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Date from</span>
                                    <input name="ex_datefrom" type="text" class="form-control" placeholder="e.g. 2012">
                                    <span class="input-group-addon">Date to</span>
                                    <input name="ex_dateto" type="text" class="form-control" placeholder="e.g. 2016">
                                </div>
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
        <!-- Submit -->
        <section class=" bg-img" style="background-image: url(assets/img/bg-facts.jpg);">
            <div class="container">
                <header class="section-header">
                    <span>Are you done?</span>
                    <h2>Submit resume</h2>
                    <p>Please review your information once more and press the below button to put your resume
                        online.</p>
                </header>

                <p class="text-center">
                    <button name="submit_button" type="submit" class="btn btn-success btn-xl btn-round">Submit your
                        resume
                    </button>
                </p>

            </div>
        </section>
        <!-- END Submit -->
    </main>
    <!-- END Main container -->

</form>

<?php include 'footer.php'; ?>


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
