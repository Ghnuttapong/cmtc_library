<?php
include "../api/db.php";
  include dirname(__FILE__).'/layouts/isadmin.php';

$id = $_GET['id'];
$sql = "SELECT * FROM staffs WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btn-save'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $sql = "UPDATE members SET fullname = :fullname, phone = :phone, password = :password, position = :position WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':position', $position);
    $stmt->execute();

    $msg_suc = "Updated successful.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layouts/css.php" ?>
    <title><?php echo $site_name ?> | แก้ไขสมาชิก</title>
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
                            <h1 class="m-0">แก้ไขข้อมูล</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
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
                                        <input type="text" value="<?= $result['username'] ?>" disabled required name="username" class="form-control form-control-border border-width-2" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" value="<?= $result['password'] ?>" required name="password" class="form-control form-control-border border-width-2" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" value="<?= $result['fullname'] ?>" required name="fullname" class="form-control form-control-border border-width-2" placeholder="Fullname">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" value="<?= $result['phone'] ?>" required name="phone" class="form-control form-control-border border-width-2" placeholder="Phone">
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