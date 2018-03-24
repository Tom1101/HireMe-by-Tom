<?php
session_start();
if (isset($_SESSION['id_user']) && isset($_SESSION['username']))
{
    header('location:homepage.php');
}
else
{
include 'scriptphp/connectDB.php';

if (isset($_POST['user_login'])) {
// Vérification des identifiants
    $req = $pdo->prepare('SELECT * FROM user_login WHERE username = :username AND password = :password');
    $req->execute(['username' => $_POST['username'], 'password' => $_POST['password']]);
    $resultat = $req->fetch();
    if ($resultat == null) {
        ?>
        <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> Better check your username and password, It isn't looking too good.
        </div>
        <?php
    } else {
        $_SESSION['id_user'] = $resultat['id_user'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['type'] = $resultat['type'];
        ?>
        <div class="alert alert-success" role="alert">
            <strong>Well done ! Welcome back <?php echo $_SESSION['username']; ?> ! </strong>
        </div>
        <meta http-equiv="refresh" content="1">
        <?php
    }
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

    <title>HireMe by Tom - Login</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/thejobs.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
          rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="icon" href="assets/img/favicon.ico">
</head>

<body class="login-page">


<main>

    <div class="login-block">
        <img src="assets/img/logo.png" alt="">
        <h1>Log into your account</h1>

        <form method="POST">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input name="username" type="text" class="form-control" placeholder="Username">
                </div>
            </div>

            <hr class="hr-xs">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
            </div>

            <button name="user_login" class="btn btn-primary btn-block" type="submit">Login</button>

        </form>
    </div>

    <div class="login-links">
        <a class="pull-left" href="#">Forget Password?</a>
        <a class="pull-right" href="user-register.php">Register an account</a>
    </div>

</main>


<!-- Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/thejobs.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>