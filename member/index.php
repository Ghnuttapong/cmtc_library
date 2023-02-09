<?php

    include './backend/session.php';
    include './backend/func.php';
    $db = new db;

    $books = $db->select_manaul_field('books', ['*']);

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
        <div class="row">
            <?php foreach($books as $book) { ?>
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