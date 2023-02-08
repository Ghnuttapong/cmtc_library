<?php
include "../api/db.php";
  include dirname(__FILE__).'/layouts/isadmin.php';

if (isset($_POST['btn-save'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $check_sql = "SELECT * FROM staffs WHERE username = :username";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bindParam(':username', $username);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        $msg_err = "Username already exists.";
    } else {
        $insert_sql = "INSERT INTO staffs (username, password, fullname, phone, position)
        VALUES (:username, :password, :fullname, :phone, :position)";

        $insert_stmt = $conn->prepare($insert_sql);

        $insert_stmt->bindParam(':username', $username);
        $insert_stmt->bindParam(':password', $password);
        $insert_stmt->bindParam(':fullname', $fullname);
        $insert_stmt->bindParam(':phone', $phone);
        $insert_stmt->bindParam(':position', $position);

        $insert_stmt->execute();
        $msg_suc = "Inserted successful.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layouts/css.php" ?>
    <title><?php echo $site_name ?> | เพิ่มสมาชิก</title>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include "./layouts/preloader.php" ?>

        <?php include "./layouts/navbar.php" ?>
        <!-- Main Sidebar Container -->
        <?php include "./layouts/sidebar.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">เพิ่มข้อมูล</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($msg_err)) { ?>
                                <div class="alert alert-danger" role="alert"><?php echo $msg_err ?></div>
                            <?php } ?>
                            <?php if (isset($msg_suc)) { ?>
                                <div class="alert alert-success" role="alert"><?php echo $msg_suc ?></div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" required name="username" class="form-control form-control-border border-width-2" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" required name="password" class="form-control form-control-border border-width-2" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" required name="fullname" class="form-control form-control-border border-width-2" placeholder="Fullname">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" required name="phone" class="form-control form-control-border border-width-2" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Position">Position</label>
                                        <select name="position" class="form-control" id="">
                                            <option value="1">เจ้าหน้าที่</option>
                                            <option value="2">บรรณารักษ์</option>
                                        </select>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn-save" class="btn btn-success w-50 float-right" value="Save">
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <?php include './layouts/script.php' ?>
</body>

</html>