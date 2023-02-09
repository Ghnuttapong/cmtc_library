<?php

include './backend/session.php';
include "./backend/func.php";

$db = new db;
// category id 1
$books_cate1 = $db->select_manual('books', ['*'], ['category_id'], [1]);
// category id 2
$books_cate2 = $db->select_manual('books', ['*'], ['category_id'], [2]);
// category id 3
$books_cate3 = $db->select_manual('books', ['*'], ['category_id'], [3]);

?>
<!--header !-->
<?php include 'header.php' ?>
<nav></nav>
<!--wrap content !-->
<div class="container content">
    <div class="category">

        <!--Title !-->
        <h1 class="title col-8">Category</h1>


        <!--show category Academic !-->
        <h1 class="title col-8">Academic</h1>


        <!--showbook !-->
        <div class="row">
            <?php foreach ($books_cate1 as $book) { ?>
                <div class="col">
                    <div class="card">
                        <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['name'] ?></h5>
                            <p class="card-text"><?= $book['price'] ?> บาท</p>
                            <a href="#" class="btn btn-danger">ยืม</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!--Literature book !-->
    <div class="highlight-book">
        <h1 class="title col-8">Literature</h1>
        <!--  show Literature !-->
        <div class="row">
            <?php if (empty($books_cate2)) { ?>
                <h4>ไม่พบรายการนี้</h4>
            <?php } ?>
            <?php foreach ($books_cate2 as $book) { ?>
                <div class="col">
                    <div class="card">
                        <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['name'] ?></h5>
                            <p class="card-text"><?= $book['price'] ?> บาท</p>
                            <a href="#" class="btn btn-danger">ยืม</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!--   Miscellaneous Book !-->
    <div class="highlight-book">
        <h1 class="title col-8">Miscellaneous</h1>
        <!--  show Miscellaneous !-->
        <div class="row">

            <?php if (empty($books_cate3)) { ?>
                <h4>ไม่พบรายการนี้</h4>
            <?php } ?>
            <?php foreach ($books_cate3 as $book) { ?>
                <div class="col">
                    <div class="card">
                        <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['name'] ?></h5>
                            <p class="card-text"><?= $book['price'] ?> บาท</p>
                            <a href="#" class="btn btn-danger">ยืม</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>