<?php
include './backend/session.php';
include './backend/func.php';
$db = new db;
$id = $_SESSION['user_id'];
$profile  = $db->select_manual('members', ['*'], ['id'], [$id])

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
            <form method="post" action="<?php $_PHP_SELF ?>">
                <table width="400" border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td class="title-edpf" width="100">Username</td>
                        <td><input name="usename" type="text" id="member_id"></td>
                    </tr>
                    <tr>
                        <td class="title-edpf" width="100">Password</td>
                        <td><input name="password" type="text" id="name"></td>
                    </tr>
                    <tr>
                        <td class="title-edpf" width="100">Fullname</td>
                        <td><input name="fullname" type="text" id="email"></td>
                    </tr>
                    <tr>
                        <td class="title-edpf" width="100">Phone</td>
                        <td><input name="phone" type="text" id="email"></td>
                    </tr>
                    <tr>
                        <td width="100"> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td width="100"> </td>
                        <td>
                            <input name="update" type="submit" id="update" value="Update">
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