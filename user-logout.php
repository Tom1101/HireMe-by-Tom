<?php
/**
 * Created by PhpStorm.
 * User: Tom1101
 * Date: 12/03/2018
 * Time: 15:04
 */
// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
session_destroy();
header('location:index.php');
?>