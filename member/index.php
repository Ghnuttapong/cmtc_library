<?php

include './backend/session.php';
include './backend/func.php';
$db = new db;

$books = $db->select_manaul_field('books', ['*']);

if (isset($_POST['btn-borrow'])) {
    $book_id = $_POST['book_id'];
    $db->borrow_book($_SESSION['user_id'], $book_id);
    $msg_suc = 'ทำรายการสำเร็จ';
}

?>
<!--header !-->
<?php include 'header.php' ?>
<nav></nav>
<!--wrap content !-->
<div class="container content">
    <div class="new-arrival">

        <!--Title New Arrival !-->
        <h1 class="title col-8">New Arrival</h1>

        <!--showbook-top !-->
        <form action="" method="post">
            <div class="row">
                <?php if (isset($msg_suc)) { ?>
                    <div class="alert alert-success">
                        <b><?= $msg_suc ?></b>
                    </div>
                <?php } ?>
                <?php foreach ($books as $book) { ?>
                    <div class="col-4">
                        <div class="card">
                            <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $book['name'] ?></h5>
                                <p class="card-text"><?= $book['price'] ?> บาท</p>
                                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                                <button type="submit" name="btn-borrow" class="btn btn-danger w-100">ยืม</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
    <!--Highlight book !-->
    <div class="highlight-book">
        <h1 class="title col-8">Highlight Book</h1>
        <!-- card show Highlight book !-->
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ความลับที่คนอ่านหนังสือเท่านั้นจะรู้</h5>
                        <p class="card-text">เทคนิคอ่านหนังสือให้เข้าใจได้ลึกซึ่งกว่าเดิม ที่จะช่วยเพิ่มพลังความคิด พลังความรู้ และทำให้ชีวิตคุณมีวิสัยทัศน์ที่ล้ำลึกมากขึ้น
                        </p>
                        <a href="#" class="btn btn-danger">ยืม</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ความลับที่คนอ่านหนังสือเท่านั้นจะรู้</h5>
                        <p class="card-text">เทคนิคอ่านหนังสือให้เข้าใจได้ลึกซึ่งกว่าเดิม ที่จะช่วยเพิ่มพลังความคิด พลังความรู้ และทำให้ชีวิตคุณมีวิสัยทัศน์ที่ล้ำลึกมากขึ้น
                        </p>
                        <a href="#" class="btn btn-danger">ยืม</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ความลับที่คนอ่านหนังสือเท่านั้นจะรู้</h5>
                        <p class="card-text">เทคนิคอ่านหนังสือให้เข้าใจได้ลึกซึ่งกว่าเดิม ที่จะช่วยเพิ่มพลังความคิด พลังความรู้ และทำให้ชีวิตคุณมีวิสัยทัศน์ที่ล้ำลึกมากขึ้น
                        </p>
                        <a href="#" class="btn btn-danger">ยืม</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ความลับที่คนอ่านหนังสือเท่านั้นจะรู้</h5>
                        <p class="card-text">เทคนิคอ่านหนังสือให้เข้าใจได้ลึกซึ่งกว่าเดิม ที่จะช่วยเพิ่มพลังความคิด พลังความรู้ และทำให้ชีวิตคุณมีวิสัยทัศน์ที่ล้ำลึกมากขึ้น
                        </p>
                        <a href="#" class="btn btn-danger">ยืม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>