<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link <?= $page == "index.php"? 'active bg-primary':''; ?>" href="../admin/index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Overview
                </a>
                <a class="nav-link <?= $page == "all_users.php"? 'active bg-primary':''; ?>" href="all_users.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></i></div>
                    Users Info
                </a>
                <a class="nav-link <?= $page == "all_blog.php"? 'active bg-primary':''; ?>" href="all_blog.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-blog"></i></i></div>
                    News & Blogs
                </a>
            </div>
        </div>
    </nav>
</div>