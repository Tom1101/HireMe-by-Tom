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

    <title>HireMe by Tom - Job list</title>

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

include 'scriptphp/searchpagepagi.php';

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
        <h1 class="text-center">Browse jobs</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better</p>
    </div>

    <div class="container">
        <form method="POST" action="job-list-3.php">
            <h1 class="text-center">Search for <?php if(isset($_POST['jobtitle'])){
                echo $_POST['jobtitle'];
                } ?></h1>
            <div id="jobtitle" class=" searchbox form-group col-xs-12 col-sm-12">
                <input name="jobtitle" type="text" class="form-control" placeholder="Keyword: job title, company, location">
            </div>
            <br>
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
            <div class="row item-blocks-connected">

                <?php foreach ($result as $data) { ?>
                    <!-- Job item -->
                    <div class="col-xs-12">
                        <a class="item-block" href="job-detail.php?id=<?php echo $data['id_job']; ?>">
                            <header>
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
                    </div>
                    <!-- END Job item -->
                <?php } ?>
            </div>


            <!-- Page navigation -->
            <nav class="text-center">
                <ul class="pagination">
                    <?php

                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<li><a href="job-list-3.php?page=' . ($current_page - 1) . '"><i class="ti-angle-left"></i></a></li> ';
                    }

                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++) {
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page) {
                            echo '<li class="active"><span>' . $i . '</span></li> ';
                        } else {
                            echo '<li><a href="job-list-3.php?page=' . $i . '">' . $i . '</a></li> ';
                        }
                    }

                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1) {
                        echo '<li><a href="job-list-3.php?page=' . ($current_page - 1) . '"><i class="ti-angle-right"></i></a></li> ';
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
<!--<script>
    $(function() {
        $('#searchselected').change(function(){
            $('.searchbox').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>-->
</body>
</html>
