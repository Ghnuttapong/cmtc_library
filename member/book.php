<?php

include './backend/session.php';
include "./backend/func.php";

$db = new db;

$histories = $db->select_belong('orders', 'books', '*', 'orders.book_id = books.id', ['orders.member_id'], [$_SESSION['user_id']])

?>
<!--header !-->
<?php include 'header.php' ?>
<nav></nav>
<!--wrap content !-->
<div class="container content">
    <div class="Bookshelf">

        <!--Title !-->
        <h1 class="title col-8">Bookshelf</h1>


        <!--ShowAll book !-->
        <div class="row">
            <h5>Borrowed Items</h5>

            <?php foreach ($histories as $history) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $history['name'] ?></h5>
                            <p class="card-text"><?= $history['price'] ?></p>
                            <p class="btn btn-Warning">สถานะ: <span class="text-success"><?= $history['return_at'] != null ? 'คืนแล้ว' : 'ยืม'  ?> </span></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row margin-BH">
            <h5>Borrowing History</h5>
            <?php if(empty($histories)) { ?>
                    <p>ยังไม่มีประวัติการทำรายการ</p>
            <?php } ?>
            <?php foreach ($histories as $history) { ?>
                <?php if ($history['return_at'] != null) { ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $history['name'] ?></h5>
                                <p class="card-text"><?= $history['price'] ?></p>
                                <a href="#" class="btn btn-Warning">สถานะ: <span class="text-success">คืนแล้ว</span></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>