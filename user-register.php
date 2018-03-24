<?php
session_start();
if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {
    header('location:homepage.php');
} else {
    include 'scriptphp/connectDB.php';

    if (isset($_POST['user_signup'])) {
        // Vérification des identifiants
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['type'])){
            $req = $pdo->prepare('INSERT INTO user_login(username, password, type) VALUES (?,?,?)');
            if ($req->execute([$_POST['username'], $_POST['password'], $_POST['type']])) {
                ?>
                <div class="alert alert-success" role="alert">
                    <strong>Well done ! Welcome <?php echo $_POST['username']; ?> ! </strong>
                </div>
                <meta http-equiv="refresh" content="1;url=user-login.php"/>
                <?php
            } elseif ($req->errorCode() == 23000) {
                ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Warning!</strong> This username has already existed. Please to contact the admin for
                    support.
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong> Please enter valid values.
            </div>
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

        <title>HireMe by Tom - Register</title>

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
            <h1>Sign up your account</h1>

            <form method="POST" action="user-register.php">

                <h5>Who are you ?</h5>
                <div class="radio">
                    <input type="radio" name="type" id="applicant" value="applicant">
                    <label for="applicant">Applicant</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="type" id="recruiter" value="recruiter">
                    <label for="recruiter">Recruiter</label>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="ti-user"></i></span>
                        <input name="username" type="text" class="form-control" placeholder="Your username">
                    </div>
                </div>

                <hr class="hr-xs">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="ti-unlock"></i></span>
                        <input name="password" type="password" class="form-control" placeholder="Choose a password">
                    </div>
                </div>

                <hr class="hr-xs">

                <button name="user_signup" class="btn btn-primary btn-block" type="submit">Sign up</button>

            </form>
        </div>

        <div class="login-links">
            <p class="text-center">Already have an account? <a class="txt-brand" href="user-login.php">Login</a></p>
        </div>

    </main>


    <!-- Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/thejobs.js"></script>
    <script src="assets/js/custom.js"></script>

    </body>
    </html>
<?php } ?>