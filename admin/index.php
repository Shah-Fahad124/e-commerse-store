<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Splite - a responsive, flat and full featured admin template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="bootstrap admin template,bootstrap dashboard,dashboard template,bootstrap dashboard,admin dashboard,bootstrap admin,html admin template,html dashboard template,bootstrap admin dashboard,themeforest admin template,admin panel template,bootstrap 4 admin template,template admin bootstrap 4,bootstrap dashboard template,dashboard design template">
    <link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/brand/favicon.ico" />
    <title>Login</title>


    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!--Style css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Icons css-->
    <link rel="stylesheet" href="assets/css/icons.css">
</head>

<body class="bg-primary">

    <!--app open-->
    <div id="app" class="page">
        <section class="section ">
            <div class="container">
                <div class="">

                    <!--single-page open-->
                    <div class="single-page">
                        <div class="">
                            <div class="wrapper wrapper2">
                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="text text-danger">
                                        email or password is inncorrect
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success') { ?>
                                    <div class="register-success">
                                        you can login when your email is approved
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'logout') { ?>
                                    <div class="text text-success">
                                        Logout Successfully
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'err') { ?>
                                    <div class="text text-danger">
                                        you not access directly please first login
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['msg']) && $_GET['msg'] == '!allow') { ?>
                                    <div class="text text-danger">
                                        you are not allow to access this page
                                    </div>
                                <?php } ?>
                                <form action="./auth/login.php" method="post" id="login" class="card-body" tabindex="500">
                                    <h3 class="text-dark">Login</h3>
                                    <div class="mail">
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="passwd">
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="submit">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <input type="hidden" name="admin" value="login">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--single-page closed-->

                </div>
            </div>
        </section>
    </div>
    <!--app closed-->
</body>

</html>