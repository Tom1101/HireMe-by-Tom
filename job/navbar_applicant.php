<!-- Navigation bar -->
<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="../index.php"><img src="../assets/img/logo.png" alt="logo"></a>
                <a class="logo-alt" href="../index.php"><img src="../assets/img/logo-alt.png" alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        <div class="pull-right">

            <div class="dropdown user-account">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <h5>Welcome <span style="color: white"><?php echo $_SESSION['username']; ?></span></h5>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="../profil.html">Profil</a></li>
                    <li><a href="../resume/resume-manage.php">Resume</a></li>
                    <li><a href="../user-logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
            <li>
                <a class="active" href="../index.php">Home</a>
            </li>
            <li>
                <a href="job-list-3.php">Browse jobs</a>
            </li>
            <li>
                <a href="#">Resume</a>
                <ul>
                    <li><a href="../resume/resume-add.php">Create a resume</a></li>
                    <li><a href="../resume/resume-manage.php">Manage resumes</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Company</a>
                <ul>
                    <li><a href="../company/company-add.php">Create a company</a></li>
                    <li><a href="../company-manage.php">Manage companies</a></li>
                </ul>
            </li>
        </ul>
        <!-- END Navigation menu -->

    </div>
</nav>
<!-- END Navigation bar -->