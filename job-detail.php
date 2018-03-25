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

    <title>HireMe by Tom - Job detail</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav">

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

if(isset($_GET['id']))
{
    $req = $pdo->prepare('select * from job where id_job = ?');
    $req->execute([$_GET['id']]);
    if(($data = $req->fetch()) !== false)
    {
?>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container">
        <div class="header-detail">
            <div class="hgroup">
                <h1><?php echo $data['title']; ?></h1>
                <h3><a href="#"><?php echo $data['company']; ?></a></h3>
            </div>
            <hr>
            <p class="lead"><?php echo $data['description']; ?></p>

            <ul class="details cols-3">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span><?php echo $data['location']; ?></span>
                </li>

                <li>
                    <i class="fa fa-briefcase"></i>
                    <span><?php echo $data['position']; ?></span>
                </li>

                <li>
                    <i class="fa fa-money"></i>
                    <span>$<?php echo $data['salary']; ?> / year</span>
                </li>

                <li>
                    <i class="fa fa-clock-o"></i>
                    <span><?php echo $data['workinghours']; ?>h / week</span>
                </li>

                <li>
                    <i class="fa fa-flask"></i>
                    <span><?php echo $data['experience']; ?>+ years experience</span>
                </li>

                <li>
                    <i class="fa fa-certificate"></i>
                    <a href="#"><?php echo $data['level']; ?></a>
                </li>
            </ul>

            <div class="button-group">
                <div class="action-buttons">
                    <a class="btn btn-success" href="job-apply.php?id=<?php echo $data['id_job']; ?>">Apply now</a>
                </div>
            </div>

        </div>
    </div>
</header>
<?php
    }
}
?>
<!-- END Page header -->

<!-- Site footer -->
<?php include "scriptphp/footer.php" ?>
<!-- END Site footer -->


<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<!-- END Back to top button -->

<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
