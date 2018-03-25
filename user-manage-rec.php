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

    <title>HireMe by Tom - Recruiter Manage</title>

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

include 'scriptphp/searchpagepagi_rec.php';

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
        <h1 class="text-center">Browse Recruiters</h1>
    </div>

    <div class="container">
        <form method="POST" action="user-manage-rec.php">
            <h1 class="text-center">Search Recruiter</h1>
            <div id="jobtitle" class=" searchbox form-group col-xs-12 col-sm-12">
                <input name="jobtitle" type="text" class="form-control" placeholder="Keyword: username">
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
                <?php foreach ($result as $data) { ?>
                    <!-- Job item -->
            <div class="col-xs-12">
                <div class="item-block">
                            <header>
                                <div class="hgroup">
                                    <h4>Username: <?php echo $data['username']; ?></h4>
                                    <h5>Password: <?php echo $data['password']; ?></h5>
                                </div>
                                <div class="header-meta">
                                    <span class="work">Number of jobs posted: <?php echo $data['NumJob']; ?></span>
                                </div>
                            </header>
                        <footer>
                            <div class="action-btn">
                                <form method="GET" action="job-manage.php?id_user=">
                                    <input name="id_user" type="hidden" value="<?php echo $data['id_user']; ?>">
                                    <button class="btn btn-xs btn-gray" type="submit">View and Edit</button>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal"
                                       data-id="<?php echo $data['id_user']; ?>">Block user</a>
                                </form>
                            </div>
                        </footer>
                    </div>
                    <!-- END Job item -->

            </div>
                <?php } ?>

            <!-- Page navigation -->
            <nav class="text-center">
                <ul class="pagination">
                    <?php

                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<li><a href="user-manage-rec.php?page=' . ($current_page - 1) . '"><i class="ti-angle-left"></i></a></li> ';
                    }

                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++) {
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page) {
                            echo '<li class="active"><span>' . $i . '</span></li> ';
                        } else {
                            echo '<li><a href="user-manage-rec.php?page=' . $i . '">' . $i . '</a></li> ';
                        }
                    }

                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1) {
                        echo '<li><a href="user-manage-rec.php?page=' . ($current_page - 1) . '"><i class="ti-angle-right"></i></a></li> ';
                    }
                    ?>
                </ul>
            </nav>
            <!-- END Page navigation -->


        </div>
    </section>
</main>
<!-- END Main container -->

<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Deleting Job ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure that you want to delete the job ?
            </div>

            <!-- Modal footer -->
            <form method="POST" action="">
                <div class="modal-footer center">
                    <input id="hrefdelete" name="id" type="hidden" value="x">
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End The Modal -->

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
