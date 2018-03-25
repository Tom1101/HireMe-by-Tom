<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 21/03/2018
 * Time: 13:44
 */
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

    <title>HireMe by Tom - Delete resume</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/vendors/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

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
if(isset($_POST['id'])){
    $req2 = $pdo->prepare('delete from education where id_resume = ?');
    $req2->execute([$_POST['id']]);
    $req3 = $pdo->prepare('delete from experience where id_resume = ?');
    $req3->execute([$_POST['id']]);
    $req1 = $pdo->prepare('delete from resume where id_resume = ?');
    $req1->execute([$_POST['id']]);
    echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Well done ! Delete Resume Success ! </strong></div>";
    ?>
    <meta http-equiv="refresh" content="1;url=resume-manage.php" />
    <?php
}
?>


