<?php
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['username'])) {
    header('location:index.php');
} elseif(isset($_POST['edited'])){
    ?>
    <meta http-equiv="refresh" content="1;url=job-manage.php" />
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

    <title>HireMe by Tom - Edit job</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/vendors/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav">

<!-- Navigation bar -->
<?php
include 'scriptphp/connectDB.php';

if (isset($_POST['submit_button'])) {
    if (!empty($_POST['title']) && !empty($_POST['company']) && !empty($_POST['description']) && !empty($_POST['url']) && !empty($_POST['location']) && !empty($_POST['hours']) && !empty($_POST['experience']) && !empty($_POST['position']) && !empty($_POST['salary']) && !empty($_POST['level'])) {
        if (is_numeric($_POST['hours']) && is_numeric($_POST['experience']) && is_numeric($_POST['salary'])) {
            $req = $pdo->prepare('UPDATE job SET title=?, company = ?, description = ?, url = ?, location = ?, workinghours = ?, experience = ?, position = ?, salary = ?, level = ? WHERE id_job = ?');
            if ($req->execute([$_POST['title'], $_POST['company'], $_POST['description'], $_POST['url'], $_POST['location'], $_POST['hours'], $_POST['experience'], $_POST['position'], $_POST['salary'], $_POST['level'],$_GET['id']])) {
                echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Well done ! Edit Job Success ! </strong></div>";
            } else {
                echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please enter valid values...</div>";
            }
        } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please verify if Salary, Hours, Years is valid values (Interger).</div>";
        }
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please check the values.</div>";
    }
};

if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} elseif ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
};

if (isset($_GET['id'])) {
    $req = $pdo->prepare('select * from job where id_job = ?');
    $req->execute([$_GET['id']]);
    if (($data = $req->fetch()) !== false) {
        ?>

        <!-- END Navigation bar -->

        <!-- Page header -->
        <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
            <div class="container page-name">
                <h1 class="text-center">Add a new job</h1>
                <p class="lead text-center">Create a new vacancy for your company and put it online.</p>
            </div>

            <form method="POST" action="job-edit.php?id=<?php echo $data['id_job']; ?>">
                <div class="container">
                    <div class="row">
                        <?php echo $message;?>
                        <input name="edited" type="hidden">
                        <div class="form-group col-xs-12 col-sm-6">
                            <input name="title" type="text" class="form-control input-lg"
                                   value="<?php echo $data['title']; ?>">
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <input name="company" type="text" class="form-control input-lg"
                                   value="<?php echo $data['company']; ?>">
                        </div>

                        <div class="form-group col-xs-12">
                            <textarea name="description" class="form-control" rows="3"
                                      ><?php echo $data['description']; ?></textarea>
                        </div>

                        <div class="form-group col-xs-12">
                            <input name="url" type="text" class="form-control" value="<?php echo $data['url']; ?>">
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="location" type="text" class="form-control"
                                       value="<?php echo $data['location']; ?>">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <select name="position" class="form-control selectpicker">
                                    <option>Full time</option>
                                    <option>Part time</option>
                                    <option>Internship</option>
                                    <option>Freelance</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input name="salary" type="text" class="form-control" value="<?php echo $data['salary']; ?>">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <input name="hours" type="text" class="form-control"
                                       value="<?php echo $data['workinghours']; ?>">
                                <span class="input-group-addon">hours / week</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                                <input name="experience" type="text" class="form-control"
                                       value="<?php echo $data['experience']; ?>">
                                <span class="input-group-addon">Years</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                                <select name="level" class="form-control selectpicker">
                                    <option>Postdoc</option>
                                    <option>Ph.D.</option>
                                    <option>Master</option>
                                    <option selected>Bachelor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="bg-alt">
                    <div class="container">
                        <header class="section-header">
                            <span>Are you done?</span>
                            <h2>Submit Edit Job</h2>
                            <p>Please review your information once more and press the below button to put your job
                                online.</p>
                        </header>
                        <p class="text-center">
                            <button name="submit_button" type="submit" class="btn btn-success btn-xl btn-round">Submit
                                the edit job
                            </button>
                        </p>
                    </div>
                </section>
            </form>
        </header>
        <!-- END Page header -->
        <?php
    }
}
?>
<!-- Site footer -->
<?php include 'scriptphp/footer.php' ?>
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
