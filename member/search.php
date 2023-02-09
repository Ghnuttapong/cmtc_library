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
    <div class="profile-detail">

        <!--Title !-->
        <h1 class="title col-8">Search</h1>


        <!--form & show(table-PHP)-->
        <div class="row wrap-search-table">

            <!-- input search !-->
            <div class="col-6">
                <div class="row box-profile">
                    <div class="search-container">
                        <form method="get" action="">
                            <input type="text" name="keyword" required>
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
            <!-- table !-->
            <div class="col-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ISBN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; foreach ($books as $book) { ?>
                            <?php 
                              $cateogry_name =  $db->select_manual('categories', ['*'], ['id'], [$book['category_id']]);
                            ?>
                            <tr>
                                <th scope="row"><?= $book['isbn'] ?></th>
                                <td><?= $book['name'] ?></td>
                                <td><?= $book['price'] ?></td>
                                <td><?= $cateogry_name[0]['name'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>