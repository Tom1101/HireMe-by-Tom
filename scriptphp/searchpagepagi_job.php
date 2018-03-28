<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 19/03/2018
 * Time: 15:24
 */
//if click on button search
if (isset($_POST['jobtitle']) && !empty($_POST['jobtitle'])) {
    $result = $pdo->query('select count(id_job) as total from job where (concat(title,location,company) like "%'.$_POST['jobtitle'].'%")');
    $row = $result->fetch();
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
// calcul total page
    $total_page = ceil($total_records / $limit);
// Limit the current page from 1 to the total page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
// Find start position
    $start = ($current_page - 1) * $limit;
} else {
    // normal page without search
    $result = $pdo->query('select count(id_job) as total from job');
    $row = $result->fetch();
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
// calcul total page
    $total_page = ceil($total_records / $limit);
// Limit the current page from 1 to the total page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
// Find start position
    $start = ($current_page - 1) * $limit;
};

if(isset($_POST['jobtitle']) && !empty($_POST['jobtitle'])) {
    $result = $pdo->query('SELECT * FROM job WHERE (concat(title,location,company) like "%'.$_POST['jobtitle'].'%") LIMIT ' . $start . ', ' . $limit . '');
} else {
    $result = $pdo->query('SELECT * FROM job LIMIT '.$start.', '.$limit.'');
};