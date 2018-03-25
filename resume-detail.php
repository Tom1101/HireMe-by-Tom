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

if (isset($_GET['id'])) {
    $req = $pdo->prepare('select * from resume where id_resume = ?');
    $req->execute([$_GET['id']]);
    if (($data = $req->fetch()) !== false) {
        ?>
        <!-- END Navigation bar -->


        <!-- Page header -->
        <header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg)">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 header-detail">
                        <div class="hgroup">
                            <h1><?php echo $data['name']; ?></h1>
                            <h3><?php echo $data['headline']; ?></h3>
                        </div>
                        <hr>
                        <p class="lead"><?php echo $data['description']; ?></p>

                        <ul class="details cols-2">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo $data['location']; ?></span>
                            </li>

                            <li>
                                <i class="fa fa-globe"></i>
                                <a href="<?php echo $data['name']; ?>"><?php echo $data['website']; ?></a>
                            </li>

                            <li>
                                <i class="fa fa-money"></i>
                                <span>$<?php echo $data['salary']; ?> / hour</span>
                            </li>

                            <li>
                                <i class="fa fa-birthday-cake"></i>
                                <span><?php echo $data['age']; ?> years-old</span>
                            </li>

                            <li>
                                <i class="fa fa-phone"></i>
                                <span><?php echo $data['phone']; ?></span>
                            </li>

                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="#"><?php echo $data['email']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="button-group">
                    <div class="action-buttons">
                        <a class="btn btn-success" data-toggle="modal" data-target="#modal-contact" href="#">Contact
                            me</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- END Page header -->


        <!-- Main container -->
        <main>

    <?php }
    $req = $pdo->prepare('select * from education where id_resume = ?');
    $req->execute([$_GET['id']]);
    if (($data = $req->fetch()) !== false) { ?>
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
                        <h4><?php echo $data['degree']; ?>
                            <small><?php echo $data['major']; ?></small>
                        </h4>
                        <h5><?php echo $data['schoolname']; ?></h5>
                    </div>
                    <h6 class="time"><?php echo $data['datefrom']; ?> - <?php echo $data['dateto']; ?></h6>
                </header>
            </div>
        </div>
    </div>
    <?php }
    $req = $pdo->prepare('select * from experience where id_resume = ?');
    $req->execute([$_GET['id']]);
    if (($data = $req->fetch()) !== false) { ?>
        </div>
        <br>
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
                                <h4><?php echo $data['companyname']; ?></h4>
                                <h5><?php echo $data['position']; ?></h5>
                            </div>
                            <h6 class="time"><?php echo $data['datefrom']; ?> - <?php echo $data['dateto']; ?></h6>
                        </header>
                    </div>
                </div>
                <!-- END Work item -->

            </div>

        </div>
        </section>
        <!-- END Education -->
    <?php }
}
include 'scriptphp/footer.php' ?>


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
                <?php     $req = $pdo->prepare('select * from resume where id_resume = ?');
                $req->execute([$_GET['id']]);
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
