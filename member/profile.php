<?php 
include './backend/session.php';
include './backend/func.php';
$db = new db;
$id = $_SESSION['user_id'];
$profile  =$db->select_manual('members', ['*'], ['id'], [$id])

?>
<!--header !-->
<?php include 'header.php' ?>
<nav></nav>
<!--wrap content !-->
<div class="container content">
    <div class="profile-detail">

        <!--Title !-->
        <h1 class="title col-8">Profile</h1>


        <!--showbook-top & form !-->
        <div class="row box-profile">
            <div class="detail-pf">
                <?php foreach($profile as $pro) { ?>
                <h5>Username : <?= $pro['username'] ?></h5>
                <h5>Fullname : <?= $pro['fullname'] ?></h5>
                <h5>Phone :<?= $pro['phone'] ?></h5>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row logout-edit">
        <div class="col-1">
        <button class="bt-pf"><a href="./logout.php">Logout</a></button>
        </div>
        <div class="col-2">
        <button class="bt-pf"><a href="#">Edit Profile</a></button>
        </div>
    </div>


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>