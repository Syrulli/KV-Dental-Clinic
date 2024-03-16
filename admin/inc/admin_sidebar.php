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
                    <small>Overview</small>
                </a>
                <a class="nav-link <?= $page == "all_users.php"? 'active bg-primary':''; ?>" href="all_users.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    <small>Accounts Maintenance</small> 
                </a>
                <a class="nav-link <?= $page == "all_blog.php"? 'active bg-primary':''; ?>" href="all_blog.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-blog"></i></div>
                    <small>News & Blogs</small> 
                </a>

                <a class="nav-link <?= $page == "all_feedbacks.php"? 'active bg-primary':''; ?>" href="all_feedbacks.php">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-comments"></i></div>
                    <small>Patients Feedback</small>
                </a>
            </div>
        </div>
    </nav>
</div>