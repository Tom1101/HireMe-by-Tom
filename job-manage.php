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

    <title>HireMe by Tom - Manage jobs</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav bg-alt">


<!-- Navigation bar -->
<?php

include 'scriptphp/connectDB.php';

if(!isset($_GET['id_user'])){
    $userid = $_SESSION['id_user'];
} else {
    $userid = $_GET['id_user'];
};


$result = $pdo->query('select count(id_job) as total from job where id_user = '.$userid.'');
$row = $result->fetch();
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;

// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

$result = $pdo->query("SELECT * FROM job where id_user = $userid LIMIT $start, $limit");

if ($_SESSION['type'] == 'admin') {
    include 'scriptphp/navbar_admin.php';
} else if ($_SESSION['type'] == 'applicant') {
    include 'scriptphp/navbar_applicant.php';
} else {
    include 'scriptphp/navbar_recruiter.php';
}
?>
<!-- END Navigation bar -->


<!-- Page header -->
<header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
    <div class="container no-shadow">
        <h1 class="text-center">Manage jobs</h1>
        <p class="lead text-center">Here's the list of your submitted jobs. You can edit or delete them, or even add a
            new one.</p>
    </div>
</header>
<!-- END Page header -->


<!-- Main container -->
<main>
    <section class="no-padding-top bg-alt">
        <div class="container">
                    <?php  foreach ($result as $data){ ?>
                        <!-- Job detail -->
                            <div class="col-xs-12">
                                <div class="item-block">
                                    <header>
                                        <div class="hgroup">
                                            <a href="job-detail.php?id=<?php echo $data['id_job']; ?>"><h4><?php echo $data['title']; ?></h4></a>
                                            <h5><?php echo $data['company']; ?></h5>
                                            <br>
                                            <form method="POST" action="job-candidates.php">
                                                <input name="id" type="hidden" value="<?php echo $data['id_job']; ?>">
                                                <button class="btn btn-xs btn-success" type="submit">View Applicants</button>
                                            </form>
                                        </div>
                                        <div class="header-meta">
                                            <span class="location"><?php echo $data['location']; ?></span>
                                            <span class="label label-success"><?php echo $data['position']; ?></span>
                                        </div>
                                    </header></a>
                                    <footer>
                                        <div class="action-btn">
                                        <form method="POST" action="job-edit.php">
                                            <input name="id" type="hidden" value="<?php echo $data['id_job']; ?>">
                                            <button class="btn btn-xs btn-gray" type="submit">Edit</button>
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal"
                                               data-id="<?php echo $data['id_job']; ?>">Delete</a>
                                        </form>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        <!-- END Job detail -->
                    <?php } ?>
                <nav class="text-center">
                    <ul class="pagination">
                    <?php
                    if(!isset($_GET['id_user'])){
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<li><a href="job-manage.php?page='.($current_page-1).'"><i class="ti-angle-left"></i></a></li> ';
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<li class="active"><span>'.$i.'</span></li> ';
                            }
                            else{
                                echo '<li><a href="job-manage.php?page='.$i.'">'.$i.'</a></li> ';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<li><a href="job-manage.php?page='.($current_page-1).'"><i class="ti-angle-right"></i></a></li> ';
                        }
                    } else {
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<li><a href="job-manage.php?id_user='.$_GET['id_user'].'&page='.($current_page-1).'"><i class="ti-angle-left"></i></a></li> ';
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<li class="active"><span>'.$i.'</span></li> ';
                            }
                            else{
                                echo '<li><a href="job-manage.php?id_user='.$_GET['id_user'].'&page='.$i.'">'.$i.'</a></li> ';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<li><a href="job-manage.php?id_user='.$_GET['id_user'].'&page='.($current_page-1).'"><i class="ti-angle-right"></i></a></li> ';
                        }
                    };
                    ?>
                    </ul>
                </nav>
            </div>
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
            <form method="POST" action="job-delete.php">
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
<script>
    $('#myModal').on('show.bs.modal', function (e) {
        var myRoomNumber = $(e.relatedTarget).attr('data-id');
        $(this).find('.roomNumber').text(myRoomNumber);
        $("#hrefdelete").attr("value", myRoomNumber);
    });
</script>
</body>
</html>
