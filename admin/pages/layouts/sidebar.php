<?php


function active_nav($page_name)
{
    if ($_SERVER['PHP_SELF'] == '/cmtc_library/admin/pages/' . $page_name) {
        return "active";
    }
}

function active_menu_open(array $page_name)
{
    $active = 'menu-close';
    foreach ($page_name as $name) {
        if ($_SERVER['PHP_SELF'] == '/cmtc_library/admin/pages/' . $name) {
            $active = 'menu-open';
        }
    }
    return $active;
}

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="../assets/brand/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $site_name ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block "><?php echo $_SESSION['fullname'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="./index.html" class="nav-link <?= active_nav('index.php') ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>

                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= active_menu_open(['borrow.php']) ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>ระบบยืม/คืน
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./borrow.php" class="nav-link <?= active_nav('borrow.php') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการยืม</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= active_menu_open(['member_view.php'], ['member_add.php'], ['member_edit.php']) ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            จัดการสมาชิก
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./member_view.php" class="nav-link <?= active_nav('member_viwe.php') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./member_add.php" class="nav-link <?= active_nav('member_add.php') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>เพิ่มข้อมูล</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($_SESSION['position'] == 2) { ?>
                    <li class="nav-item <?= active_menu_open(['book_add.php', 'book_edit.php', 'book_view.php']) ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                จัดการหนังสือ
                                <i class="right fas fa-angle-left"></i>
                                <span class="badge badge-success right">2</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./book_view.php" class="nav-link <?= active_nav('book_view.php') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>รายการหนังสือ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./book_add.php" class="nav-link <?= active_nav('book_add.php') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>เพิ่มหนังสือ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?= active_menu_open(['staff_view.php', 'staff_add.php', 'staff_edit.php']) ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                จัดการสมาชิกเจ้าหน้าที่
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./staff_view.php" class="nav-link <?= active_nav('staff_view.php') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>รายชื่อ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./staff_add.php" class="nav-link <?= active_nav('staff_add.php') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>เพิ่มข้อมูล</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="./profile.php" class="nav-link <?= active_nav('profile.php') ?>">
                        <i class="far fa-address-card nav-icon"></i>
                        <p>
                            โปรไฟล์
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./logout.html" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>