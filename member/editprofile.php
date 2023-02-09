<?php
include './backend/session.php';
include './backend/func.php';
$db = new db;
$id = $_SESSION['user_id'];
$profile  = $db->select_manual('members', ['*'], ['id'], [$id]);

if(isset($_POST['btn-profile'])) {
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];

    $result = $db->update_where('members', ['password', 'fullname', 'phone'], [$password, $fullname, $phone, $_SESSION['user_id']], 'id');
    $msg_suc = 'อัพเดทสำเร็จ';
}

?>
<!--header !-->
<?php include 'header.php' ?>
<nav></nav>
<!--wrap content !-->
<div class="container content">
    <div class="profile-detail">

        <!--Title !-->
        <h1 class="title col-8">Edit Profile</h1>


        <!--showbook-top & form !-->
        <div class="row box-profile">
            <?php if(isset($msg_suc)) { ?>
            <div class="alert alert-success">
                <b><?= $msg_suc ?></b>
            </div>
            <?php } ?>
            <form method="post" action="">
                <table width="400" border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td class="title-edpf" width="100">Username</td>
                        <td><input name="usename" disabled value="<?= $profile[0]['username'] ?>" type="text" id="member_id"></td>
                    </tr>
                    <tr>
                        <td class="title-edpf" width="100">Password</td>
                        <td><input name="password"value="<?= $profile[0]['password'] ?>" type="text" id="name"></td>
                    </tr>
                    <tr>
                        <td class="title-edpf" width="100">Fullname</td>
                        <td><input name="fullname" type="text" value="<?= $profile[0]['fullname'] ?>" id="email"></td>
                    </tr>
                    <tr>
                        <td class="title-edpf" width="100">Phone</td>
                        <td><input name="phone" type="text" value=<?= $profile[0]['phone'] ?> id="email"></td>
                    </tr>
                    <tr>
                        <td width="100"> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td width="100"> </td>
                        <td>
                            <input name="btn-profile" type="submit" id="update" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!--<div class="row logout-edit">
        <div class="col-1">
        <button class="bt-pf"><a href="./logout.php">Logout</a></button>
        </div>
        <div class="col-2">
        <button class="bt-pf"><a href="#">Edit Profile</a></button>
        </div>
    </div>!-->


</div>
<!--footer !-->
<?php include 'footer.php' ?>


</body>

</html>