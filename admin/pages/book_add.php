<?php
include "../api/db.php";
  include dirname(__FILE__).'/layouts/isadmin.php';

if (isset($_POST['btn-save'])) {

    $isbn = $_POST['isbn'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $category_id = $_POST['category'];

    $check_sql = "SELECT * FROM books WHERE name = :name";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bindParam(':name', $name);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        $msg_err = "Book name already exists.";
    } else {
        $insert_sql = "INSERT INTO books (isbn, name, price, author, category_id)
        VALUES (:isbn, :name, :price, :author, :category_id)";

        $insert_stmt = $conn->prepare($insert_sql);

        $insert_stmt->bindParam(':isbn', $isbn);
        $insert_stmt->bindParam(':name', $name);
        $insert_stmt->bindParam(':price', $price);
        $insert_stmt->bindParam(':author', $author);
        $insert_stmt->bindParam(':category_id', $category_id);

        $insert_stmt->execute();
        $msg_suc = "Inserted successful.";
    }
}
$category_arr = array();
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();
foreach ($categories as $category) {
    $data_in = array(
        "id" => $category['id'],
        "name" => $category['name']
    );
    array_push($category_arr, $data_in);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layouts/css.php" ?>
    <title><?php echo $site_name ?> | เพิ่มหนังสือ</title>
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
                            <h1 class="m-0">เพิ่มหนังสือ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">เพิ่มหนังสือ</li>
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
                                        <label for="isbn">ISBN</label>
                                        <input type="text" required name="isbn" class="form-control form-control-border border-width-2" placeholder="ISBN">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" required name="name" class="form-control form-control-border border-width-2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" required name="author" class="form-control form-control-border border-width-2" placeholder="Author">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" required name="price" class="form-control form-control-border border-width-2" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Category">Category</label>
                                        <select name="category" class="form-control" id="">
                                            <?php foreach ($category_arr as $category) { ?>
                                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                            <?php } ?>
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