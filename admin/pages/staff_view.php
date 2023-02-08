<?php

include "../api/db.php";
  include dirname(__FILE__).'/layouts/isadmin.php';
$sql = "SELECT * FROM staffs";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data_arr = array();
$no = 0;
foreach ($results as $result) {
    $no++;
    $data_in = array(
        'no' => $no,
        'id' => $result['id'],
        'fullname' => $result['fullname'],
        'username' => $result['username'],
        'password' => $result['password'],
        'position' => $result['position'],
    );
    array_push($data_arr, $data_in);
}

if (isset($_POST['btn-del'])) {
    $sql = "DELETE FROM staffs WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $id = $_POST['id'];
    if ($stmt->execute()) {
        header('location: ./staff_view.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layouts/css.php" ?>
    <title><?= $site_name ?> | รายชื่อสมาชิกเจ้าหน้าที่</title>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include dirname(__FILE__) . '/layouts/preloader.php' ?>

        <?php include "./layouts/navbar.php" ?>
        <?php include "./layouts/sidebar.php" ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">รายชื่อ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">รายชื่อ</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Details</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Fullname</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Username</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Password</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Position</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($data_arr)) { ?>
                                                <td colspan="6" class="text-center">Not found data.</td>
                                            <?php } else { ?>
                                                <?php for ($i = 0; $i < count($data_arr); $i++) { ?>
                                                    <tr>
                                                        <td><?= $data_arr[$i]['no'] ?></td>
                                                        <td>
                                                            <?= $data_arr[$i]['fullname'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $data_arr[$i]['username'] ?>
                                                        </td>
                                                        <td><?= $data_arr[$i]['password'] ?></td>
                                                        <td>
                                                            <?= $data_arr[$i]['position'] == 1 ? 'เจ้าหน้าที่' : 'บรรณารักษ์' ?>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="staff_edit.php?id=<?= $data_arr[$i]['id'] ?>" class="btn btn-primary w-100">Edit</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="id" value="<?= $data_arr[$i]['id'] ?>" id="">
                                                                        <input onclick="return confirm('Do you want to delete <?= $data_arr[$i]['username'] ?>')" type="submit" value="Del" name="btn-del" class="btn btn-danger w-100">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <?php include "./layouts/script.php" ?>

    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })

        function confirmDel() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
</body>

</html>