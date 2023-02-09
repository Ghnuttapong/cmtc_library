<!--header !-->
<?php include 'header.php' ?>
<nav></nav>
<!--wrap content !-->
<div class="container content">
    <div class="profile-detail">

        <!--Title !-->
        <h1 class="title col-8">Search</h1>


        <!--form & show(table-PHP)-->
        <?php
        $due_date = date('Y-m-d h:i:s', strtotime('+7 day'));
        $current_date = date('Y-m-d h:i:s');
        ?>
        <div class="row box-profile">
            <div class="search-container">
                <form method="get" action="book.php">
                    <input type="text" name="keyword" required>
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>