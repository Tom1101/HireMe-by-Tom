<?php
ob_start();
session_start();
include 'scriptphp/functions.php';
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $randomstring       = randomString(6);
    $_SESSION['random'] = $randomstring;
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

    <title>TheJobs - Forget password</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/email.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
</head>
<body class="">
<table border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">

                <!-- START CENTERED WHITE CONTAINER -->
                <span class="preheader">Password Reset HireMe By Tom</span>
                <table class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <center><a href="index.php"><img src="assets/img/logo.png" alt=""></a></center>
                                        <p>Hi there,</p>
                                        <p>This is your PIN Code for reset the password: </p>
                                        <h2><?php
                                            echo $_SESSION['random'];
                                            ?> </h2>
                                        <p>Good luck! Hope it works.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>

                <!-- START FOOTER -->
                <div class="footer">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block">
                                <span class="apple-link">HireMe By Tom</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="content-block powered-by">
                                Powered by <a href="#">HireMe by Tom</a>.
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

                <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>

<?php
$content = ob_get_clean();
include 'scriptphp/connectDB.php';
if (isset($_POST['pincode']) && isset($_POST['newpass']) && isset($_POST['confirmnewpass']) && isset($_POST['emailreset'])) {
    if (!empty($_POST['pincode']) && !empty($_POST['newpass']) && !empty($_POST['confirmnewpass'])) {
        if ($_POST['pincode'] == $_SESSION['random']) {
            if ($_POST['newpass'] == $_POST['confirmnewpass']) {
                $req = $pdo->prepare('update user_login set password = ? where email = ?');
                if ($req->execute([$_POST['confirmnewpass'], $_POST['emailreset']])) {
                    echo '<meta http-equiv="refresh" content="0;url=user-login.php?resetpw"/>';
                } else {
                    echo '<div class="alert alert-warning" role="alert"><strong>Warning!</strong> Your password can not be change. Please contact to admin. </div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert"><strong>Warning!</strong> Please check and confrim the same new password ! </div>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert"><strong>Warning!</strong> Please verify the pincode in your mail. </div>';
        }
    }
    echo '<div class="alert alert-warning" role="alert"><strong>Warning!</strong> Please enter valide values. </div>';
} else if (isset($_POST['email']) && !empty($_POST['email'])) {
    $reqcheckmail = $pdo->prepare('SELECT exists( SELECT * from user_login where email = ?) as boolean');
    if ($reqcheckmail->execute([$_POST['email']])) {
        $checkmail = $reqcheckmail->fetch();
        if ($checkmail['boolean'] == 1) {
            $req = $pdo->prepare('select * from user_login where email = ? ');
            if ($req->execute([$_POST['email']])) {
                $res = $req->fetch();
                include 'scriptphp/class.smtp.php';
                include 'scriptphp/class.phpmailer.php';
                $title  = 'HireMe by Tom Password Reset';
                $nTo    = $res['username'];
                $mTo    = $_POST['email'];
                $diachi = 'contact@nguyenductuananh.com';
                //test gui mail
                $mail = sendMail($title, $content, $nTo, $mTo, $diachicc = '');
                if ($mail == 1) {
                    echo '<div class="alert alert-success" role="alert">
                    <strong>Well done ! Your email has been sent successfully ! </strong>
                </div>';
                } else {
                    echo '<div class="alert alert-warning" role="alert"><strong>Warning!</strong> Please check your valide email. </div>';
                }
            }
        } else {
            echo '<meta http-equiv="refresh" content="0;url=user-forget-pass.php?error"/>';
        }
    } else {
        echo '<meta http-equiv="refresh" content="0;url=user-forget-pass.php?error"/>';
    }
} else {
    echo '<meta http-equiv="refresh" content="0;url=user-forget-pass.php?error"/>';
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

    <title>TheJobs - Forget password</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="login-page">


<main>

    <div class="login-block">
        <img src="assets/img/logo.png" alt="">
        <h1>Reset Password</h1>

        <form method="POST" action="user-password-reset.php">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ti-pin"></i></span>
                    <input name="pincode" type="text" class="form-control" placeholder="PIN Code">
                </div>
            </div>
                    <input name="emailreset" type="hidden" class="form-control" value="<?php echo $_POST['email'] ?>">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input name="newpass" type="password" class="form-control" placeholder="New Password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input name="confirmnewpass" type="password" class="form-control"
                           placeholder="Confirm New Password">
                </div>
            </div>

            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        </form>
    </div>

    <div class="login-links">
        <p class="text-center"><a href="user-login.php">Back to login</a></p>
    </div>

</main>


<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
