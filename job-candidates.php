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
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav bg-alt">


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
if(isset($_POST['id'])){
$req = $pdo->query('select * from job where id_job = '.$_POST['id'].'');
if(($data = $req->fetch()) !== false)
{
?>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container page-name">
        <h1 class="text-center">Job Candidates</h1>
        <p class="lead text-center">Use following search box to find best candidates for your openning position</p>
    </div>

    <div class="container">
        <h5>Applicants for</h5>
        <a class="item-block item-block-flat" href="job-detail.php?id=<?php echo $data['id_job']; ?>">
            <header>
                <img src="assets/img/logo-google.jpg" alt="">
                <div class="hgroup">
                    <h4><?php echo $data['title']; ?></h4>
                    <h5><?php echo $data['company']; ?></h5>
                </div>
                <div class="header-meta">
                    <span class="location"><?php echo $data['location']; ?></span>
                    <span class="label label-success"><?php echo $data['position']; ?></span>
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

                <?php }
                $req = $pdo->query('select * from resume where id_job = '.$_POST['id'].'');
                foreach ($req as $data)
                {
                ?>
                <!-- Candidate item -->
                <div class="col-xs-12">
                    <div class="item-block">
                        <header>
                            <div class="hgroup">
                                <h4>
                                    <a href="resume-detail.php?id=<?php echo $data['id_resume']; ?>"><?php echo $data['name']; ?></a>
                                </h4>
                                <h5><?php echo $data['headline']; ?></h5>
                            </div>
                            <div class="header-meta">
                                <span class="location"><?php echo $data['location']; ?></span>
                                <span class="rate">$<?php echo $data['salary']; ?> per hour</span>
                            </div>
                        </header>

                        <footer>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a>
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                            </div>
                        </footer>
                    </div>
                </div>
                <!-- END Candidate item -->
                <?php }} ?>
            </div>
        </div>
    </section>
</main>
<!-- END Main container -->


<!-- Site footer -->
<?php include 'scriptphp/footer.php' ?>
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
                <h5 class="modal-title" id="myModalLabel">Send message by mail</h5>
            </div>
            <div class="modal-body">
                <?php     $req = $pdo->prepare('select * from resume where id_job = ?');
                $req->execute([$_POST['id']]);
                if (($data = $req->fetch()) !== false) {?>
                    <center><h6><?php echo $data['email']; ?></h6></center>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
