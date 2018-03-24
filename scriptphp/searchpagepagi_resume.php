<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 19/03/2018
 * Time: 15:24
 */
if (isset($_POST['jobtitle']) && !empty($_POST['jobtitle'])) {
    $result = $pdo->query('select count(id_resume) as total from resume where (concat(name,headline,location,salary) like "%'.$_POST['jobtitle'].'%")');
    $row = $result->fetch();
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
    $result = $pdo->query('select count(id_resume) as total from resume');
    $row = $result->fetch();
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
};

if(isset($_POST['jobtitle']) && !empty($_POST['jobtitle'])) {
    $result = $pdo->query('SELECT * FROM resume WHERE (concat(name,headline,location,salary) like "%'.$_POST['jobtitle'].'%") LIMIT ' . $start . ', ' . $limit . '');
} else {
    $result = $pdo->query('SELECT * FROM resume LIMIT '.$start.', '.$limit.'');
};