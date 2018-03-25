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

    <title>HireMe by Tom - Apply for a job</title>

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

if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
};


if(isset($_GET['id'])){
    $req = $pdo->query('select * from job where id_job = '.$_GET['id'].'');
    if(($data = $req->fetch()) !== false)
    {

?>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container no-shadow">
        <h1 class="text-center">Apply for the job</h1>
        <p class="lead text-center">Apply with your online resume, create new resume for the job, or make a custom application.</p>

        <hr>

        <!-- Job detail -->
        <a class="item-block item-block-flat" href="job-detail.php?id=<?php echo $data['id_job']; ?>">
            <header>
                <div class="hgroup">
                    <h4><?php echo $data['title']; ?></h4>
                    <h5><?php echo $data['company']; ?></h5>
                </div>
                <div class="header-meta">
                    <span class="location"><?php echo $data['location']; ?></span>
                    <span class="label label-success"><?php echo $data['position']; }}?></span>
                </div>
            </header>
        </a>
        <!-- END Job detail -->

        <div class="button-group">
            <div class="action-buttons">
                <a class="btn btn-primary" href="#sec-resume">Apply with a resume</a>
            </div>
        </div>

    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>


    <!-- Apply with resume -->
    <section id="sec-resume">
        <div class="container">

            <header class="section-header">
                <span>Apply with a resume</span>
                <h2>Select a resume</h2>
                <p>Applied for this job with one of your online available resumes</p>
            </header>
            <?php
            $req = $pdo->query('select * from resume where id_user = '.$_SESSION['id_user'].'');
            foreach ($req as $data){
            ?>
            <!-- Resume item -->
            <div class="item-block">
                <header>
                    <div class="hgroup">
                        <h4><a href="resume-detail.php"><?php echo $data['name']; ?></a></h4>
                        <h5><?php echo $data['headline']; ?></h5>
                    </div>
                    <div class="header-meta">
                        <span class="location"><?php echo $data['location']; ?></span>
                        <span class="rate">$<?php echo $data['salary']; ?> per hour</span>
                    </div>
                </header>

                <footer>
                    <div class="action-btn">
                        <form method="POST" action="resume-edit.php">
                            <input name="id" type="hidden" value="<?php echo $data['id_resume']; ?>">
                        <button class="btn btn-xs btn-gray" href="resume-edit.php">Edit</button>
                        <input type="button" value="select" class="btn btn-outline btn-xs btn-success" onclick="ChangeUrl('select','job-apply.php?id=<?php echo $_GET['id']; ?>&resume=<?php echo $data['id_resume'];?>#sec-resume');">
                        </form>
                    </div>
                </footer>
            </div>
            <!-- END Resume item -->
            <?php }
            if(isset($_GET['resume'])){
                $req = $pdo->query('update resume set id_job = '.$_GET['id'].' where id_resume = '.$_GET['resume'].'');
                echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Well done ! Apply Job Success ! </strong></div>";
            };
            ?>
            <br>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                </div>
                <div class="col-xs-12 col-md-4">
                    <a class="btn btn-block btn-success" onclick="location.reload();">Apply to this job</a>
                </div>
                <div class="col-xs-12 col-md-4">
                </div>
            </div>

        </div>
    </section>
    <!-- END Apply with resume -->

</main>
<!-- END Main container -->


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
<script type="text/javascript">
    function ChangeUrl(title, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Title: title, Url: url };
            history.pushState(obj, obj.Title, obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
    }
</script>
</body>
</html>
