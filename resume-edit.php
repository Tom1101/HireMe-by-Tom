<?php
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['username'])) {
    header('location:index.php');
}
elseif(isset($_POST['edited'])){
    ?>
    <meta http-equiv="refresh" content="1;url=resume-manage.php" />
    <?php
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
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav">

<!-- Navigation bar -->
<?php

include 'scriptphp/connectDB.php';
include 'scriptphp/script-edit-resume.php';

if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
};

if (isset($_POST['id'])) {
    $req = $pdo->prepare('select * from resume where id_resume = ?');
    $req->execute([$_POST['id']]);
    if (($data = $req->fetch()) !== false) {
?>
<!-- END Navigation bar -->

<form method="POST" action="resume-edit.php?id=<?php echo $data['id_resume']; ?>">

    <!-- Page header -->
    <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
        <div class="container page-name">
            <h1 class="text-center">Edit your resume</h1>
            <p class="lead text-center">Edit your resume and put it online.</p>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <input name="edited" type="hidden">
                    <div class="form-group">
                        <input name="name" type="text" class="form-control input-lg" value="<?php echo $data['name']; ?>">
                    </div>

                    <div class="form-group">
                        <input name="headline" type="text" class="form-control"
                               value="<?php echo $data['headline']; ?>">
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="3"><?php echo $data['description']; ?></textarea>
                    </div>

                    <hr class="hr-lg">

                    <h6>Basic information</h6>
                    <div class="row">

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="location" type="text" class="form-control"
                                       value="<?php echo $data['location']; ?>">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input name="website" type="text" class="form-control" value="<?php echo $data['website']; ?>">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input name="salary" type="text" class="form-control" value="<?php echo $data['salary']; ?>">
                                <span class="input-group-addon">Per hour</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                <input name="age" type="text" class="form-control" value="<?php echo $data['age']; ?>">
                                <span class="input-group-addon">Years old</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input name="phone" type="text" class="form-control" value="<?php echo $data['phone']; ?>">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="email" type="text" class="form-control" value="<?php echo $data['email']; ?>">
                            </div>
                        </div>

                    </div>
                    <?php }
                    $req = $pdo->prepare('select * from education where id_resume = ?');
                    $req->execute([$_POST['id']]);
                    if (($data = $req->fetch()) !== false) {
                    ?>
                    <hr class="hr-lg">
                    <h6>Education</h6>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <input name="ed_degree" type="text" class="form-control"
                                       value="<?php echo $data['degree']; ?>">
                            </div>

                            <div class="form-group">
                                <input name="ed_major" type="text" class="form-control"
                                       value="<?php echo $data['major']; ?>">
                            </div>
                            <div class="form-group">
                                <input name="ed_schoolname" type="text" class="form-control"
                                       value="<?php echo $data['schoolname']; ?>">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Date from</span>
                                    <input name="ed_datefrom" type="text" class="form-control" value="<?php echo $data['datefrom']; ?>">
                                    <span class="input-group-addon">Date to</span>
                                    <input name="ed_dateto" type="text" class="form-control" value="<?php echo $data['dateto']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    $req = $pdo->prepare('select * from experience where id_resume = ?');
                    $req->execute([$_POST['id']]);
                    if (($data = $req->fetch()) !== false) {
                    ?>
                    <hr class="hr-lg">
                    <h6>Experiences</h6>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <input name="ex_companyname" type="text" class="form-control"
                                       value="<?php echo $data['companyname']; ?>">
                            </div>

                            <div class="form-group">
                                <input name="ex_position" type="text" class="form-control"
                                       value="<?php echo $data['position']; ?>">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Date from</span>
                                    <input name="ex_datefrom" type="text" class="form-control" value="<?php echo $data['datefrom']; ?>">
                                    <span class="input-group-addon">Date to</span>
                                    <input name="ex_dateto" type="text" class="form-control" value="<?php echo $data['dateto']; ?>">
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
                    <h2>Submit edit resume</h2>
                    <p>Please review your information once more and press the below button to edit your resume.</p>
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

<?php }}include 'scriptphp/footer.php'; ?>


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
