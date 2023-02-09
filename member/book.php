<?php

include './backend/session.php';
include "./backend/func.php";

$db = new db;

// search keyword
if (isset($_GET['keyword'])) {
    $books = $db->search_data('books', ['*'], ['name'], [$_GET['keyword']]);
} else {
    // book all 
    $books = $db->select_manaul_field('books', ['*']);
}


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
            <?php foreach ($books as $book) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['name'] ?></h5>
                            <p class="card-text"><?= $book['price'] ?></p>
                            <a href="#" class="btn btn-Warning">สถานะ</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row margin-BH">
            <h5>Borrowing History</h5>
            <?php foreach ($books as $book) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="./assets/img/cover-book.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['name'] ?></h5>
                            <p class="card-text"><?= $book['price'] ?></p>
                            <a href="#" class="btn btn-Warning">สถานะ</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>