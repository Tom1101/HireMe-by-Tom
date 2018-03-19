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

    <title>HireMe by Tom - Delete job</title>

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
<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 15/03/2018
 * Time: 09:32
 */
include 'scriptphp/connectDB.php';
if(isset($_GET['id'])){
    $req = $pdo->prepare('delete from job where id_job = ?');
    $req->execute([$_GET['id']]);
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Well done ! Delete Job Success ! </strong></div>";
    ?>
    <meta http-equiv="refresh" content="1;url=job-manage.php" />
    <?php
}
?>


