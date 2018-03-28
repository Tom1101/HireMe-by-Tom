<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 12/03/2018
 * Time: 15:04
 */
// Session Start
session_start();
// Session distroy
session_destroy();
header('location:index.php');
?>