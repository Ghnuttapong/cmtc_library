
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layouts/css.php" ?>
    <title><?= $site_name ?> | บทความ</title>
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
                            <h1 class="m-0">แก้ไขบทความ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">แก้ไขบทความ</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form artical</h3>
                        </div>
                        <div class="card-body">
                            <?php if (isset($msg_suc)) { ?>
                                <div class="alert alert-success" role="alert"><?php echo $msg_suc ?></div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Title</label>
                                        <input type="text" value="ทดสอบ" required name="article-input-title" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectBorderWidth2">Categories Select</label>
                                        <select required class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="article-select-category">
                                            <option value="test">test</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="summernote">Detail</label>
                                        <textarea required name="article-input-detail" id="summernote">ทดสอบ</textarea>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Picture</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept=".jpg, .jpeg, .png" name="article-input-picture" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">test</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ---------------------------------- show image ------------------------------------- -->
                                    <!-- <div class="text-center">
                                        <img src="./images/article/<?php #$data['picture'] ?>" width="auto" height="300" alt="">
                                    </div> -->
                                    <!-- ---------------------------------- show image ------------------------------------- -->
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="article-btn-update" class="btn btn-success w-50 float-right" value="Save">
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
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Article details...',
                tabsize: 2,
                height: 500,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>