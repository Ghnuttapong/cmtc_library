<?php

include "../api/db.php";
include dirname(__FILE__) . '/layouts/isadmin.php';
$sql = "SELECT * FROM orders";
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
        'borrow_at' => $result['borrow_at'],
        'return_at' => $result['return_at'],
        'due_at' => $result['due_at'],
        'fine' => $result['fine'],
        'member_id' => $result['member_id'],
        'book_id' => $result['book_id'],
    );
    array_push($data_arr, $data_in);
}


if (isset($_POST['btn-save'])) {
    $id = $_POST['id'];
    $fine = $_POST['fine'];
    $date_now = date('Y-m-d h:i:s');

    $update_sql = "UPDATE orders SET fine = :fine, return_at = :return_at WHERE id = :id";
    $update_sql = $conn->prepare($update_sql);
    $update_sql->bindParam(':return_at', $date_now);
    $update_sql->bindParam(':fine', $fine);
    $update_sql->bindParam(':id', $id);
   if($update_sql->execute()) {
    header('location: borrow.html');
   }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layouts/css.php" ?>
    <title><?= $site_name ?> | ระบบยืม คืน</title>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include dirname(__FILE__) . '/layouts/preloader.php'
        ?>

        <?php include "./layouts/navbar.php" ?>
        <?php include "./layouts/sidebar.php" ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ระบบยืม/คืน</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">ระบบยืม คืน</li>
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
                        <h3 class="card-title">รายการหนังสือ</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Borrow At</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Return At</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Due_At</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Fine</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Member Name</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Book Name</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ISBN</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($data_arr)) { ?>
                                                <td colspan="7" class="text-center">Not found data.</td>
                                            <?php } else { ?>
                                                <?php for ($i = 0; $i < count($data_arr); $i++) {

                                                    $sql = "SELECT * FROM books WHERE id = :id";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bindParam(':id', $data_arr[$i]['book_id']);
                                                    $stmt->execute();
                                                    $result_book = $stmt->fetch(PDO::FETCH_ASSOC);

                                                    $sql = "SELECT * FROM members WHERE id = :id";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bindParam(':id', $data_arr[$i]['member_id']);
                                                    $stmt->execute();
                                                    $result_member = $stmt->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                    <tr>
                                                        <td><?= $data_arr[$i]['no'] ?></td>
                                                        <td><?= date('d-m-Y', strtotime($data_arr[$i]['borrow_at'])) ?> </td>
                                                        <td><?= $data_arr[$i]['return_at'] ? date('d-m-Y', strtotime($data_arr[$i]['return_at'])) : 'ดำเนินการอยู่' ?> </td>
                                                        <td><?= $data_arr[$i]['due_at'] ? date('d-m-Y', strtotime($data_arr[$i]['due_at'])) : 0 ?></td>
                                                        <td><?= $data_arr[$i]['fine'] ?></td>
                                                        <td><?= $result_member['fullname'] ?></td>
                                                        <td><?= $result_book['name'] ?></td>
                                                        <td><?= $result_book['isbn'] ?></td>
                                                        <td>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <button type="button" class="open-fineModal btn btn-success w-100" data-id="<?= $data_arr[$i]['id'] ?>" data-toggle="modal" data-target="#finemodal">
                                                                        คืน
                                                                    </button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="#" class="btn btn-primary w-100">ข้อมูล</a>
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

        <!-- modal pay -->
        <form action="" method="post">
            <div class="modal fade" id="finemodal" tabindex="-1" aria-labelledby="finemodal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="finemodal">ค่าปรับ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="fine">จำนวนเงิน</label>
                                <input type="number" class="form-control" id="fine" name="fine" aria-describedby="fine">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="btn-save" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- ./wrapper -->
    <?php include "./layouts/script.php" ?>

    <script>
        $(document).on("click", ".open-fineModal", function() {
            var id = $(this).data('id');
            $(".modal-body #id").val(id);
        });
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
    </script>
</body>

</html>