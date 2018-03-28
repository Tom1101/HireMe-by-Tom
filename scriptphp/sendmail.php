<?php
//goi thu vien
include('scriptphp/class.smtp.php');
include "scriptphp/class.phpmailer.php";
include "scriptphp/functions.php";
$title = 'HireMe by Tom Password Reset';
$content = file_get_contents('scriptphp/emailcontent.php');
$nTo = 'Tom Tom';
$mTo = 'nguyentom1101@gmail.com';
$diachi = 'contact@nguyenductuananh.com';
//test gui mail
$mail = sendMail($title, $content, $nTo, $mTo, $diachicc = '');
if ($mail == 1)
    echo '<div class="alert alert-success" role="alert">
                    <strong>Well done ! Your email has been sent successfully ! </strong>
                </div>';
else  echo '<div class="alert alert-warning" role="alert"><strong>Warning!</strong> Please check your email. </div>';
?>