<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 19/03/2018
 * Time: 15:24
 */
if (isset($_POST['jobtitle']) && !empty($_POST['jobtitle'])) {
    $result = mysqli_query($conn, 'select count(id_job) as total from job where title ="'.$_POST['jobtitle'].'"');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
// tổng số trang
    $total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
// Tìm Start
    $start = ($current_page - 1) * $limit;
} elseif (isset($_POST['joblocation']) && !empty($_POST['joblocation'])) {
    $result = mysqli_query($conn, 'select count(id_job) as total from job where location ="'.$_POST['joblocation'].'"');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
// tổng số trang
    $total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
// Tìm Start
    $start = ($current_page - 1) * $limit;
} elseif (isset($_POST['jobcompany']) && !empty($_POST['jobcompany'])) {
    $result = mysqli_query($conn, 'select count(id_job) as total from job where company ="'.$_POST['jobcompany'].'"');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
// tổng số trang
    $total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
// Tìm Start
    $start = ($current_page - 1) * $limit;
} else {
    $result = mysqli_query($conn, 'select count(id_job) as total from job');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
// tổng số trang
    $total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
// Tìm Start
    $start = ($current_page - 1) * $limit;
}