<?php

    session_start();
    $_SESSION['username'] = 'test';
    $_SESSION['role'] = 'admin';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include './layouts/css.php' ?>
    <title><?= $site_name ?> | Profile</title>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include "./layouts/preloader.php" ?>

        <?php include "./layouts/navbar.php" ?>
        <?php include "./layouts/sidebar.php" ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">โปรไฟล์</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <!-- --------------------------------- profile image ----------------------------------------- -->
                                    <!-- <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="./images/profile/<?php #$_SESSION['profile-picture'] ?>" width="80" height="80" alt="User profile picture">
                                    </div> -->
                                    <!-- --------------------------------- profile image ----------------------------------------- -->
                                    <h3 class="profile-username text-center"><?= $_SESSION['username'] ?></h3>
                                    <?php if (isset($msg_err)) { ?>
                                        <p class="login-box-msg text-danger"><?php echo $msg_err ?></p>
                                    <?php } elseif (isset($msg_suc)) { ?>
                                        <p class="login-box-msg text-success"><?php echo $msg_suc ?></p>
                                    <?php } else { ?>
                                        <p class="text-muted text-center"><?= $_SESSION['role'] ?></p>
                                    <?php } ?>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Current Password</label>
                                                        <input type="password" required name="profile-input-current" class="form-control form-control-border border-width-2" placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">New Password</label>
                                                        <input type="password" required name="profile-input-new" class="form-control form-control-border border-width-2" placeholder="New Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Picture</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input accept=".jpg, .jpeg, .png" type="file" name="profile-input-picture" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <input type="submit" name="profile-btn-update" value="Save Change" class="btn btn-primary w-100">
                                </div>

                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <?php include './layouts/script.php' ?>
    <script>
        bsCustomFileInput.init();
    </script>
</body>

</html>