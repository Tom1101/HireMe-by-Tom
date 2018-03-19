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
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="nav-on-header smart-nav bg-alt">


<!-- Navigation bar -->
<?php

include 'connectDB.php';

$conn = mysqli_connect('localhost:8889', 'tom', '@tom', 'hiremebytom');

$result = mysqli_query($conn, 'select count(id_job) as total from job');
$row = mysqli_fetch_assoc($result);
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

$result = mysqli_query($conn, "SELECT * FROM job LIMIT $start, $limit");

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
            <nav class="row">
                <table class="table table-bordered table-striped">
                    <?php  while ($data = mysqli_fetch_assoc($result)){ ?>
                        <!-- Job detail -->
                        <tr id="page1">
                            <div class="col-xs-12">
                                <div class="item-block">
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

                                    <footer>
                                        <div class="action-btn">
                                            <a class="btn btn-xs btn-gray" href="job-edit.php?id=<?php echo $data['id_job']; ?>">Edit</a>
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal" data-id="job-delete.php?id=<?php echo $data['id_job'];?>">Delete</a>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </tr>
                        <!-- END Job detail -->
                    <?php } ?>
                </table>
                <nav class="text-center">
                    <ul class="pagination">
                    <?php

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
            <div class="modal-footer center">
                <a id="hrefdelete" href="x" type="button" class="btn btn-success">Yes</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- End The Modal -->
<!-- Site footer -->
<?php include '../footer.php' ?>
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
        $("#hrefdelete").attr("href", myRoomNumber);
    });
</script>
</body>
</html>
