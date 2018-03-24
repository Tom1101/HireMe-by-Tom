<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 20/03/2018
 * Time: 15:50
 */

if (isset($_POST['submit_button'])) {
    if (!empty($_POST['name']) && !empty($_POST['headline']) && !empty($_POST['description']) && !empty($_POST['location']) && !empty($_POST['website']) && !empty($_POST['salary']) && !empty($_POST['age']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
        if (is_numeric($_POST['salary']) && is_numeric($_POST['age'])) {
            $req_re = $pdo->prepare('update resume set name=?, headline=?, description=?, location=?, salary=?, phone=?, age=?, email=?, website=? where id_resume = ?');
            if ($req_re->execute([$_POST['name'], $_POST['headline'], $_POST['description'], $_POST['location'], $_POST['salary'], $_POST['phone'], $_POST['age'], $_POST['email'], $_POST['website'],$_POST['id']])) {
                $req_ed = $pdo->prepare('update education set degree=?, major=?, schoolname=?, datefrom=?, dateto=? where id_resume = ?');
                if ($req_ed->execute([$_POST['ed_degree'], $_POST['ed_major'], $_POST['ed_schoolname'], $_POST['ed_datefrom'], $_POST['ed_dateto'], $_POST['id']])) {
                    $req_ex = $pdo->prepare('update experience set companyname=?, position=?, datefrom=?, dateto=? where id_resume = ?');
                    if ($req_ex->execute([$_POST['ex_companyname'], $_POST['ex_position'], $_POST['ex_datefrom'], $_POST['ex_dateto'], $_POST['id']])) {
                        echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Well done ! Add Resume Success ! </strong></div>";
                    }
                }
            } else {
                echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please enter valid values.</div>";
            }
        } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please verify if it is valid values (Interger).</div>";
        }
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\"><strong>Warning!</strong> Please enter valid values.</div>";
    }
};