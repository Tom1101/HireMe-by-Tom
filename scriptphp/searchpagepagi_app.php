<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 19/03/2018
 * Time: 15:24
 */
if (isset($_POST['jobtitle']) && !empty($_POST['jobtitle'])) {
    $result = $pdo->query('select count(id_user) as total from user_login where (concat(username) like "%'.$_POST['jobtitle'].'%") and type ="applicant"');
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
    $result = $pdo->query('select count(id_user) as total from user_login where type="applicant"');
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
    $result = $pdo->query('SELECT *, (SELECT count(id_resume) from resume where resume.id_user = user_login.id_user) as NumJob FROM user_login WHERE type="applicant" and (concat(title,location,company) like "%'.$_POST['jobtitle'].'%") LIMIT ' . $start . ', ' . $limit . '');
} else {
    $result = $pdo->query('SELECT *, (SELECT count(id_resume) from resume where resume.id_user = user_login.id_user) as NumJob FROM user_login where type="applicant" LIMIT '.$start.', '.$limit.'');
};