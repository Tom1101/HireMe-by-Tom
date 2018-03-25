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

    <title>HireMe by Tom - List Resume</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav bg-alt">

<!-- Navigation bar -->
<?php

include 'scriptphp/connectDB.php';
include 'scriptphp/searchpagepagi_resume.php';
if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
};

?>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg);">
    <div class="container page-name">
        <h1 class="text-center">Browse resumes</h1>
        <p class="lead text-center">Use following search box to find resumes that fits your position better</p>
    </div>

    <div class="container">
        <form method="POST" action="resume-list.php">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-12">
                    <input name="jobtitle" type="text" class="form-control" placeholder="Keyword: name, head line, location or salary">
                </div>
            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>

        </form>

    </div>

</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
            <div class="row">
                <!-- Resume detail -->
                <?php while ($data = $result->fetch()) { ?>
                <div class="col-xs-12 col-md-6">
                    <a class="item-block" href="resume-detail.php?id=<?php echo $data['id_resume']; ?>">
                        <header>
                            <center><div class="hgroup">
                                <h4><?php echo $data['name']; ?></h4>
                                <h5><?php echo $data['headline']; ?></h5>
                            </div></center>
                        </header>

                        <div class="item-body">
                            <p><?php echo $data['description']; ?></p>
                        </div>

                        <footer>
                            <ul class="details cols-2">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span><?php echo $data['location']; ?></span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>$<?php echo $data['salary']; ?> / hour</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <?php } ?>
                <!-- END Resume detail -->
            </div>
        </div>


        <!-- Page navigation -->
        <nav class="text-center">
            <ul class="pagination">
                <?php

                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '<li><a href="resume-list.php?page=' . ($current_page - 1) . '"><i class="ti-angle-left"></i></a></li> ';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<li class="active"><span>' . $i . '</span></li> ';
                    } else {
                        echo '<li><a href="resume-list.php?page=' . $i . '">' . $i . '</a></li> ';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li><a href="resume-list.php?page=' . ($current_page - 1) . '"><i class="ti-angle-right"></i></a></li> ';
                }
                ?>
            </ul>
        </nav>
        <!-- END Page navigation -->


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

<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
